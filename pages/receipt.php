<?php
session_start();

require_once "../includes/db.php";

$uuid = $_GET['transaction'] ?? null;

if (!$uuid) {
    echo "Invalid transaction.";
    exit();
}

$stmt = $conn->prepare("SELECT * FROM transactions WHERE transaction_code = ?");
$stmt->bind_param("s", $uuid);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();
$stmt->close();

if (!$data) {
    echo "Transaction not found.";
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/receipt.css">
    <title>Receipt</title>
    <link rel="icon" href="../assets/images/getpass-icon.png">
</head>

<body>
    <div class="background">
    </div>

    <div class="main">
        <div class="navbar">
            <a href="../index.php">GET<i>PASS</i> - EZ<i>RIDE</i> </a>
        </div>

        <div class="receipt-container">
            <div class="receipt-bg">
                <img src="../assets/images/check.png" alt="check">
                <h1>Payment Successful</h1><br><br>
                <div class="receipt-details">
                    <div class="label-column">
                        <h2>Transaction Code:</h2>
                        <h2>Passengers:</h2>
                        <h2>Discount Applied:</h2>
                        <h2>Student Number:</h2>
                        <h2>Payment Method:</h2>
                        <h2>Total:</h2>
                    </div>
                    <div class="value-column">
                        <h2 class="transaction-code"><?= $data['transaction_code'] ?></h2>
                        <h2 class="passenger-count"><?= $data['passenger_count'] ?></h2>
                        <h2 class="discount"><?= $data['has_discount'] ? 'Yes' : 'No' ?></h2>
                        <h2 class="student-number"><?= $data['student_number'] ?: 'N/A' ?></h2>
                        <h2 class="payment-method"><?= $data['payment_method'] ?></h2>
                        <h2 class="total-amount">₱<?= $data['total_amount'] ?></h2>
                    </div>
                </div>
                <br><br>
                <a href="../index.php"><button>Home</button></a>
            </div>
        </div>
        <br> <br>
    </div>
    </div>
    </div>
</body>

</html>