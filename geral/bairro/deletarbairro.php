
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<?php
include '../../conexao/conexao.php'; 

try{
	$stmt = $conexao->prepare("delete from bairro where codigo = ?");
	$cod= $_POST["codigo"]; 
	$stmt -> bindParam(1,$cod);    
	$stmt->execute(); 

}catch(PDOException $e){
	echo 'ERROR: ' . $e->getMessage();
}
?>

