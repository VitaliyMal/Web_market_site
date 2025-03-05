// Логика для работы слайдера

document.addEventListener("DOMContentLoaded", () => {
    const sliders = document.querySelectorAll(".slider");
  
    sliders.forEach((slider) => {
      const images = slider.querySelectorAll("img");
      let currentIndex = 0;
  
      const showSlide = (index) => {
        images.forEach((img, i) => {
          img.classList.toggle("active", i === index);
        });
      };
  
      showSlide(currentIndex);
  
      let interval;
  
      const startSlider = () => {
        interval = setInterval(() => {
          currentIndex = (currentIndex + 1) % images.length;
          showSlide(currentIndex);
        }, 1000);
      };
  
      const stopSlider = () => {
        clearInterval(interval);
      };
  
      slider.addEventListener("mouseenter", startSlider);
      slider.addEventListener("mouseleave", stopSlider);
    });
  });
  