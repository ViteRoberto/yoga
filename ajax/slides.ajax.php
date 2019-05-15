<?php
	require_once '../controladores/slides.controlador.php';
	require_once '../modelos/slides.modelo.php';

	class AjaxLotes{

		public $idSlide;

		public function ajaxBorrarSlide(){
			$idSlide = $this->idSlide;

			$respuesta = ControladorSlides::ctrBorrarSlide($idSlide);
			echo json_encode($respuesta);
		}
	}

	if(isset($_POST['borrarIdSlide'])){
		$borrar = new AjaxLotes();
		$borrar -> idSlide = $_POST['borrarIdSlide'];
		$borrar -> ajaxBorrarSlide();
	}