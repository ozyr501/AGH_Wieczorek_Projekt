<?php
session_start();
$link = mysqli_connect("localhost", "Doorman", "BezpieczneHaslo123", "kino");
if (!$link) {
    echo ("Błąd bazy danych. Bardzo przepraszamy");
    exit();
}
$que = "SELECT * FROM seanse WHERE ID_SEANS = " . $_POST['ID_SEANS'];
$result = $link->query($que);
$result = mysqli_fetch_assoc($result);
$temparr = json_decode($result['SEATS']);
$length = count($temparr[0]);

$ques = [];
$first = true;
$lp = 0;
$freeseats = $result['FREE_SEATS'];
foreach ($_POST as $v) {
    if ($first) {
        $first = false;
        $seans_id = $v;
        continue;
    }
    $r = intdiv($v,$length);
    $s = $v % $length;
    if($temparr[$r][$s] != 1)
    {
        echo("Błąd formularza. Wybrane miejsca są niedostępne");
        exit();
    }
    else
    {
        $code = $_SESSION['ID_USER'] . $_POST['ID_SEANS'] . time() . $lp++;
        $que = 'INSERT INTO bilety (ID_SEANS, ID_USER, NUMBER, ROW, SEAT) VALUES (' . $_POST['ID_SEANS'] . ', ' . $_SESSION['ID_USER'] . ', ' . $code . ', ' . $r . ', ' . $s . ')';
        $temparr[$r][$s] = 2;
        $freeseats--;
    }
}
$que = 'UPDATE seanse SET FREE_SEATS=' . $freeseats . ', SEATS=\'' . json_encode($temparr) . '\' WHERE ID_SEANS=' . $_POST['ID_SEANS'];
$link->query($que);
header('Location: profile.php');
?>
