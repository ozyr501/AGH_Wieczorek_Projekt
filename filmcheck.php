<?php session_start(); ?>
<!doctype html>

<html lang="pl">

<head>
    <title>Kino</title>
    <meta charset="utf-8">
    <meta name="description" content="Strona do zererwacji biletów. Stworzona w ramach projektu zaliczeniowego z przedmiotu JPiA">
    <meta name="author" content="Krzysztof Wieczorek">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styleindex.css">
    <script src="script.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.6.3.min.js"></script>
</head>

<body>
    <main>
        <?php
            if(!isset($_SESSION['logged']) || $_SESSION['logged'] == false)
            {
                header('Location: loginpage.php');
            }
            $link = mysqli_connect("localhost", "FilmViewer", "", "kino");
            if (!$link) {
                exit("Błąd bazy danych. Bardzo przepraszamy");
            }
            $que = "SELECT ID_SEANS, DATE, FREE_SEATS FROM seanse WHERE ID_FILM = " . $_POST['movie_id'];
            $result = $link->query($que);
            if($result->num_rows == 0)
                echo('Przepraszamy. Obecnie brak senanów z wybranym filmem.');
            else
            {
                echo('Wybierz interesujący cię termin seansu. Numer obok daty oznacza liczbę wolnych miejsc. <br/>');
                echo('<form action="sala.php" method="POST">');
                echo('<input type="hidden" name="movie_id" value="' . $_POST['movie_id'] . '">');
                echo('<select id="dates" name="ID_SEANS">');
                foreach($result as $v)
                {
                    echo('<option value="' . $v['ID_SEANS'] .'"');
                    if($v['FREE_SEATS'] == 0) echo(' disabled');
                    echo('> ' . $v['DATE'] . ' | ' . $v['FREE_SEATS'] . '</option>');
                }
                echo ('</select>');
                echo('<input type="submit" value="wybierz" name="chose">');
                echo ('</form>');
            }
            ?>
    </main>
</body>
</html>

