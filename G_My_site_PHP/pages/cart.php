<?
    require __DIR__ ."/../components/header.php";
?>

<style>
    .cart_icon1 {
        fill: red;
    }

    .cart_icon {
        fill: #4a7def;
    }

    button {
        width: 100px;
        padding: 10px;
        background-color: #007bff;
        border: none;
        color: white;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
    }
</style>


<!-- Сделать красивой кнопкой -->
<div class="button">
    <button id="Button" onclick="window.location.href='payment.php';" >Оплатить</button>

</div>


<?
	require __DIR__ ."/../components/footer.php";
?>