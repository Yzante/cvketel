<?php

require_once "../vendor/autoload.php";
use Mollie\Api\MollieApiClient;

/*
 * Make sure to disable the display of errors in production code!
 */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//require_once __DIR__ . "/../vendor/autoload.php";

/*
 * Initialize the Mollie API library with your API key.
 *
 * See: https://www.mollie.com/dashboard/settings/profiles
 */

$mollie = new MollieApiClient();
$mollie->setApiKey("test_5Szwupmc6kwyrfCvv23UHJjNyVMDFG");

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
        "value" => "10.00"
    ],
    "description" => "Order #{$orderId}",
    "redirectUrl" => "{$protocol}://{$hostname}{$path}/03-return-page.php?order_id={$orderId}",
    "webhookUrl" => "{$protocol}://{$hostname}{$path}/02-webhook-verification.php",
    "metadata" => [
        "order_id" => $orderId,
    ],
]);
