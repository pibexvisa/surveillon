
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<?php

include "../../conexao/conexao.php";

try{
	$conexao->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	if($_POST["codigo"] != ""){
		$stmt = $conexao->prepare("update caso set nome=?, competencia =?,descricao =? where codigo=?");

		$nome= $_POST["nome"]; 
		$competencia= $_POST["competencia"]; 
		$descricao= $_POST["descricao"]; 

		$stmt -> bindParam(1,$nome);
		$stmt -> bindParam(2,$competencia);
		$stmt -> bindParam(3,$descricao);
		$stmt -> bindParam(4,$_POST["codigo"]);
	}else{

		$stmt = $conexao->prepare("insert into caso (nome,competencia,descricao) values (?,?,?)");

		$nome= $_POST["nome"]; 
		$competencia= $_POST["competencia"]; 
		$descricao= $_POST["descricao"]; 

		$stmt -> bindParam(1,$nome);
		$stmt -> bindParam(2,$competencia);
		$stmt -> bindParam(3,$descricao);
	}
	$stmt->execute(); 

	if($stmt->rowCount() >0){
		/*echo '<script>
		alert("caso cadastrado com sucesso!");
	</script>';*/
	}else{
	/*	echo '<script>
		alert("Erro ao cadastrar caso!");
	</script>';*/
	}	


}catch(PDOException $e){
	echo 'ERROR: ' . $e->getMessage();

}

?>

