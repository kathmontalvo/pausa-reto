$(document).on('click', '.yamm .dropdown-menu', function (e) {
    e.stopPropagation()
});
$('.c-images').owlCarousel({
    loop: true,
    margin: 10,
    dots: true,
    nav: true,
    navText: ['<img src="../../img/icons/arrow-circle-back.png" alt="nav" />', '<img src="../../img/icons/arrow-circle-next.png" alt="nav" />'],
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1000: {
            items: 1
        }
    }
});
$('.c-itinerario').owlCarousel({
    loop: true,
    margin: 15,
    dots: false,
    nav: true,
    navText: ['<img src="../../img/icons/arrow-left.png" alt="nav" />', '<img src="../../img/icons/arrow-right.png" alt="nav" />'],
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 2
        },
        1000: {
            items: 2
        }
    }
});
var videos = $('.c-videos').owlCarousel({
    loop: true,
    margin: 10,
    dots: false,
    nav: true,
    video: true,
    lazyLoad: false,
    autoplay: false,
    center: true,
    navText: ['<img src="../../img/icons/arrow-circle-back.png" alt="nav" />', '<img src="../../img/icons/arrow-circle-next.png" alt="nav" />'],
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1000: {
            items: 1
        }
    }
});

var owl = $('.c-videos');
$(".botones span").click(function () {
    $(".botones span.active").removeClass("active");
    $(this).addClass("active");
    var s = $(this).attr("data-s");
    if (s == "slider-videos") {
        $(".slider-videos").css("display", "block");
        $(".slider-imagenes").css("display", "none");
    }
    else {
        $(".slider-imagenes").css("display", "block");
        $(".slider-videos").css("display", "none");
        //$(".slider-videos div").remove();
        $('.item-video iframe').each(function () {
            console.log($(this).attr("src"));
            var src = $(this).attr('src');
            var srclist = src.split('?');
            $(this).attr('src', srclist[0]);
            //$(this).pause();
            owl.trigger('stop.owl.autoplay');
        });
    }
});
$('.arriba').click(function (e) {
    e.preventDefault();		//evitar el eventos del enlace normal
    var strAncla = $(this).attr('href'); //id del ancla
    $('body,html').stop(true, true).animate({
        scrollTop: $(strAncla).offset().top
    }, 1000);
});
$("#item-detalle-menu").mCustomScrollbar();
//para scroll
$(window).scroll(function () {
    var windowHeight = $(window).scrollTop();
    if (windowHeight >= 800) {
        $(".arriba").css("display", "block");
    }
    else {
        $(".arriba").css("display", "none");
    }
});

$(".paquete-location").each(function () {
    var name = $(this).attr("data-name");
    var first = name.split("-").shift();
    var last = name.split("-").pop();
    var text = first + '- <span class="text-muted">' + last + '</span>';
    $(this).html(text);
});