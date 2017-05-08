<head><meta charset="utf-8"></head>

<?php

include '../../conexao/conexao.php';
	
	$matricula= $_GET["matricula"]; 
	$nome= $_POST["nome"]; 
	$cpf= $_POST["cpf"];
	$email = $_POST["email"];
	$telefone = $_POST["telefone"];
	$perfil = $_POST["perfil"];
	

	$stmt = $conexao->prepare("update usuario set cpf=?, nome=?,email=?,telefone=?,perfil=? where matricula = ?");
	
	$stmt -> bindParam(1,$cpf);
	$stmt -> bindParam(2,$nome);
	$stmt -> bindParam(3,$email);
	$stmt -> bindParam(4,$telefone);
	$stmt -> bindParam(5,$perfil);
	$stmt -> bindParam(6,$matricula);
	    


	$stmt->execute(); 

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

