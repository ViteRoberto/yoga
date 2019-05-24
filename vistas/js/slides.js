$('.nuevaFoto').change(function(){
	var imagen = this.files[0];
	console.log("imagen", imagen);

	//VALIDAMOS EL FORMATO DE LA IMAGEN

	if(imagen['type'] != 'image/jpeg' && imagen['type'] != 'image/jpg' && imagen['type'] != 'image/png'){
		$('.nuevaFoto').val('');
		swal.fire({
			type: 'error',
			title: 'Error al subir la imagen',
			text: 'La imagen debe estar en formato JPG o PNG',
			confirmButtonText: 'Cerrar'
		});
	}else if(imagen['size'] > 2000000){
		$('.nuevaFoto').val('');
		swal.fire({
			type: 'error',
			title: 'Error al subir la imagen',
			text: 'La imagen no debe de pesar más de 2MB',
			confirmButtonText: 'Cerrar'
		});
	}else{
		var datosImagen = new FileReader();
		datosImagen.readAsDataURL(imagen);
		$(datosImagen).on('load', function(event){
			var rutaImagen = event.target.result;
			$(".previsualizar").attr('src',rutaImagen);
		});
	}
});

/*========================================================
=            OBTENER ÚLTIMO ID SLIDE EN MODAL            =
========================================================*/

$(document).on('click','.btnAgregarSlide', function(){
	$("#ultimoIdPrincipalModal").val($("#ultimoIdPrincipal").val());
})

/*=====  End of OBTENER ÚLTIMO ID SLIDE EN MODAL  ======*/


/*====================================
=            EDITAR SLIDE            =
====================================*/

$(document).on('click','.btnEditarSlide', function(){
	var idSlide = $(this).attr('idSlide');
	var titulo = $(this).attr('titulo');
	var link = $(this).attr('link');
	var url = $(this).attr('url');

	//AGREGAMOS LOS DATOS DEL SLIDE A MODIFICAR, EN LOS INPUTS DEL MODAL.

	$("#editarIdSlide").val(idSlide);
	$("#editarUrlSlideActual").val(url);
	$("#editarTituloSlide").val(titulo);
	$("#editarLinkSlide").val(link);
	$("#mostrarUrlSlide").attr('src',url);

})

/*=====  End of EDITAR SLIDE  ======*/

/*====================================
=            BORRAR SLIDE            =
====================================*/

$(document).on('click','.btnBorrarSlide', function(){
	var idSlide = $(this).attr('idSlide');
	var url = $(this).attr('url');

	var datos = new FormData();
	datos.append('borrarIdSlide',idSlide);
	datos.append('borrarUrl',url);

	swal.fire({
		title: '¿Seguro que desea borrar el slide?',
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d5',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, Borrra Slide'
	}).then((result) => {
		if(result.value){
			$.ajax({
				url:'ajax/slides.ajax.php',
				method:"POST",
				data: datos,
				cache: false,
				contentType:false,
				processData:false,
				dataType:'json',
				success: function(respuesta){
					var datos1 = new FormData();
					datos1.append('leer','leer');
					$.ajax({
						url: 'ajax/slides.ajax.php',
						method: 'POST',
						data: datos1,
						cache: false,
						contentType: false,
						processData: false,
						dataType: 'json',
						success: function(respuesta1){
							var active = '';
							for (var i = respuesta1.length - 1; i >= 0; i--) {
								if(i == respuesta1.length - 1){
									active = 'active';
								}else{
									active = '';
								}
							 $("#slidesPrincipal").html('<div class="principal-'+respuesta1[i]['idSlide']+' item '+active+'"><img src="'+respuesta1[i]['url']+'"><div class="carousel-caption">'+respuesta1[i]['titulo']+'</div></div>')
							}
						}
					});
					
					swal.fire({
						type: 'success',
						title: 'Slide Eliminado',
						showConfirmButton: true,
						confirmButtonText: 'Ok'
					}).then((result)=>{
						if(result.value){
							$(".principal-"+idSlide).remove();
						}
					})
				}
			});
		}
	})
})