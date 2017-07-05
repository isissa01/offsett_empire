<?php 
session_start();

if (!isset($_SESSION['logged_in'])){

   header('Location: login.php?checkout');
    die();
}

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
$items = [];
$total = 0.00;
foreach($_SESSION['shopping_cart'] as $song){
  
  $product = $song['name'];
  $price = floatval($song['price']);
  $total  += $price;
  
  $item = new Item();
  $item->setName($product)
    ->setCurrency('USD')
    ->setQuantity(1)
    ->setPrice($price);
  $items[] = $item;
}
$shipping = 0.00;

$payer = new Payer();
$payer->setPaymentMethod('paypal');

$itemList = new ItemList();
$itemList->setItems($items);

$details = new Details();
$details->setShipping($shipping)
  ->setSubtotal($total);

$amount = new Amount();
$amount->setCurrency('USD')
  ->setTotal($total + $shipping)
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