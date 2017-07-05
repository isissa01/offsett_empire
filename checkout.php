<?php 
session_start();

require "app/start.php";

use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;

if (empty($_SESSION['shopping_cart']) || !isset($_SESSION['shopping_cart'])){
  die();
}
$product = $_SESSION['shopping_cart'][0]['name'];
$price = floatval($_SESSION['shopping_cart'][0]['price']);
$shipping = 0.00;
$total  = $price + $shipping;

$payer = new Payer();
$payer->setPaymentMethod('paypal');

$item = new Item();
$item->setName($product)
  ->setCurrency('USD')
  ->setQuantity(1)
  ->setPrice($price);

$itemList = new ItemList();
$itemList->setItems([$item]);

$details = new Details();
$details->setShipping($shipping)
  ->setSubtotal($price);

$amount = new Amount();
$amount->setCurrency('USD')
  ->setTotal($total)
  ->setDetails($details);

$trans = new Transaction();
$trans->setAmount($amount)
  ->setItemList($itemList)
  ->setDescription('Paying for Beat Licenses From Offsett Empire')
  ->setInvoiceNumber(uniqid());


$redirectUrls = new RedirectUrls();
$redirectUrls->setReturnUrl(SITE_URL . "/pay.php?success=true")
  ->setCancelUrl(SITE_URL . "/pay.php?success=false");

$payment = new Payment();
$payment->setIntent('sale')
  ->setPayer($payer)
  ->setRedirectUrls($redirectUrls)
  ->setTransactions([$trans]);

try {
    $payment->create($paypal);

    } catch (Exception $ex) {
    die($ex);
}

$approvalUrl = $payment->getApprovalLink();

header("location: {$approvalUrl}");