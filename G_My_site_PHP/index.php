<?
require __DIR__ ."/components/header.php";
?>
	<!-- <a href="#">
    <svg class="logo" width="115" height="47" xmlns="http://www.w3.org/2000/svg">
      <g transform="translate(-5 -5)" fill="none" fill-rule="evenodd">
        <rect fill="#D8D8D8" transform="rotate(45 28.5 28.5)" x="9" y="9" width="39" height="39" rx="11" />
        <text font-family="Rubik-Medium, Rubik" font-size="25" font-weight="400" fill="#6F6F6F">
          <tspan x="63.923" y="36.923">Menu</tspan>
        </text>
      </g>
    </svg>
</a> -->
	<!-- 
<a href="#">
<svg width="800px" height="800px" viewBox="0 -17 117 117" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0)">
<path d="M0.864068 77.0341C0.571799 78.923 2.12079 81.0778 4.24573 81.7405C5.35826 82.0874 6.51143 82.2871 7.67579 82.3345C8.64785 82.3701 9.61992 82.4129 10.592 82.457C12.8673 82.5575 15.1971 82.6613 17.5262 82.6613C18.462 82.6613 19.3976 82.6444 20.3282 82.6036C24.8587 82.409 29.4586 82.1185 33.9068 81.8378C39.235 81.5025 44.7439 81.1562 50.1635 80.9682C64.2728 80.4799 78.4358 78.5379 92.1329 76.66L93.9098 76.4162C97.1208 75.9772 100.441 75.522 103.679 74.8794C103.822 74.8515 103.97 74.8262 104.12 74.8009C105.421 74.5791 107.386 74.2452 107.892 71.2566C107.919 71.0944 107.886 70.9284 107.799 70.7897C107.711 70.6509 107.576 70.5491 107.418 70.5044C107.077 70.4071 106.762 70.3001 106.464 70.1983C105.852 69.9577 105.21 69.8008 104.556 69.7327L102.492 69.6108C97.73 69.3294 92.8062 69.0389 87.9536 68.9092C74.2028 68.5331 60.4414 68.891 46.7284 69.9811C37.8942 70.6944 28.8994 71.2779 20.2 71.8427C15.7933 72.1287 11.3864 72.4205 6.97967 72.7181C6.03861 72.7596 5.10674 72.9204 4.20618 73.1967C3.3401 73.4483 2.56472 73.9437 1.9722 74.6245C1.37968 75.3047 0.994867 76.1412 0.864068 77.0341Z" fill="#000000"/>
<path d="M3.22255 43.1126C3.20108 43.8194 3.38029 44.5179 3.73928 45.1271C4.09827 45.7363 4.62228 46.2312 5.25086 46.5545C6.31856 47.0793 7.47899 47.3888 8.66608 47.4655C10.2402 47.5621 11.892 47.6451 13.5691 47.6451C14.3895 47.6451 15.2154 47.625 16.041 47.5771C20.9662 47.2943 25.9651 46.9598 30.8021 46.6369C39.8572 46.0325 49.2203 45.4049 58.4348 45.0891C70.9781 44.6572 83.5891 43.1159 95.7846 41.6251C98.9821 41.236 102.177 40.8518 105.37 40.4728C105.625 40.4436 105.882 40.4197 106.144 40.3957C108.013 40.2238 110.34 40.0099 112.715 37.4647C112.789 37.3858 112.842 37.2902 112.87 37.1862C112.899 37.0823 112.902 36.9732 112.879 36.8679C112.856 36.7626 112.807 36.6644 112.738 36.5818C112.669 36.4992 112.581 36.4346 112.481 36.3935C108.143 34.6077 104.391 34.3631 100.611 34.2535L97.3114 34.1582C86.8623 33.8541 76.0594 33.5396 65.3902 33.9501C47.4562 34.6413 29.8936 36.3877 10.44 38.4303C8.61126 38.63 6.82885 39.1354 5.16732 39.9255C4.57565 40.219 4.07899 40.674 3.73485 41.2381C3.39071 41.802 3.21316 42.4519 3.22255 43.1126Z" fill="#000000"/>
<path d="M6.91381 9.30705C8.17858 9.92436 9.5466 10.3015 10.9489 10.4192C11.7179 10.4762 12.4874 10.5351 13.2572 10.5956C16.8105 10.8705 20.4753 11.1544 24.1056 11.1544C24.3862 11.1544 24.6674 11.1545 24.948 11.1493C31.8108 11.0631 38.7858 10.9028 45.5314 10.7479C54.4809 10.543 63.7355 10.3309 72.8353 10.2887C85.861 10.2284 98.9463 8.7383 111.602 7.29747L112.008 7.25156C112.805 7.0986 113.568 6.79844 114.256 6.36646C114.716 6.12265 115.239 5.84767 115.88 5.55069C115.995 5.49796 116.092 5.41372 116.161 5.30784C116.23 5.20196 116.267 5.07879 116.268 4.95259C116.27 4.82639 116.236 4.70237 116.169 4.59497C116.103 4.48757 116.007 4.4011 115.894 4.34579C115.233 4.02157 114.677 3.71035 114.186 3.43282C113.417 2.91444 112.552 2.55407 111.642 2.37262L109.155 2.07309C104.324 1.4895 99.3293 0.883162 94.3867 0.676958C67.7566 -0.435762 40.7162 0.608936 14.5669 1.61985L9.874 1.8008C9.16426 1.82876 8.45918 1.92888 7.76973 2.09969C6.98105 2.24831 6.26047 2.6449 5.71265 3.23176C5.16483 3.81863 4.81826 4.56515 4.72381 5.36261C4.6023 6.16975 4.75139 6.99446 5.14751 7.708C5.54363 8.42154 6.16476 8.9838 6.91381 9.30705Z" fill="#000000"/>
</g>
<defs>
<clipPath id="clip0">
<rect width="116" height="83" fill="white" transform="translate(0.777344)"/>
</clipPath>
</defs>
</svg> 
</a> -->

	<!-- конец хэдера страницы -->


	<!-- баннер стартовый -->
	<div class="bannerB">
		<div class="sliderB">
			<div class="slidesB">
				<div class="slideB" style="background-color: white;">
					<img src="image/1.png" alt="Image 1" />
					<div class="text">Самый красивый закат!</div>
				</div>
				<div class="slideB" style="background-color: white;">
					<img src="image/2.png" alt="Image 2" />
					<div class="text">Очень быстрый автомобиль!</div>
				</div>
				<div class="slideB" style="background-color: white;">
					<img src="image/3.png" alt="Image 3" />
					<div class="text">Читай документацию!</div>
				</div>
				<div class="slideB" style="background-color: white;">
					<img src="image/4.png" alt="Image 4" />
					<div class="text">С горки с ветерком!</div>
				</div>
				<div class="slideB" style="background-color: white;">
					<img src="image/5.png" alt="Image 5" />
					<div class="text">Вкусно и не мяукает!</div>
				</div>
				<div class="slideB" style="background-color: white;">
					<img src="image/6.png" alt="Image 6" />
					<div class="text">Автоматизация производств!</div>
				</div>
				<div class="slideB" style="background-color: white;">
					<img src="image/7.png" alt="Image 7" />
					<div class="text">Вроде точно зажим забирал...</div>
				</div>
				<div class="slideB" style="background-color: white;">
					<img src="image/8.png" alt="Image 8" />
					<div class="text">Подберем уход для всего тела!</div>
				</div>
			</div>
			<button class="prevB" onclick="moveSlideB(-1)">&#10094;</button>
			<button class="nextB" onclick="moveSlideB(1)">&#10095;</button>
			<div class="dots">
				<span class="dot" onclick="currentSlide(0)"></span>
				<span class="dot" onclick="currentSlide(1)"></span>
				<span class="dot" onclick="currentSlide(2)"></span>
				<span class="dot" onclick="currentSlide(3)"></span>
				<span class="dot" onclick="currentSlide(4)"></span>
				<span class="dot" onclick="currentSlide(5)"></span>
				<span class="dot" onclick="currentSlide(6)"></span>
				<span class="dot" onclick="currentSlide(7)"></span>
			</div>
		</div>
	</div>
	<!-- конец баннера -->

	<!-- Добавляем секцию для карточек товаров -->
	<section id="products" style="padding: 20px;">
		<div class="product-row">
			<div class="product-card">
				<h3 class="product-name">Товар 1</h3>
				<div class="slider">
					<img src="image/goods/1/1.webp" alt="Slide 1">
					<img src="image/goods/1/2.webp" alt="Slide 2">
					<img src="image/goods/1/3.webp" alt="Slide 3">
					<img src="image/goods/1/4.webp" alt="Slide 4">
					<img src="image/goods/1/5.webp" alt="Slide 5">
					<img src="image/goods/1/6.webp" alt="Slide 6">
					<img src="image/goods/1/7.webp" alt="Slide 7">
					<img src="image/goods/1/8.webp" alt="Slide 8">
					<img src="image/goods/1/9.webp" alt="Slide 9">
				</div>
				<p class="price">Цена: 1000 ₽</p>
				<p class="stock">Доступно: 10 шт.</p>
				<button class="btn-favorite">В избранное</button>
				<button class="btn-cart">В корзину</button>
			</div>
		</div>
	</section>
	<!-- Отправка формы дата -->
	<!-- <form action="" method="get">
		<input type="text" placeholder="имя">
		<input type="text">
		<input type="date">
		<button>отправить</button>
	</form> -->
	<script src="scripts/goods.js"></script>

<?	
require __DIR__ ."/components/footer.php";
?>