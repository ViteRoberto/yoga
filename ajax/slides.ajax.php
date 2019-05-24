<?php
	require_once '../controladores/slides.controlador.php';
	require_once '../modelos/slides.modelo.php';

	class AjaxLotes{

		public $idSlide;
		public $url;

		public function ajaxLeerSlide(){
			$leer = ControladorSlides::ctrMostrarSlides();
			echo json_encode($leer);
		}

		public function ajaxBorrarSlide(){
			$idSlide = $this->idSlide;
			$url = $this->url;

			$respuesta = ControladorSlides::ctrBorrarSlide($idSlide, $url);
			echo json_encode($respuesta);
		}
	}

	if(isset($_POST['borrarIdSlide'])){
		$borrar = new AjaxLotes();
		$borrar -> idSlide = $_POST['borrarIdSlide'];
		$borrar -> url = $_POST['borrarUrl'];
		$borrar -> ajaxBorrarSlide();
	}

	if(isset($_POST['leer'])){
		$leer = new AjaxLotes();
		$leer -> ajaxLeerSlide();
	}