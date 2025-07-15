<?php
session_start();

if (!isset($_SESSION['passenger_count'])) {
    header('Location: passengers_page.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['student_number'] = $_POST['student_number'] ?: null;
    $_SESSION['payment_method'] = $_POST['payment_method'];
    header('Location: payment.php');
    exit();
}

$passenger_count = $_SESSION['passenger_count'];
$price_per_passenger = 20.00;

$total_amount = $passenger_count * $price_per_passenger;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/checkout.css">
    <title>Checkout Page</title>
    <link rel="icon" href="../assets/images/getpass-icon.png">
</head>

<body>
    <div class="background"></div>
    <div class="main">
        <div class="navbar">
            <a href="../index.php">GET<i>PASS</i> - EZ<i>RIDE</i> </a>
        </div>
        <h1 class="header">CHECKOUT</h1>
        <div class="checkout-container">
            <form class="checkout-form" method="POST">
                <div class="labels">
                    <label for="student-number">Student Number:</label>
                    <div class="padding-div"></div>
                    <h2 class="total-label">Total:</h2>
                </div>
                <div class="padding-between"></div>
                <div class="input-fields" class="inputs">
                    <input type="text" name="student_number" id="student_number">
                    <div class="padding-div"></div>
                    <h1 class="total-cost">₱<?= number_format($total_amount, 2) ?></h1>
                </div>
        </div>
        <h1 class="header">Payment Options</h1>
        <div class="payment-options">
            <input type="image" src="../assets/images/gcash.png" name="payment_method" value="GCash" />
            <input type="image" src="../assets/images/paymaya.png" name="payment_method" value="PayMaya" />
            </form>
            <!-- https://stackoverflow.com/questions/8683528/embed-image-in-a-button-element -->
        </div>
    </div>
</body>

</html>