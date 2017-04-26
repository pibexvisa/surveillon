<head><meta charset="utf-8"></head>

<?php

include '../../conexao/conexao.php';

try{
	$stmt = $conexao->prepare("update usuario set matricula=?,nome=?,email=?,telefone=?,perfil=? where matricula = ?");

	$matricula= $_GET["matricula"]; 
	$nome= $_POST["nome"]; 
	$cpf= $_POST["cpf"];
	$email = $_POST["email"];
	$telefone = $_POST["telefone"];
	$perfil = $_POST["perfil"];


	$stmt -> bindParam(1,$matricula);
	$stmt -> bindParam(2,$nome);
	$stmt -> bindParam(3,$cpf);
	$stmt -> bindParam(4,$email);
	$stmt -> bindParam(5,$telefone);
	$stmt -> bindParam(6,$perfil);
	    


	$stmt->execute(); 

	if($stmt->rowCount() >0){
		echo '<script>
		alert("Alteração feita com sucesso!");
		location.href="../bairro/index.php"
	</script>';
}else{
	echo '<script>
	alert("Erro na alteração!");
	location.href="../bairro/index.php"
</script>';
}	
}catch(PDOException $e){
	echo 'ERROR: ' . $e->getMessage();

}

?>

