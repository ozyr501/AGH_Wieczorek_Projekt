<?php
    session_start();
    require("funkcje.php");
    $link = mysqli_connect("localhost", "UserAdmin", "SilneHaslo123", "kino");
    if(!$link)
    {
        echo("Błąd bazy danych. Spróbuj ponownie później");
        exit();
    }
    if (!isset($_POST['login']) || !isset($_POST['pass']))
    {
        echo("Błąd formularza");
        exit();
    }
    $login = $_POST['login'];
    $pass = $_POST['pass'];

    $que = "SELECT ID_USER, LOGIN FROM users WHERE login = ? AND haslo = ?";
    $pstmt = mysqli_stmt_init($link);
    mysqli_stmt_prepare($pstmt, $que);
    mysqli_stmt_bind_param($pstmt,"ss",$login,$pass);
    mysqli_stmt_execute($pstmt);
    mysqli_stmt_bind_result($pstmt, $IDs ,$logins);
    mysqli_stmt_fetch($pstmt);
    if($logins === $login)
    {
        $_SESSION['logged'] = true;
        $_SESSION['login'] = $login;
        $_SESSION['ID_USER'] = $IDs;
        header('Location: index.php');
    }
    else{
        $_SESSION['logged'] = false;
        $_SESSION['mess'] = 'Błędne dane';
        header('Location: loginpage.php');
    }
    mysqli_stmt_close($pstmt);
    mysqli_close($link);
?>