
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
		$stmt = $conexao->prepare("update bairro set nome=?, area =? where codigo=?");

		$nome= $_POST["nome"]; 
		$area= $_POST["area"]; 

		$stmt -> bindParam(1,$nome);
		$stmt -> bindParam(2,$area);
		$stmt -> bindParam(3,$_POST["codigo"]);
	}else{

		$stmt = $conexao->prepare("insert into bairro (nome,area) values (?,?)");

		$nome= $_POST["nome"]; 
		$area= $_POST["area"];  

		$stmt -> bindParam(1,$nome);
		$stmt -> bindParam(2,$area);
	}
	$stmt->execute(); 


}catch(PDOException $e){
	echo 'ERROR: ' . $e->getMessage();

}

?>

