function toggleFeedback() {
    document.getElementById('feedback').classList.toggle('hidden');
}

function loadFeedback() {
    fetch('../php/get_feedback.php')
        .then(response => response.json())
        .then(data => {
            //console.log("Ответ сервера:", data); // Выводим в консоль ответ сервера
            
            if (!Array.isArray(data)) {
                throw new Error("Ответ сервера не является массивом");
            }

            let feedbackList = document.getElementById('feedback-list');
            feedbackList.innerHTML = '';
            data.forEach(item => {
                let row = document.createElement('tr');
                row.innerHTML = `
                    <td>${item.id}</td>
                    <td>${item.name}</td>
                    <td>${item.message}</td>
                    <td><button class="delete-btn" onclick="deleteFeedback(${item.id})">Удалить</button></td>
                `;
                feedbackList.appendChild(row);
            });
        })
        .catch(error => console.error('Ошибка загрузки отзывов:', error));
}

function deleteFeedback(id) {
    fetch('../php/delete_feedback.php?id=' + id, { method: 'GET' })
        .then(response => response.text())
        .then(() => loadFeedback());
}

// Загружаем отзывы при загрузке страницы
document.addEventListener("DOMContentLoaded", loadFeedback);
