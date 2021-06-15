<?php
class ticket
{
    public $ID;
    public $number;
    public $movie;
    public $date;
    public $row;
    public $seat;
}

class errormess
{
    public $mess;
}

$ticket = new ticket;
$error = new errormess();
if (isset($_GET['tn'])) {
    $link = mysqli_connect("localhost", "FilmViewer", "", "kino");
    $que = "SELECT ID_SEANS, ROW, SEAT, NUMBER FROM bilety WHERE NUMBER = ?";
    $pstmt = mysqli_stmt_init($link);
    mysqli_stmt_prepare($pstmt, $que);
    mysqli_stmt_bind_param($pstmt, "s", $_GET["tn"]);
    mysqli_stmt_execute($pstmt);
    mysqli_stmt_bind_result($pstmt, $ID, $r, $s, $num);
    mysqli_stmt_fetch($pstmt);
    if (isset($ID)) {
        $link = mysqli_connect("localhost", "FilmViewer", "", "kino");
        $que = "SELECT ID_FILM, DATE FROM seanse WHERE ID_SEANS = " . $ID;
        $result = $link->query($que);
        $result = mysqli_fetch_assoc($result);
        if (isset($result["ID_FILM"])) {
            $que = "SELECT NAZWA FROM filmy WHERE ID_FILM = " . $result["ID_FILM"];
            $result2 = $link->query($que);
            $result2 = mysqli_fetch_assoc($result2);
            if (isset($result2['NAZWA'])) {
                $ticket->ID = $ID;
                $ticket->number = $_GET["tn"];
                $ticket->movie = $result2['NAZWA'];
                $ticket->date = $result['DATE'];
                $ticket->row = $r+1;
                $ticket->seat = $s+1;
            } else
            {
                $error->mess = "Błąd bazy danych";
                goto err;
            }
        } else {
            $error->mess = "Błąd bazy danych";
            goto err;
        }
    } else {
        $error->mess = "Nieporpawny numer";
        goto err;
    }
    echo json_encode($ticket);
}
else
{
    $error->mess = "Nieporpawny numer";
    goto err;
}
if(false)
{
    err:
    echo json_encode($error);
}
?>