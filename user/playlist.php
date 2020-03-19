<?php
include_once('../DBconnection.php');
session_start();
if (!isset($_SESSION['login'])) {
    header('location: ../login.html');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../style.css">
    <meta charset="UTF-8">
    <title>Playlist</title>
</head>
<body>
<div id="wrapper">
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="zenderOver.php">Zenders</a></li>
                <li><a href="">Nummers</a></li>
                <li><a href="">Mederwerkers</a></li>
                <li><a href="">Contact</a></li>
            </ul>
        </nav>
    </header>
    <div id="overzichtHouder">
        <?php
        if (isset($_POST["knopPlaylist"])) {
            $sql = $conn->query("SELECT naam FROM programma WHERE programmaID = " . $_POST['knopPlaylist'] . " ");
            echo $_POST['knopPlaylist'];
            while ($row = $sql->fetch()) {
                print "<h3>" . $row['naam'] . "</h3>";
            }
        }

        //Display the data in a table
        $query = $conn->query("SELECT nummerID FROM playlist WHERE programmaID = " . $_POST['knopPlaylist'] . " ");
        print "<table class ='zenderoverzicht'>";
        print "<tr><th>Programma</th><th>Datum</th><th>Tijd</th><th>Presentator</th></tr>";
        foreach ($query as $row) {
            print "<tr>";
            print "<td>" . $row['nummerID'] . "</td>";
//                print "<td>" . $row['titel'] . "</td>";
            print "</tr>";
        }
        print "</table>";
        ?>
    </div>
    <footer>
        <p>&copy; Kraeken</p>
    </footer>
</div>
</body>
</html>