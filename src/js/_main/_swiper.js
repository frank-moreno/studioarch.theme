

const swiper = new Swiper('.swiper-home-top', {
    observeSlideChildren: true,
    slideToClickedSlide: true,
    updateOnWindowResize: true,
    slidesPerView: .99,
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
    autoplay: {
       delay: 8000,
       disableOnInteraction: false,
    },
    keyboard: {
        enabled: true,
        onlyInViewport: false,
    },
    // navigation: {
    //     nextEl: '.swiper-button-prev',
    //     prevEl: '.swiper-button-next',
    // },
    grabCursor: true
  });


  const howtigoes = new Swiper('.swiper-properties', {
    observeSlideChildren: true,
    slideToClickedSlide: true,
    updateOnWindowResize: true,
    slidesPerView: 1,
    spaceBetween: 30,
    // loop: true,
    speed: 3000,
    breakpoints: {
        320: {
            slidesPerView: 1
        },
        760: {
            slidesPerView: 1.5
        },
        992: {
            slidesPerView: 3.5
        }
    },
    autoplay: {
       delay: 2000,
       disableOnInteraction: false,
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

  const testimonials = new Swiper('.swiper-testimonials', {
    observeSlideChildren: true,
    slideToClickedSlide: true,
    updateOnWindowResize: true,
    slidesPerView: 1,
    spaceBetween: 40,
    // loop: true,
    speed: 3000,
    breakpoints: {
        320: {
            slidesPerView: 1
        },
        760: {
            slidesPerView: 1.5
        },
        992: {
            slidesPerView: 3
        }
    },
    // autoplay: {
    //    delay: 2000,
    //    disableOnInteraction: false,
    // },
    keyboard: {
        enabled: true,
        onlyInViewport: false,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    // pagination: {
    //     el: ".swiper-pagination",
    //     dynamicBullets: true,
    //   },
    grabCursor: true
  });
