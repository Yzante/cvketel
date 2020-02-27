<?php
/**
 * Created by PhpStorm.
 * User: maxbr
 * Date: 22-3-2019
 * Time: 10:59
 */

include 'includes/header.php';
?>
<link rel="stylesheet" href="css\index.css">
    <script src="script/jQuery.js"></script>
    <script src="script/script.js" defer></script>
<?php
$_inputCorrect = false;
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
    if($_inputCorrect == true){

    }
}
function data_trim($data) {
$data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<div id="informatie">
    <?php
    include 'includes/ticketInput.php';
    include 'includes/ticketOutput.php';
    ?>
</div>

<?php
include 'includes/footer.php';
?>