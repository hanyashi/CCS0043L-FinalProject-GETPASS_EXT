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
            <form class="checkout-form" method="post">
                <div>
                    <label for="student-number">Student Number:</label>
                    <div class="padding-div"></div>
                    <h2 class="total-label">Total:</h2>
                </div>
                <div class="padding-between"></div>
                <div class="input-fields">
                    <input type="text" name="student-number" id="student-number">
                    <div class="padding-div"></div>
                    <h2 class="total-cost">₱100.00</h2>
                </div>
            </form>
        </div>
        <h1 class="header">Payment Options</h1>
        <div class="payment-options">
            <a href="" target="_blank"><img src="../assets/images/gcash.png"></a>
            <a href="" target="_blank"><img src="../assets/images/paymaya.png" width="224" height="224" style="border-radius: 27.5px;"></a>
        </div>
    </div>
</body>
</html>
