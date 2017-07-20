<?php
include "../../conexao/conexao.php";
$conexao->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

try{
	
	$matricula = $_POST["matricula"];
	$senha = (isset($_POST["senha"])?$_POST["senha"]:"");
	$cpf = $_POST["cpf"];
	$nome = $_POST["nome"];
	$email = $_POST["email"];
	$telefone = $_POST["telefone"];
	$perfil = $_POST["perfil"];
	$codigo=(isset($_POST["codigo"])?$_POST["codigo"]:"");

	if($codigo==""){
		$senhaCripto = password_hash($senha,PASSWORD_DEFAULT);
		$query = "insert into usuario (matricula, senha, cpf, nome, email, telefone, perfil) values (?,?,?,?,?,?,?)";

		$stmt = $conexao->prepare($query);

		$stmt -> bindParam(1,$matricula);
		$stmt -> bindParam(2,$senhaCripto);
		$stmt -> bindParam(3,$cpf);
		$stmt -> bindParam(4,$nome);
		$stmt -> bindParam(5,$email);
		$stmt -> bindParam(6,$telefone);
		$stmt -> bindParam(7,$perfil);

	}else{
		
		$query = "update usuario set matricula =?, cpf=?, nome = ?, email=?, telefone=?, perfil=?";

		
		if($senha!=""){
			$senhaCripto = password_hash($senha,PASSWORD_DEFAULT);
			$query.=", senha=?";
		}

		$query.=" where codigo = ?";

		$stmt = $conexao->prepare($query);
		$stmt -> bindParam(1,$matricula);
		$stmt -> bindParam(2,$cpf);
		$stmt -> bindParam(3,$nome);
		$stmt -> bindParam(4,$email);
		$stmt -> bindParam(5,$telefone);
		$stmt -> bindParam(6,$perfil);
		if($senha!=""){
			$stmt -> bindParam(7,$senhaCripto);
			$stmt -> bindParam(8,$codigo);
		}else{
			$stmt -> bindParam(7,$codigo);
		}
	}

	$stmt->execute();

}catch(PDOException $e){
	echo 'ERROR: ' . $e->getMessage();
}


?>
