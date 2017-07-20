
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<?php
include "../../conexao/conexao.php";  
try{
	$stmt = $conexao->prepare("delete from visita where codigo = ?");
	$cod_caso= $_GET["codigo"]; 
	$stmt -> bindParam(1,$cod_caso);    
	$stmt->execute(); 

	if($stmt->rowCount() >0){
		echo '<script>
		alert("Visita excluida com sucesso!");
		location.href="../visita/index.php"
	</script>';
}else{
	echo '<script>
	alert("Erro ao excluir a visita!");
	location.href="../visita/index.php"
</script>';
}	
}catch(PDOException $e){
	echo 'ERROR: ' . $e->getMessage();
}
?>

