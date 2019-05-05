<?php
	require_once 'conexion.php';
	class ModeloUsuarios{
		static public function mdlMostrarUsuario($tabla,$item,$valor){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM usuario WHERE $item = :$item");
			$stmt -> bindParam(':'.$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt -> fetch();
			$stmt -> close();
			$stmt = null;
		}
	}