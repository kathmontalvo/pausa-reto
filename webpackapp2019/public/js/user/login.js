$(document).on('click', '.yamm .dropdown-menu', function(e) {
    e.stopPropagation()
});

$('.arriba').click(function(e){				
	e.preventDefault();		//evitar el eventos del enlace normal
	var strAncla=$(this).attr('href'); //id del ancla
	$('body,html').stop(true,true).animate({				
		scrollTop: $(strAncla).offset().top
	},1000);
});

$(window).scroll(function(){
	var windowHeight = $(window).scrollTop();
    if(windowHeight >= 300){
	  $(".arriba").css("display","block");
    }
	else{
		$(".arriba").css("display","none");
	}
});

function mostrarImagen(input,variable) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function (e) {
			$('.avatar-perfil .img-circle').attr('src', e.target.result);
		}
		reader.readAsDataURL(input.files[0]);
	}
}

$(".file-avatar").change(function(){
	var variable = $(this).attr('data-var');
	mostrarImagen(this,variable);
});
$(document).ready(function(e){
	 $("#login").validate({
    	// e.preventDefault();
        submitHandler: function(form){
            console.log("exito");
        },
    });
});
