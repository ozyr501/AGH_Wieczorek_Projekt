<?php
    session_start();
    require("funkcje.php");
    $link = mysqli_connect("localhost", "UserAdmin", "SilneHaslo123", "kino");
    if(!$link)
    {
        echo("Błąd bazy danych. Spróbuj ponownie później");
        exit();
    }
    if (!isset($_POST['login']) || !isset($_POST['pass']) || !isset($_POST['email']))
    {
        echo("Błąd formularza");
        exit();
    }
    $login = $_POST['login'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $que = "SELECT EMAIL FROM users WHERE EMAIL = ?";
    $pstmt = mysqli_stmt_init($link);
    mysqli_stmt_prepare($pstmt, $que);
    mysqli_stmt_bind_param($pstmt,"s",$email);
    mysqli_stmt_execute($pstmt);
    mysqli_stmt_bind_result($pstmt, $emails);
    mysqli_stmt_fetch($pstmt);
    if($email == $emails)
    {
        $_SESSION['mess'] = 'Konto z takim mailem już istnieje';
        mysqli_stmt_close($pstmt);
        mysqli_close($link);
        header('Location: registerpage.php');
        exit();
    }

    $que = "SELECT LOGIN FROM users WHERE LOGIN = ?";
    $pstmt = mysqli_stmt_init($link);
    mysqli_stmt_prepare($pstmt, $que);
    mysqli_stmt_bind_param($pstmt, "s", $login);
    mysqli_stmt_execute($pstmt);
    mysqli_stmt_bind_result($pstmt, $logins);
    mysqli_stmt_fetch($pstmt);
    if ($login == $logins) {
        $_SESSION['mess'] = 'Konto o takim loginie już istnieje';
        mysqli_stmt_close($pstmt);
        mysqli_close($link);
        header('Location: registerpage.php');
        exit();
    }
    mysqli_stmt_close($pstmt);

    $pstmt = mysqli_stmt_init($link);
    $que = "INSERT INTO users (LOGIN, HASLO, EMAIL) VALUES (?, ?, ?)";
    mysqli_stmt_prepare($pstmt, $que);
    mysqli_stmt_bind_param($pstmt, "sss", $login, $pass, $email);
    mysqli_stmt_execute($pstmt);
    mysqli_stmt_close($pstmt);
    mysqli_close($link);
    header('Location: index.php');
?>