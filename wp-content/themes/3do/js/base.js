(function ($) {

    $(function () {
        // Active form search header
        $('header .form-search img').click(function () {
            let $formSearchMenu = $(this).closest('.form-search');
            $formSearchMenu.toggleClass('active');
            if ($formSearchMenu.hasClass('active')) {
                $formSearchMenu.find('input').focus();
            } else {
                $formSearchMenu.find('input').blur();
            }
        });


        var btn = $('.scroll-to-top');
        $(window).scroll(function () {
            if ($(window).scrollTop() > 100) {
                btn.addClass('active');
            } else {
                btn.removeClass('active');
            }
        });

        btn.click(function () {
            $('html, body').animate({ scrollTop: 0 }, 100);
            return false;
        });

        // Slide Hero banner - Home
        new Swiper('.home-page .hero-banner .swiper', {
            speed: 600,
            lazy: true,
            loop: true,
            // autoplay: {
            //     delay: 3000,
            // },
            pagination: {
                el: '.home-page .hero-banner .swiper .swiper-pagination',
                clickable: true,
            },
        });

        // Slide Chứng nhận - Home
        new Swiper('.about-certs .swiper', {
            speed: 600,
            lazy: true,
            loop: true,
            spaceBetween: 15,
            slidesPerView: 2,
            breakpoints: {
                1200: {
                    slidesPerView: 4,
                    spaceBetween: 0,
                },
                991: {
                    slidesPerView: 3,
                    spaceBetween: 0,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 0,
                }
            },
        });

        // Slide Về chúng tôi - Home
        new Swiper('.home-page .about-us .swiper', {
            speed: 600,
            lazy: true,
            pagination: {
                el: '.home-page .about-us .swiper .swiper-pagination',
                clickable: true,
            },
        });

        // Slide Thương hiệu - Home
        new Swiper('.about-brands .swiper', {
            speed: 600,
            lazy: true,
            loop: true,
            spaceBetween: 0,
            autoplay: {
                delay: 3000,
            },
            slidesPerView: 2.5,
            breakpoints: {
                1200: {
                    slidesPerView: 5,
                },
                991: {
                    slidesPerView: 4,
                },
                768: {
                    slidesPerView: 4,
                },
                576: {
                    slidesPerView: 3,
                },
            },
            navigation: {
                nextEl: '.about-brands .swiper-button-next',
                prevEl: '.about-brands .swiper-button-prev',
            },
        });

        // Slide Sản phẩm nổi bật - Home
        new Swiper('.home-page .product-newest .swiper', {
            speed: 600,
            lazy: true,
            autoplay: {
                delay: 3000,
            },
            pagination: {
                el: '.home-page .product-newest .swiper .swiper-pagination',
                clickable: true,
            },
        });

        // Slide Tab Đối tác - Home
        new Swiper('.list-partners .swiper', {
            speed: 600,
            lazy: true,
            loop: true,
            spaceBetween: 15,
            slidesPerView: 2.5,
            breakpoints: {
                1200: {
                    slidesPerView: 7,
                    spaceBetween: 0,
                },
                991: {
                    slidesPerView: 5,
                    spaceBetween: 0,
                },
                768: {
                    slidesPerView: 4,
                    spaceBetween: 0,
                },
                576: {
                    slidesPerView: 3,
                    spaceBetween: 0,
                },
            },
            navigation: {
                nextEl: '.list-partners .swiper-button-next',
                prevEl: '.list-partners .swiper-button-prev',
            },
        });

        // Slide Tab Kols - Home
        new Swiper('.home-page .list-kols .swiper', {
            speed: 600,
            lazy: true,
            loop: true,
            slidesPerView: 2,
            spaceBetween: 8,
            breakpoints: {
                1200: {
                    slidesPerView: 9,
                    spaceBetween: 0,
                },
                991: {
                    slidesPerView: 7,
                    spaceBetween: 0,
                },
                768: {
                    slidesPerView: 5,
                    spaceBetween: 0,
                },
                576: {
                    slidesPerView: 3,
                    spaceBetween: 0,
                },
            },
            navigation: {
                nextEl: '.home-page .list-kols .swiper-button-next',
                prevEl: '.home-page .list-kols .swiper-button-prev',
            },
        });

        // Slide Tab chuyên gia - Home
        new Swiper('.home-page .list-experts .swiper', {
            speed: 600,
            lazy: true,
            loop: true,
            spaceBetween: 0,
            slidesPerView: 2,
            breakpoints: {
                1200: {
                    slidesPerView: 5,
                    spaceBetween: 10,
                },
                991: {
                    slidesPerView: 4,
                    spaceBetween: 10,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 10,
                },
                576: {
                    slidesPerView: 3,
                    spaceBetween: 0,
                },
            },
            navigation: {
                nextEl: '.home-page .list-experts .swiper-button-next',
                prevEl: '.home-page .list-experts .swiper-button-prev',
            },
        });
    });
})(jQuery);