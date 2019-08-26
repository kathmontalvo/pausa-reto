$(document).on('click', '.yamm .dropdown-menu', function(e) {
	e.stopPropagation();
});

// $(".yamm").click(function(){
// 	$("#navbar-collapse-grid").removeClass("in");
// });
$("#ocultar-nav").click(function(){
	console.log("click oculta");
	$("#navbar-collapse-grid").removeClass("in");
	$("#ocultar-nav").hide();
});

$(document).on('click', '#navbar-collapse-grid', function(e) {
	e.stopPropagation();
});
$(document).ready(function(){
	$.ajaxSetup({
        headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
    });
	$("#item-detalle-menu").mCustomScrollbar();

	$(".navbar-toggle").click(function(){
		$("#ocultar-nav").toggle();
	});
	
	$("#mapa-region path").click(function(){
		var re = $(this).attr("data-d");
		console.log(re);
		var idioma = $("input[name='data_idioma']").val();
		$("path.active").removeClass("active");
		$(this).addClass("active");
		$(".link-mapa-menu a").removeClass("active");
		$(".link-mapa-menu ."+re).addClass("active");

		$.post('/menus/rutas',{re:re,idioma:idioma}, function(data){
			//console.log(data);
			$("#item-detalle-menu .mCSB_container").html(data);
			//$("#data_ruta_pots").html(data);
		});
	});

	$(".link-mapa-menu a").click(function(e){
		e.preventDefault();
		//console.log(data);

		var idioma = $("input[name='data_idioma']").val();

		var re = $(this).attr("data-r");
		console.log("este es re di: "+re);
		$.post('/menus/rutas',{re:re,idioma:idioma}, function(data){
			$("#item-detalle-menu .mCSB_container").html(data);
			//$("#data_ruta_pots").html(data);
		});

		$(".link-mapa-menu a.active").removeClass("active");
		$(this).addClass("active");
		$("path.active").removeClass("active");
		$("path."+re).addClass("active");
	});

	$("#enviarcontacto").submit(function(e){
		e.preventDefault();
		$("#enviarcontacto .btn-naranja").hide();
		var data= $("#enviarcontacto").serialize();
		$.ajax({
            url: '/emails/create',
            type: 'POST',
            data: data,
            beforeSend: function(){
            	$(".alerta").show();
            	$(".alerta").html('<div class="text-alert">'+$("input[name='data_enviando']").val()+'</div>');
            },
            success: function(response)
            {
            	$("#enviarcontacto .btn-naranja").show();
            	if(response == "exito"){
            		$(".alerta").html('<div class="text-success">'+$("input[name='data_tu_mensaje']").val()+'</div>');
            		$('#enviarcontacto')[0].reset();
            		setTimeout(function(){
            			$(".alerta").hide();
            		}, 2000);
            	}
            	else{
            		$(".alerta").html('<div class="text-danger">'+$("input[name='data_error']").val()+'</div>');
            	}
                //console.log(response);
            }
        });

	});
});