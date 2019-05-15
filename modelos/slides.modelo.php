<?php
	require_once 'conexion.php';
	
	class ModeloSlides{

		static public function mdlMostrarTabla($tabla){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
			if($stmt -> execute()){
				return $stmt -> fetchAll();
			}else{
				return $stmt -> errorInfo();
			}
		}

		static public function mdlSubirSlide($tabla, $datos){
			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (titulo, link, url, tipo, activo) VALUES (:titulo, :link, :url, :tipo, :activo)");

			$stmt -> bindParam(':titulo', $datos['titulo'], PDO::PARAM_STR);
			$stmt -> bindParam(':link', $datos['link'], PDO::PARAM_STR);
			$stmt -> bindParam(':url', $datos['url'], PDO::PARAM_STR);
			$stmt -> bindParam(':tipo', $datos['tipo'], PDO::PARAM_STR);
			$stmt -> bindParam(':activo', $datos['activo'], PDO::PARAM_STR);

			if($stmt -> execute()){
				return 'ok';
			}else{
				return $stmt -> errorInfo();
			}
		}

		static public function mdlEditarSlide($tabla, $datos){
			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET titulo = :titulo, link = :link, url = :url WHERE idSlide = :idSlide");

			$stmt -> bindParam(':idSlide', $datos['idSlide'], PDO::PARAM_STR);
			$stmt -> bindParam(':titulo', $datos['titulo'], PDO::PARAM_STR);
			$stmt -> bindParam(':link', $datos['link'], PDO::PARAM_STR);
			$stmt -> bindParam(':url', $datos['url'], PDO::PARAM_STR);

			if($stmt -> execute()){
				return 'ok';
			}else{
				return $stmt -> errorInfo();
			}
		}

		static public function mdlBorrarSlide($tabla, $datos){
			$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idSlide = :idSlide");
			$stmt -> bindParam(":idSlide", $datos, PDO::PARAM_STR);
			if($stmt -> execute()){
				return 'ok';
			}else{
				return $stmt -> errorInfo();
			}
		}

	}