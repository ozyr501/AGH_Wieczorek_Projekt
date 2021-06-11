<?php
    session_start();
    require("funkcje.php");
    /* Dane admina:
        login: UserAdmin
        pass: SilneHaslo123
    */
    $link = mysqli_connect("localhost", "UserAdmin", "SilneHaslo123", "kino");
    if(!$link)
    {
        echo("Błąd bazy danych. Spróbuj ponownie później");
        exit();
    }
?>