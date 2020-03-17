<?php
/**
 * Created by PhpStorm.
 * User: maxbr
 * Date: 17-3-2020
 * Time: 16:52
 */
$_inputCorrect = false;
$price = 0;
$voornaamErr = $achternaamErr = $geboortedatumErr = $algemene_voorwaardenErr = $emailErr = "";
$voornaam = $achternaam = $geboortedatum = $algemene_voorwaarden = $email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_inputCorrect = true;
    if (empty($_POST["voornaam"])) {
        $voornaamErr = "voer je voornaam in om verder te gaan";
        $_inputCorrect = false;
    } else {
        $voornaam = data_trim($_POST["voornaam"]);
    }

    if (empty($_POST["achternaam"])) {
        $achternaamErr = "voer je achternaam in om verder te gaan";
        $_inputCorrect = false;
    } else {
        $achternaam = data_trim($_POST["achternaam"]);
    }

    if (empty($_POST["email"])) {
        $emailErr = "voer je email adres in om verder te gaan";
        $_inputCorrect = false;
    } else {
        $email = data_trim($_POST["email"]);
    }

    if (empty($_POST["geboortedatum"])) {
        $geboortedatumErr = "voer je geboorte datum in om verder te gaan";
        $_inputCorrect = false;
    } else {
        $geboortedatum = data_trim($_POST["geboortedatum"]);
    }

    if (isset($_POST["algemene_voorwaarden"])) {
        $algemene_voorwaarden = "ja";
    } else {
        $algemene_voorwaardenErr = "Je moet de algemene voorwaarden accepteren om je in te schrijven";
        $_inputCorrect = false;
    }

    if (isset($_POST["zaterdag"])) {
        $price += 25;
    }
    if (isset($_POST["zondag"])) {
        $price += 25;
    }
    if (isset($_POST["maandag"])) {
        $price += 25;
    }
    if (isset($_POST["dinsdag"])) {
        $price += 25;
    }
    if($price == 0){
        $_inputCorrect = false;
    }
    if($_inputCorrect == true){

    }
    include 'initialize.php';
}
function data_trim($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}