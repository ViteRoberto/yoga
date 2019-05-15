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
					$ruta = 'vistas/img/slides/0.png';

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

		static public function ctrEditarSlide(){
			if(isset($_POST['editarTituloSlide'])){
				if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['editarTituloSlide'])){
					
					//SI NO EXISTE IMÁGEN, $RUTA = POST-FOTO ACTUAL
					$ruta = $_POST['editarUrlSlideActual'];

					if(isset($_FILES['editarUrlSlide']['tmp_name']) && !empty($_FILES['editarUrlSlide']['tmp_name'])){
						list($ancho, $alto) = getimagesize($_FILES['editarUrlSlide']['tmp_name']);
						$nuevoAncho = 1840;
						$nuevoAlto = 1228;

						$directorio = 'vistas/img/slides/'.$_POST['editarTituloSlide'];

						//VERIFICAR SI HAY UN NUEVO SLIDE PARA MODIFICAR LA ACTUL
						if(!empty($_POST['editarUrlSlideActual'])){
							unlink($_POST['editarUrlSlideActual']);
						}

						//DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP

						//SI EL FORMATO ES JPG O PNG
						if($_FILES['editarUrlSlide']['type'] == 'image/jpeg'){
							$ruta = $directorio.'.jpg';

							$origen = imagecreatefromjpeg($_FILES['editarUrlSlide']['tmp_name']);
							$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

							imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
							imagejpeg($destino,$ruta);

						}elseif($_FILES['editarUrlSlide']['type'] == 'image/png'){
							$ruta = $directorio.'.png';

							$origen = imagecreatefrompng($_FILES['editarUrlSlide']['tmp_name']);
							$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

							imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
							imagepng($destino,$ruta);
						}
					}

					$tabla = 'slide';
					$datos = array('idSlide' => $_POST['editarIdSlide'],
								   'titulo' => $_POST['editarTituloSlide'],
								   'link' => $_POST['editarLinkSlide'],
								   'url' => $ruta);
					$respuesta = ModeloSlides::mdlEditarSlide($tabla,$datos);
					if($respuesta == 'ok'){
						echo '<script>
							  swal.fire({
							  	type: "success",
							  	title: "¡Slide Editado'.$ruta.'!",
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

		static public function ctrBorrarSlide($idSlide){
			$tabla = 'slide';
			$respuesta = ModeloSlides::mdlBorrarSlide($tabla,$idSlide);

			return $respuesta;
		}

	}