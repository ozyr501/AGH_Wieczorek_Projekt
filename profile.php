<?php
session_start();
$link = mysqli_connect("localhost", "FilmViewer", "", "kino");
if (!$link) {
    echo ("Błąd bazy danych. Bardzo przepraszamy");
    exit();
}
$que = "SELECT * FROM bilety WHERE ID_USER=" . $_SESSION['ID_USER'];
$result = $link->query($que);
echo("Poisadane bilety:<br/>");
foreach($result as $v)
{
    
    echo($v['NUMBER']);
    echo("<br/>");
}
?>