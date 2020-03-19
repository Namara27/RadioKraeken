<?php
include_once('DBconnection.php');
session_start();

if (isset($_POST["registreren"])) {
    $naam = $_POST['regUsername'];
    $tussenvoegsel = $_POST['regTussenvoegsel'];
    $achternaam = $_POST['regAchternaam'];
    $wachtwoord = $_POST['regPassword'];
    $repeatpassword = $_POST['regRepeatPassword'];
    $hash = password_hash($wachtwoord, PASSWORD_DEFAULT);

    //Check if username exists
    $query = "SELECT naam FROM medewerkers WHERE naam =?";

    $res = $conn->prepare($query);
    $res->execute([$naam]);

    if ($res->rowCount() > 0) {
        $error = "Username already exists";
    }

    //Check if passwords match
    if ($wachtwoord !== $repeatpassword) {
        $error = "The password doesn't match";
    }

    //Creates a new account
    if (!isset($error)) {
        $sql = "INSERT INTO medewerkers (naam, tussenvoegsel, achternaam, wachtwoord) VALUES (?,?,?,?)";

        $result = $conn->prepare($sql);
        $result->execute([$naam, $tussenvoegsel, $achternaam, $hash]);

        echo "<script>alert('Account successfully created!'); window.location='login.html';</script>";
    } else {
        echo "<script>alert('$error '); window.location='registreren.html';</script>";
    }
}