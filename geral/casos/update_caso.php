<head><meta charset="utf-8"></head>

<?php

include "../../conexao/conexao.php";

try{
	$stmt = $conexao->prepare("update caso
		set nome=? ,competencia=?,descricao=? where codigo = ?");

	$nome= $_POST["nome"]; 
	$competencia= $_POST["competencia"]; 
	$descricao= $_POST["descricao"]; 
	$cod_caso= $_GET["codigo"]; 


	$stmt -> bindParam(1,$nome);
	$stmt -> bindParam(2,$competencia);
	$stmt -> bindParam(3,$descricao); 
	$stmt -> bindParam(4,$cod_caso);   


	$stmt->execute(); 

	if($stmt->rowCount() >0){
		echo '<script>
		alert("Caso alterado com sucesso!");
		location.href="../casos/index.php"
	</script>';
}else{
	echo '<script>
	alert("Erro ao alterar Caso!");
	location.href="../casos/index.php"
</script>';
}	
}catch(PDOException $e){
	echo 'ERROR: ' . $e->getMessage();

}

?>

