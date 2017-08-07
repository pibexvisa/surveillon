
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
	
	$stmt = $conexao->prepare("update visita set data=? ,hora=?,observacao=?,matricula_usuario=? where codigo = ?");
	
	$dia= $_POST["dia"];
	$mes= $_POST["mes"]; 
	$ano= $_POST["ano"];  
	$hora= $_POST["hora"]; 
	$observacao= $_POST["observacao"]; 
	$matricula_usuario = $_POST["matricula"];
	
	$data = $ano."-".$mes."-".$dia;

	$stmt -> bindParam(1,$data);
	$stmt -> bindParam(2,$hora);
	$stmt -> bindParam(3,$observacao);
	$stmt -> bindParam(4,$matricula_usuario);
	$stmt -> bindParam(5,$_POST["codigo"]);

	}else {	

	$stmt = $conexao->prepare("insert into visita (data,hora,observacao,matricula_usuario) values (?,?,?,?)");
	
	$dia= $_POST["dia"];
	$mes= $_POST["mes"]; 
	$ano= $_POST["ano"];  
	$hora= $_POST["hora"]; 
	$observacao= $_POST["observacao"]; 
	$matricula_usuario = $_POST["matricula"];
	
	$data = $ano."-".$mes."-".$dia;

	$stmt -> bindParam(1,$data);
	$stmt -> bindParam(2,$hora);
	$stmt -> bindParam(3,$observacao);
	$stmt -> bindParam(4,$matricula_usuario);
	}
	$stmt->execute(); 

	}catch(PDOException $e){
	echo 'ERROR: ' . $e->getMessage();

	}

?>

