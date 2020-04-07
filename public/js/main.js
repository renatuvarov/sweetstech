$('.navbar-toggler').on('click', function () {
    $('.navbar-collapse').toggleClass('show');
});

$(function () {
    var owl = $(".owl-carousel");
    if (owl.length) {
        owl.owlCarousel({
            margin: 10,
            nav: false,
            loop: true,
            autoplay: true,
            autoplayTimeout: 2000,
            smartSpeed: 1000,
            responsiveClass: true,
            responsive: {
                0:{
                    items: 4
                },
                480:{
                    items: 6
                },
                769:{
                    items: 10
                },
                1920:{
                    items: 15
                },
                2048:{
                    items: 18
                }
            }
        });
    }
});
