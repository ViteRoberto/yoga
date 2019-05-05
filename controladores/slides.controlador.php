<?php
	class ControladorSlides{

		static public function ctrMostrarSlides(){
			$tabla = 'slide';
			$slides = ModeloSlides::mdlMostrarTabla($tabla);

			return $slides;
		}

		static public function ctrSubirSlide(){
			if(isset($_POST['nuevoTituloSlide'])){
				if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['nuevoTituloSlide'])){
					
					//VALIDAR IMAGEN
					$ruta = 'vistas/img/slides/slide0.png';

					if(isset($_FILES['nuevoUrlSlide']['tmp_name'])){
						list($ancho, $alto) = getimagesize($_FILES['nuevoUrlSlide']['tmp_name']);
						$nuevoAncho = 1840;
						$nuevoAlto = 1228;

						$directorio = 'vistas/img/slides/'.$_POST['nuevoTituloSlide'];

						//DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP

						//SI EL FORMATO ES JPG O PNG
						if($_FILES['nuevoUrlSlide']['type'] == 'image/jpeg'){
							$ruta = $directorio.'.jpg';

							$origen = imagecreatefromjpeg($_FILES['nuevoUrlSlide']['tmp_name']);
							$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

							imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
							imagejpeg($destino,$ruta);

						}elseif($_FILES['nuevoUrlSlide']['type'] == 'image/png'){
							$ruta = $directorio.'.png';

							$origen = imagecreatefrompng($_FILES['nuevoUrlSlide']['tmp_name']);
							$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

							imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
							imagepng($destino,$ruta);
						}
					}

					$tabla = 'slide';
					$datos = array('titulo' => $_POST['nuevoTituloSlide'],
								   'link' => $_POST['nuevoLinkSlide'],
								   'url' => $ruta,
								   'tipo' => $_POST['nuevoTipoSlide'],
								   'activo' => 1);
					$respuesta = ModeloSlides::mdlSubirSlide($tabla,$datos);
					if($respuesta == 'ok'){
						echo '<script>
							  swal.fire({
							  	type: "success",
							  	title: "¡Slide Agregado!",
							  	showConfirmButton: true,
							  	confirmButtonText: "Cerrar"
							  }).then((result)=>{
							  	if(result.value){
							  		window.location = "slides";
							  	}
							  })</script>';
					}else{
						echo '<script>
							  swal.fire({
							  	type: "error",
							  	title: "ERROR",
							  	showConfirmButton: true,
							  	confirmButtonText: "Cerrar"
							  }).then((result)=>{
							  	if(result.value){
							  		window.location = "slides";
							  	}
							  })</script>';						
					}
				}else{
					echo '<script>
						  swal.fire({
						  	type: "error",
						  	title: "El título no puede llevar caracteres especiales",
						  	showConfirmButton: true,
						  	confirmButtonText: "Cerrar"
						  }).then((result)=>{
						  	if(result.value){
						  		window.location = "slides";
						  	}
						  })</script>';
				}
			}
		}

	}