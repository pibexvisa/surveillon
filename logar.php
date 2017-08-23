<?php
	include("conexao/conexao.php");

	$matricula = $_POST["matricula"];
	$senha = $_POST["inputPassword"];

	try{
		$stmt= $conexao->prepare("select senha, nome, perfil from usuario where matricula = ?");
		$stmt->bindParam(1,$matricula);
		$stmt->execute();
		$resultado = $stmt->fetchAll();

		foreach($resultado as $linha){
			if(password_verify($senha, $linha["senha"])){
				session_start();
				$_SESSION["matricula"] = $matricula;
				$_SESSION["nome"] = $linha["nome"];
				$_SESSION["perfil"] = $linha["perfil"];

				echo "ok";
			}else{
				echo "notok";
			}
		}


	}catch(PDOException $e){

	}