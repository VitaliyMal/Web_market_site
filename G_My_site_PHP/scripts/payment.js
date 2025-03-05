const termsCheckbox = document.getElementById('termsCheckbox');
const payButton = document.getElementById('payButton');
const cardNumberInput = document.getElementById('cardNumber');
const cardLogo = document.getElementById('cardLogo');

termsCheckbox.addEventListener('change', () => {
    payButton.disabled = !termsCheckbox.checked;
});

cardNumberInput.addEventListener('input', () => {
    const cardNumber = cardNumberInput.value.replace(/\s/g, '');
    if (/^2200/.test(cardNumber)) { // Для карт МИР
        cardLogo.src = 'https://upload.wikimedia.org/wikipedia/commons/0/08/Mir-logo.svg'; // Логотип МИР
        cardLogo.style.display = 'inline';
    } else if (/^4/.test(cardNumber)) { // Для карт Visa
        cardLogo.src = 'https://upload.wikimedia.org/wikipedia/commons/d/d6/Visa_2021.svg'; // Логотип Visa
        cardLogo.style.display = 'inline';
    } else {
        cardLogo.style.display = 'none'; // Если карта не поддерживается
    }
});

document.getElementById('paymentForm').addEventListener('submit', (e) => {
    e.preventDefault();

    const cardNumber = cardNumberInput.value.replace(/\s/g, '');
    const expiryDate = document.getElementById('expiryDate').value;
    const cvv = document.getElementById('cvv').value;

    if (!validateCardNumber(cardNumber)) {
        alert('Некорректный номер карты!');
        return;
    }
    if (!validateExpiryDate(expiryDate)) {
        alert('Некорректная дата окончания!');
        return;
    }
    if (!validateCVV(cvv)) {
        alert('Некорректный CVV!');
        return;
    }

    alert('Оплата прошла успешно!');
});

function validateCardNumber(number) {
    // Проверяем длину номера карты и убираем пробелы
    return /^[0-9]{16}$/.test(number);
}

function validateExpiryDate(date) {
    const [month, year] = date.split('/').map(num => parseInt(num, 10));
    const currentDate = new Date();
    const currentMonth = currentDate.getMonth() + 1; // месяцы начинаются с 0
    const currentYear = currentDate.getFullYear() % 100; // Получаем последние 2 цифры года

    return (year > currentYear) || (year === currentYear && month >= currentMonth);
}

function validateCVV(cvv) {
    return /^[0-9]{3}$/.test(cvv);
}