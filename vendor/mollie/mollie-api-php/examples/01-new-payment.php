<?php
/*
 * How to prepare a new payment with the Mollie API.
 */

use Mollie\Api\Exceptions\ApiException;
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
}
function data_trim($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
try {
    /*
     * Initialize the Mollie API library with your API key.
     *
     * See: https://www.mollie.com/dashboard/settings/profiles
     */

    require "./initialize.php";

    /*
     * Generate a unique order id for this example. It is important to include this unique attribute
     * in the redirectUrl (below) so a proper return page can be shown to the customer.
     */
    $orderId = time();

    /*
     * Determine the url parts to these example files.
     */
    $protocol = isset($_SERVER['HTTPS']) && strcasecmp('off', $_SERVER['HTTPS']) !== 0 ? "https" : "http";
    $hostname = $_SERVER['HTTP_HOST'];
    $path = dirname(isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : $_SERVER['PHP_SELF']);

    /*
     * Payment parameters:
     *   amount        Amount in EUROs. This example creates a € 10,- payment.
     *   description   Description of the payment.
     *   redirectUrl   Redirect location. The customer will be redirected there after the payment.
     *   webhookUrl    Webhook location, used to report when the payment changes state.
     *   metadata      Custom metadata that is stored with the payment.
     */
    $payment = $mollie->payments->create([
        "amount" => [
            "currency" => "EUR",
            "value" => $price
        ],
        "description" => "Order #{$orderId}",
        "redirectUrl" => "{$protocol}://{$hostname}{$path}/03-return-page.php?order_id={$orderId}",
        "webhookUrl" => "{$protocol}://{$hostname}{$path}/02-webhook-verification.php",
        "metadata" => [
            "order_id" => $orderId,
        ],
    ]);

    /*
     * In this example we store the order with its payment status in a database.
     */
    database_write($orderId, $payment->status);

    /*
     * Send the customer off to complete the payment.
     * This request should always be a GET, thus we enforce 303 http response code
     */
    header("Location: " . $payment->getCheckoutUrl(), true, 303);
} catch (ApiException $e) {
    echo "API call failed: " . htmlspecialchars($e->getMessage());
}

/*
 * NOTE: This example uses a text file as a database. Please use a real database like MySQL in production code.
 */
function database_write($orderId, $status)
{
    $orderId = intval($orderId);
    $database = dirname(__FILE__) . "/orders/order-{$orderId}.txt";

    file_put_contents($database, $status);
}
