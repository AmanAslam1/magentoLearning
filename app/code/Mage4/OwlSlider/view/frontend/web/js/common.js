    require(['jquery', 'owlcarousel'], function($) {
    $(document).ready(function() {
        $('.owl-carousel').owlCarousel({
            loop: true,
            dots: true,
            margin: 10,
            nav: true,
            slideBy: 1,
            navText: [
                "<i class='fa fa-caret-left'></i>",
                "<i class='fa fa-caret-right'></i>"
            ],
            autoplay: true,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        });
    });
});

