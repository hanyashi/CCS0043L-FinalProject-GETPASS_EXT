<?php
session_start();
require_once '../includes/functions.php';
require_once '../includes/db.php';

$passenger_count = $_SESSION['passenger_count'] ?? 1;
$student_number = $_SESSION['student_number'] ?? null;
$payment_method = $_SESSION['payment_method'];

if (!$passenger_count || !$payment_method) {
    header('Location: passengers_page.php');
    exit();
}

$has_discount = !empty($student_number);
$total_amount = ($passenger_count * 20) - ($has_discount ? 4 : 0);

$uuid = generateTransactionCode();
$_SESSION['transaction_code'] = $uuid;

$stmt = $conn->prepare("INSERT INTO transactions (transaction_code, passenger_count, has_discount, total_amount, student_number, payment_method) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("siidss", $uuid, $passenger_count, $has_discount, $total_amount, $student_number, $payment_method);
$stmt->execute();
$stmt->close();

$baseUrl = getBaseUrl();
$host = $_SERVER['HTTP_HOST'];
$ip = getLocalIp();
$qr_link = $baseUrl . '/pages/receipt.php?transaction=' . urlencode($uuid);
$qr_url = "https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=" . urlencode($qr_link);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/payment.css">
    <title>QR Payment Page</title>
    <link rel="icon" href="../assets/images/getpass-icon.png">
</head>

<body>
    <div class="background">
    </div>

    <div class="main">
        <div class="navbar">
            <a href="../index.php">GET<i>PASS</i> - EZ<i>RIDE</i> </a>
        </div>

        <div class="qr-code-container">
            <div class="qr-code-bg">
                <a href="<?= $qr_link ?>"><img src="<?= $qr_url ?>" alt="QR Code"></a>
            </div>
        </div>
    </div>
</body>

</html>