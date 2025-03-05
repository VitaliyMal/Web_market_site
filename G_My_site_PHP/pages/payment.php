<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Оплата банковской картой</title>
    <link rel="stylesheet" href="../css/payment_window.css">
    <link rel="icon" type="image/png" sizes="16x16" href="../image/Logo/main/mini/site_logo_0.png" />
</head>
<body>
    <div class="container">
        <h1>Форма оплаты банковской картой</h1>
        <form id="paymentForm">
            <label for="cardNumber">Номер карты:</label>
            <input type="text" id="cardNumber" name="cardNumber" required>
            <img id="cardLogo" src="" alt="Логотип карты" style="display:none; margin-bottom: 15px;" width="100" height="100"/>

            <label for="expiryDate">Срок действия:</label>
            <input type="text" id="expiryDate" name="expiryDate" required placeholder="MM/YY">

            <label for="cvv">CVV:</label>
            <input type="text" id="cvv" name="cvv" required>

            <div class="checkbox-container">
                <input type="checkbox" id="termsCheckbox">
                <label for="termsCheckbox">С условиями ознакомлен</label>
            </div>

            <!-- <button type="submit" id="payButton" disabled>Оплатить</button> -->

            <!-- Временно -->
            <button type="submit" id="payButton" disabled onclick="window.location.href='../index.php';" >Оплатить</button>
        </form>
    </div>

    <script src="../scripts/payment.js">
       
    </script>
</body>
</html>
