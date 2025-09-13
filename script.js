jQuery(document).ready(function($) {
    $('.slider_prop').slick({
        dots: true,
        infinite: true,
        // slidesToShow: 3,  // how many items visible
         variableWidth: true,
        slidesToScroll: 1,
        arrows: true,
        autoplay: true,
        autoplaySpeed: 5000,
         prevArrow: '.prevs',
        nextArrow:'.nexts',
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });
});