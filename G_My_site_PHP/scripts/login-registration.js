console.log("login-registration.js загружен");

function flipCard(answer) {
    const card = document.getElementById('card');
    const formType = document.querySelector('input[name="form_type"]');
    const errorMessage = document.getElementById('errorMessage');

    if (answer === 'yes') {
        formType.value = 'reg';
        errorMessage.textContent = ''; // Сбросим сообщение об ошибке в случае успешного переключения
    } else {
        formType.value = 'log';
    }

    card.classList.toggle('flipped');
}

// document.getElementById('submit').addEventListener('click', function (event) {
//     event.preventDefault();
//     const username = document.getElementById('L_login').value;
//     const password = document.getElementById('L_password').value;
//     const errorMessage = document.getElementById('errorMessage');

//     if (username === '' || password === '') {
//         errorMessage.textContent = 'Ошибка валидации';
//     } else {
//         errorMessage.textContent = '';
//         // Валидация успешна, отправляем форму
//         document.querySelector('.form-login').submit();
//     }
// });

// document.getElementById('submit-registration').addEventListener('click', function(event){
//     event.preventDefault();
//     const login = document.getElementById('login').value;
//     const name = document.getElementById('name').value;
//     const second_name = document.getElementById('second_name').value;
//     const password = document.getElementById('password').value;
//     const password2 = document.getElementById('password2').value;
//     const date = document.getElementById('date').value;
//     const email = document.getElementById('email').value;

//     const errorMessage = document.getElementById('errorMessage');

//     if(login === '' || name === '' || second_name === '' || password === '' || password2 === '' || date === '' || email === ''){
//         errorMessage.textContent = 'Ошибка валидации';
//     } else if (password !== password2) {
//         errorMessage.textContent = 'Пароли не совпадают';
//     } else {
//         errorMessage.textContent = '';
//         // Валидация успешна, отправляем форму
//         document.querySelector('.form-registration').submit();
//     }
// });

function showModal(message) {
    const modal = document.getElementById('modal');
    const modalMessage = document.getElementById('modal-message');
    modalMessage.textContent = message;
    modal.style.display = 'block';
}

function closeModal() {
    const modal = document.getElementById('modal');
    modal.style.display = 'none';
}

// Закрытие модального окна при клике вне его
window.onclick = function(event) {
    const modal = document.getElementById('modal');
    if (event.target == modal) {
        modal.style.display = 'none';
    }
}