<?php
    session_start();
    $_SESSION['logged'] = false;
    unset($_SESSION['login']);
    header('Location: index.php');
    exit();
?>