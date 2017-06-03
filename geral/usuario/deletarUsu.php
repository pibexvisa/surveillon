
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<?php
include '../../conexao/conexao.php'; 

try{
	$stmt = $conexao->prepare("delete from usuario where codigo = ?");
	$cod= $_GET["codigo"]; 
	$stmt -> bindParam(1,$cod);    
	$stmt->execute(); 

	if($stmt->rowCount() >0){
		echo '<script>
		alert("Usuário excluido com sucesso!");
		location.href="../usuario/index.php"
	</script>';
}else{
	echo '<script>
	alert("Erro ao excluir usuário!");
	location.href="../usuario/index.php"
</script>';
}	
}catch(PDOException $e){
	echo 'ERROR: ' . $e->getMessage();
}
?>

