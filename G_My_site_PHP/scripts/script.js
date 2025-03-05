//Начало слайдера

let currentSlideIndex = 4; // начинаем с 4го слайда
let interval; // Переменная для хранения интервала

function moveSlideB(direction) {
    const slides = document.querySelector('.slidesB');
    const totalSlides = document.querySelectorAll('.slideB').length;
    currentSlideIndex = (currentSlideIndex + direction + totalSlides) % totalSlides;
    updateSlides();
    resetInterval(); // Сбрасываем интервал при изменении слайда
}

function currentSlide(index) {
    currentSlideIndex = index;
    updateSlides();
    resetInterval(); // Сбрасываем интервал при изменении слайда
}

function updateSlides() {
    const slides = document.querySelector('.slidesB');
    const dots = document.querySelectorAll('.dot');
    slides.style.transform = `translateX(-${currentSlideIndex * 100}%)`;
    dots.forEach((dot, index) => {
        dot.className = dot.className.replace(' active', '');
        if (index === currentSlideIndex) {
            dot.className += ' active';
        }
    });
}

function startSlideShow() {
    interval = setInterval(() => {
        moveSlideB(1);
    }, 8000); // Переключение каждые 8 секунд
}

function resetInterval() {
    clearInterval(interval); // Очищаем предыдущий интервал
    startSlideShow(); // Запускаем новый интервал
}

updateSlides();
startSlideShow(); // Запускаем слайд-шоу при загрузке

//Конец слайдера


//проверить

let loginned = false;
function isLoginned() {
    //запрашиваем залогинен ли пользователь


    if (loginned == false) {
        //открываем модальное окно логина
    }

}

