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

	var datos = new FormData();
	datos.append('borrarIdSlide',idSlide);

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