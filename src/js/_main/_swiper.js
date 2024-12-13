

const swiper = new Swiper('.swiper-home-top', {
    observeSlideChildren: true,
    slideToClickedSlide: true,
    updateOnWindowResize: true,
    slidesPerView: .98,
    spaceBetween: 0,
    loop: true,
    speed: 5000,
    // breakpoints: {
    //     320: {
    //         slidesPerView: 1
    //     },
    //     760: {
    //         slidesPerView: 1
    //     },
    //     992: {
    //         slidesPerView: 1
    //     }
    // },
    // autoplay: {
    //    delay: 8000,
    //    disableOnInteraction: false,
    // },
    keyboard: {
        enabled: true,
        onlyInViewport: false,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    grabCursor: true
  });


  const howtigoes = new Swiper('.swiper-projects', {
    // observeSlideChildren: true,
    // slideToClickedSlide: true,
    // updateOnWindowResize: true,
    slidesPerView: 1.2,
    centeredSlides: true,
    spaceBetween: 40,
    // loop: true,
    initialSlide: 0,
    speed: 3000,
    breakpoints: {
        320: {
            slidesPerView: 1
        },
        760: {
            slidesPerView: 1.2
        },
        992: {
            slidesPerView: 1.75
        }
    },
    keyboard: {
        enabled: true,
        onlyInViewport: false,
    },
    pagination: {
        el: ".swiper-pagination",
        dynamicBullets: true,
        clickable: true,
    },
    grabCursor: true
  });
