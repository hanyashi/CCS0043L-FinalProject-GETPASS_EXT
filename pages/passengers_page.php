<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['passenger_count'] = (int) $_POST['passenger_count'];
    header('Location: checkout.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/passengers_page.css">
    <title>Passengers Page</title>
    <link rel="icon" href="../assets/images/getpass-icon.png">
</head>

<body>
    <div class="background">
    </div>

    <div class="main">
        <div class="navbar">
            <a href="../index.php">GET<i>PASS</i> - EZ<i>RIDE</i> </a>
        </div>
        <form method="POST" id="passenger-form">
            <div class="passenger">
                <h1>Amount of Passengers</h1>
                <input type="hidden" name="passenger_count" id="passenger_count">
                <div class="passenger-cards">
                    <button type="button" class="card" data-value="1">
                        <img src="../assets/images/1_person_icon.png" alt="1 Person">
                    </button>
                    <button type="button" class="card" data-value="2">
                        <img src="../assets/images/2_person_icon.png" alt="2 People">
                    </button>
                    <button type="button" class="card" data-value="3">
                        <img src="../assets/images/3_person_icon.png" alt="3 People">
                    </button>
                    <button type="button" class="card" data-value="4">
                        <img src="../assets/images/4_person_icon.png" alt="4 People">
                    </button>
                    <button type="button" class="card" data-value="5">
                        <img src="../assets/images/5_person_icon.png" alt="5 People">
                    </button>
                </div>
                <button class="proceed-button" type="submit">Proceed to Payment</button>
            </div>
        </form>
    </div>

    <script>
        // handle card selection via query selectors and handle user inputs via getelementbyid
        // getattribute to get the value of the data-value attribute
        // disallow continuing if no card is selected
        const cards = document.querySelectorAll('.card');
        const form = document.getElementById('passenger_count');

        cards.forEach(card => {
            card.addEventListener('click', () => {
                cards.forEach(c => c.classList.remove('selected'));
                card.classList.add('selected');
                form.value = card.getAttribute('data-value');
            });
        });

        document.getElementById('passenger-form').addEventListener('submit', (e) => {
            if (!form.value) {
                e.preventDefault();
                alert('Please select the number of passengers before proceeding.');
            }
        });
    </script>

</body>

</html>