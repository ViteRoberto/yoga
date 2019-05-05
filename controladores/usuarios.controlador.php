<?php 
	class ControladorUsuarios{
		// INGRESO DE USUARIO
		static public function ctrIngresoUsuario(){
			if(isset($_POST['usuario'])){
				if(preg_match('/^[a-zA-Z0-9]+$/', $_POST['usuario']) &&
				   preg_match('/^[a-zA-Z0-9ñÑáéíóú!""@#$%&()=?¡¿ ]+$/', $_POST['password'])){
					$tabla = 'usuario';
					$item = 'usuario';
					$valor = $_POST["usuario"];
					$respuesta = ModeloUsuarios::mdlMostrarUsuario($tabla,$item,$valor);
					if($respuesta['usuario'] == $_POST['usuario'] && $respuesta['password'] == $_POST['password']){
						$_SESSION['iniciarSesion'] = 'ok';
						echo '<script>window.location = "slides";</script>';
					}else{
						echo '<div class="alert alert-danger">Error al ingresar. Vuelve a intentarlo.</div>';
					}
				}
			}
		}
	}