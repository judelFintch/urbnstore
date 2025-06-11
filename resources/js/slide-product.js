function initSlickSlider() {
    const slider = $('.slick2');

    if (slider.hasClass('slick-initialized')) {
        slider.slick('unslick');
    }

    slider.slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        infinite: true,
        dots: false,
        autoplay: true,
        autoplaySpeed: 2500,
        prevArrow: '<button type="button" class="slick-prev"></button>',
        nextArrow: '<button type="button" class="slick-next"></button>',
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });
}

document.addEventListener('livewire:update', initSlickSlider);
document.addEventListener('DOMContentLoaded', initSlickSlider);
