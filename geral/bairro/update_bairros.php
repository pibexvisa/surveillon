<head><meta charset="utf-8"></head>

<?php

include '../../conexao/conexao.php';

try{
	$stmt = $conexao->prepare("update bairro
		set nome=? ,area=? where codigo = ?");

	$nome= $_POST["nome"]; 
	$area= $_POST["area"]; 
	$cod= $_GET["codigo"]; 


	$stmt -> bindParam(1,$nome);
	$stmt -> bindParam(2,$area);
	$stmt -> bindParam(3,$cod);    


	$stmt->execute(); 

	if($stmt->rowCount() >0){
		echo '<script>
		alert("Bairro alterado com sucesso!");
		location.href="../bairro/index.php"
	</script>';
}else{
	echo '<script>
	alert("Erro ao alterar bairro!");
	location.href="../bairro/index.php"
</script>';
}	
}catch(PDOException $e){
	echo 'ERROR: ' . $e->getMessage();

}

?>

