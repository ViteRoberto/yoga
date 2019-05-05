<?php
	
	// CONTROLADORES
	require_once "controladores/plantilla.controlador.php";
	require_once "controladores/productos.controladores.php";
	require_once "controladores/slides.controlador.php";
	require_once "controladores/usuarios.controlador.php";

	// MODELOS
	require_once "modelos/productos.modelo.php";
	require_once "modelos/slides.modelo.php";
	require_once "modelos/usuarios.modelo.php";

	$plantilla = new ControladorPlantilla();
	$plantilla -> ctrPlantilla();