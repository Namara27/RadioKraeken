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
    <title>Zender overzicht</title>
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
    <form action="progOverzicht.php" method="post">
        <div id="overzichtHouder">
            <?php
            //Display the data in a table
            $test = $conn->query("SELECT zenderID, naam, omschrijving FROM zenders");
            print "<table class ='zenderoverzicht'>";
            print "<tr><th colspan='3'>Zenders</th></tr>";
            echo '<tr>';
            $columnIndex = -1;
            foreach ($test as $row) {
                if ($columnIndex === 2) {
                    $columnIndex = 0;
                    echo '</tr><tr>';
                } else {
                    $columnIndex++;
                }
                print "<td>";
                print $row['naam'] . '<br>' . $row['omschrijving'] . '<br>' . "<button onclick=\"window.location = 'progOverzicht.php';\" value='" . $row['zenderID'] . "' name='knopOverzichtProg'>Programma overzicht</button>";
                print "</td>";
            }
            echo '</tr>';
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