<head><meta charset="utf-8"></head>

<?php

include '../../conexao/conexao.php';
	
	$codigo= $_GET["codigo"];
	$matricula= $_POST["matricula"];
	$senha = $_POST["senha"];
	$nome= $_POST["nome"]; 
	$cpf= $_POST["cpf"];
	$email = $_POST["email"];
	$telefone = $_POST["telefone"];
	$perfil = $_POST["perfil"];
	
	try{
	
	if($_POST["senha"] != null){

	$stmt = $conexao->prepare("update usuario set  matricula=?, senha=?, cpf=?, nome=?,email=?,telefone=?,perfil=? where codigo =?");
	
	$stmt -> bindParam(1,$matricula);
	$stmt -> bindParam(2,$senha);
	$stmt -> bindParam(3,$cpf);
	$stmt -> bindParam(4,$nome);
	$stmt -> bindParam(5,$email);
	$stmt -> bindParam(6,$telefone);
	$stmt -> bindParam(7,$perfil);
	$stmt -> bindParam(8,$codigo);

	$stmt->execute(); 
	}else{

	$stmt = $conexao->prepare("update usuario set  matricula=?, cpf=?, nome=?,email=?,telefone=?,perfil=? where codigo =?");
	
	$stmt -> bindParam(1,$matricula);
	$stmt -> bindParam(2,$cpf);
	$stmt -> bindParam(3,$nome);
	$stmt -> bindParam(4,$email);
	$stmt -> bindParam(5,$telefone);
	$stmt -> bindParam(6,$perfil);
	$stmt -> bindParam(7,$codigo);
	
	
	$stmt->execute(); 
	}
  	}catch(PDOException $e){
  	echo 'ERROR: ' . $e->getMessage();
  	} 

	if($stmt->rowCount() >0){
		echo '<script>
		alert("Alteração feita com sucesso!");
		location.href="../usuario/index.php"
	</script>';
		}else{
			echo '<script>
			alert("Erro na alteração!");
			location.href="../usuario/index.php"
	</script>';
	}
?>

