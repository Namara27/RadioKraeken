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
    <title>Programma overzicht</title>
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
    <form action="playlist.php" method="post">
        <div id="overzichtHouder">
            <?php
            if (isset($_POST["knopOverzichtProg"])) {
                $sql = $conn->query("SELECT naam FROM zenders WHERE zenderID = " . $_POST['knopOverzichtProg'] . " ");
                while ($row = $sql->fetch()) {
                    print "<h3>" . $row['naam'] . "</h3>";
                }
            }

            //Display the data in a table
            $query = $conn->query("SELECT programma.programmaID, programma.naam, programma.datum, programma.begintijd, programma.eindtijd, programma.medewerkerID, medewerkers.voornaam, nummers.nummerID FROM programma, medewerkers, nummers WHERE programma.medewerkerID=medewerkers.medewerkerID AND zenderID = " . $_POST['knopOverzichtProg'] . " ");
            print "<table class ='zenderoverzicht'>";
            print "<tr><th>Programma</th><th>Datum</th><th>Tijd</th><th>Presentator</th></tr>";
            foreach ($query as $row) {
                print "<tr>";
                print "<td>" . $row['naam'] . "</td>";
                print "<td>" . $row['datum'] . "</td>";
                print "<td>" . $row['begintijd'] . " - " . $row['eindtijd'] . "</td>";
                print "<td>" . $row['voornaam'] . "</td>";
                print "<td><button onclick=\"window.location = 'playlist.php';\" value='" . $row['programmaID'] . "' name='knopPlaylist'>Playlist</button></td>";
                print "</tr>";
            }
            print "</table>";

            ?>
        </div>
    </form>
    <footer>
        <p>&copy; Kraeken</p>
    </footer>
</div>
</body>
</html>