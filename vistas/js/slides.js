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