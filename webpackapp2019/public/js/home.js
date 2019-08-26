$(document).ready(function () {

    var hm = $(window).height();
    var wm = $(window).width();
    if (wm <= 780) {
        $("#navbar-collapse-grid").css("height", hm);
    }

    $(".land").mouseenter(function () {
        var id = $(this).attr("id");
        $(".land").css({
            "fill": "rgba(255,255,255,0.7)"
        });
        $("#" + id).css({
            "fill": "#db4619"
        });
    })
        .mouseleave(function () {
            var id = $(this).attr("id");
            $("#" + id).css({
                "fill": "rgba(255,255,255,0.7)"
            });
        });

    $(".icom-item-map").mouseenter(function () {
        var id = $(this).attr("data-id");
        $("#" + id).css({
            "fill": "#db4619"
        });
    });

    $(".icom-item-map").click(function (e) {
        //var text = $(this).attr("data-titlr");
        e.preventDefault();
        var id = $(this).attr("data-id");
        //$(".m-pck h3 b").html(text);
        //console.log(id);
        // $.post('postRequest',function(data){
        // 	console.log(data);
        // });

        let idioma = $("input[name='data_idioma']").val();

        $.post('home', {id: id,idioma: idioma}, function(data) {
            //console.log(data);
            $("#data_ruta_pots").html(data);
        });
    });

    $(".masinfo-id").click(function (e) {
        e.preventDefault();
        var id = $(this).attr("data-id");
        $.post('homedeta', {id: id}, function (data) {
            $(".m-pckdescripcion").html(data);
            //$("#data_ruta_pots").html(data);
        });
    });

    $(document).on('click', '.modal-mas-info', function (e) {
        e.preventDefault();
        $(".descr-ruta-modal").toggle();
    });

    //para scroll
    $(window).scroll(function () {
        var windowHeight = $(window).scrollTop();
        var contenido2 = $(".section-mapa").offset();
        var contenido3 = $(".section-testimonio").offset();
        contenido2 = contenido2.top;
        contenido3 = contenido3.top;
        var hh = $(".section-testimonio").height();
        var hh = hh + 200;
        //console.log(windowHeight);
        //console.log(contenido2);
        //console.log(contenido3 - hh);
        if (windowHeight >= (contenido3 - hh)) {
            $(".mitadmapa").css("display", "none");
        }
        else if (windowHeight >= contenido2) {
            $(".mitadmapa").css("display", "block");
        }
        else {
            $(".mitadmapa").css("display", "none");
        }
    });

    $('.mitadmapa,.abajo-h').click(function (e) {
        e.preventDefault();		//evitar el eventos del enlace normal
        var strAncla = $(this).attr('href'); //id del ancla
        $('body,html').stop(true, true).animate({
            scrollTop: $(strAncla).offset().top
        }, 1000);

    });

    $('.owl-paquetes').owlCarousel({
        loop: true,
        margin: 10,
        dots: false,
        nav: true,
        navText: ['<i class="fa fa-angle-left">', '<i class="fa fa-angle-right">'],
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
    $('.owl-testimonios').owlCarousel({
        loop: true,
        margin: 10,
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
                items: 3
            }
        }
    });

    var tw = $(window).width();

    var rsl = 0;
    var rst = 0;
    $('.contenedor-mapa').children('div').addClass(function (i) {
        if (tw <= 1024) {
            var rsl = 7;
            var rst = 0;
        }
        if (tw <= 1012) {
            var rsl = 2;
            var rst = 0;
        }
        if (tw <= 970) {
            var rsl = 7;
            var rst = 0;
        }
        if (tw <= 600) {
            var rsl = 8;
            var rst = 2;
        }

        if (tw <= 375) {
            var rsl = 10;
            var rst = 2;
        }
        var pl = $(this).attr("data-l");
        var pt = $(this).attr("data-t");
        if (pl <= 50) {
            pl = pl - rsl;
        }
        else {
            pl = parseInt(pl) + parseInt(rsl) + 2;

        }
        pt = pt - rst;

        $(this).css("left", pl + '%');
        $(this).css("top", pt + '%');
        //return 'packkapp' + (i+1);
    });

    $(".contenedor-mapa div").each(function (index) {
        // console.log(index + ": " + $(this).attr("data-titlr"));
    });

    $(".paquete-location").each(function () {
        var name = $(this).attr("data-name");
        var first = name.split("-").shift();
        var last = name.split("-").pop();
        var text = first + '- <span class="text-muted">' + last + '</span>';
        $(this).html(text);
    });

});