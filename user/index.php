<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('location: ../login.html');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style.css">
    <title>Homepage</title>
</head>
<body>
<div id="wrapper">
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="zenderOver.php">Zenders</a></li>
                <li><a href="">Nummers</a></li>
                <li><a href="">Medewerkers</a></li>
                <li><a href="">Contact</a></li>
                <li><a href="../logout.php">Loguit</a></li>
            </ul>
        </nav>
    </header>
    <div id="picHolder">
        <img src="../img/radiodj1.jpg" alt="radiodj1">
        <img src="../img/radiodj2.jpg" alt="radiodj2">
        <img src="../img/radiodj3.jpg" alt="radiodj3">
    </div>
    <footer>
        <p>&copy; Kraeken</p>
    </footer>
</div>
</body>
</html>