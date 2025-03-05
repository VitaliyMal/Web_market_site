document.getElementById("editUsersBtn").addEventListener("click", function() {
    document.getElementById("usrs").classList.toggle("hidden");
    loadUsers();
});

function loadUsers() {
    fetch("../php/user_management.php", { method: "GET" })
        .then(response => response.json())
        .then(data => {
            //console.log("Ответ сервера:", data); // Выводим в консоль ответ сервера
            
            if (!Array.isArray(data)) {
                throw new Error("Ответ сервера не является массивом");
            }

            let usersList = document.getElementById("users-list");
            usersList.innerHTML = "";
            data.forEach(user => {
                let row = document.createElement("tr");
                row.innerHTML = `
                    <td>${user.id}</td>
                    <td contenteditable="true" data-field="email">${user.email}</td>
                    <td contenteditable="true" data-field="login">${user.login}</td>
                    <td contenteditable="true" data-field="name">${user.name}</td>
                    <td contenteditable="true" data-field="second_name">${user.second_name}</td>
                    <td contenteditable="true" data-field="birth_date">${user.birth_date}</td>
                    <td contenteditable="true" data-field="isAdmin">${user.isAdmin}</td>
                    <td>
                        <button onclick="updateUser(${user.id}, this)">💾</button>
                        <button onclick="deleteUser(${user.id})">❌</button>
                    </td>
                `;
                usersList.appendChild(row);
            });
        })
        .catch(error => console.error("Ошибка загрузки пользователей:", error));
}

function updateUser(id, button) {
    let row = button.parentElement.parentElement;
    let updatedData = {};
    row.querySelectorAll("[contenteditable=true]").forEach(cell => {
        updatedData[cell.dataset.field] = cell.innerText;
    });
    fetch("../php/user_management.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ id, ...updatedData })
    }).then(response => response.text())
      .then(result => alert("Обновлено: " + result))
      .catch(error => console.error("Ошибка обновления:", error));
}

function deleteUser(id) {
    if (!confirm("Удалить пользователя?")) return;
    fetch("../php/user_management.php", {
        method: "DELETE",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ id })
    }).then(response => response.text())
      .then(result => {
          alert("Удалено: " + result);
          loadUsers();
      })
      .catch(error => console.error("Ошибка удаления:", error));
}

document.getElementById("addUserBtn").addEventListener("click", function() {
    let newUser = {
        email: prompt("Email:"),
        login: prompt("Логин:"),
        password: prompt("Пароль:"),
        name: prompt("Имя:"),
        second_name: prompt("Фамилия:"),
        birth_date: prompt("Дата рождения (YYYY-MM-DD):"),
        isAdmin: prompt("Админ? (0 или 1):")
    };
    fetch("../php/user_management.php", {
        method: "PUT",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(newUser)
    }).then(response => response.text())
      .then(result => {
          alert("Добавлено: " + result);
          loadUsers();
      })
      .catch(error => console.error("Ошибка добавления:", error));
});

function changePassword(userId) {
    let newPassword = prompt("Введите новый пароль:");
    if (!newPassword) return;

    fetch("../php/user_management.php", {
        method: "PATCH",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ id: userId, password: newPassword })
    })
    .then(response => response.json())
    .then(result => {
        alert(result.status === "success" ? "Пароль обновлен" : "Ошибка обновления");
    })
    .catch(error => console.error("Ошибка смены пароля:", error));
}

function addPasswordChangeButton() {
    document.querySelectorAll("#users-list tr").forEach(row => {
        if (row.dataset.hasButton) return; // Избегаем дублирования кнопок
        
        let userId = row.children[0]?.innerText;
        if (!userId) return;
        
        let actionsCell = row.children[row.children.length - 1];
        let passwordButton = document.createElement("button");
        passwordButton.innerText = "🔑";
        passwordButton.onclick = () => changePassword(userId);
        actionsCell.appendChild(passwordButton);
        
        row.dataset.hasButton = true;
    });
}

document.addEventListener("DOMContentLoaded", () => {
    addPasswordChangeButton();
    
    // Если список пользователей загружается динамически, следим за изменениями
    const observer = new MutationObserver(addPasswordChangeButton);
    observer.observe(document.getElementById("users-list"), { childList: true, subtree: true });
});


// Загружаем отзывы при загрузке страницы
//document.addEventListener("DOMContentLoaded", loadUsers);
