<head><meta charset="utf-8"></head>

<?php

include "../../conexao/conexao.php";

try{
	$stmt = $conexao->prepare("update visita
		set data=? ,hora=?,observacao=?,cod_usuario=? where codigo = ?");

	$data= $_POST["data"]; 
	$hora= $_POST["hora"]; 
	$observacao= $_POST["observacao"]; 
	$cod_usuario= $_POST["cod_usuario"]; 
	$cod_caso= $_GET["codigo"]; 


	$stmt -> bindParam(1,$data);
	$stmt -> bindParam(2,$hora);
	$stmt -> bindParam(3,$observacao);
	$stmt -> bindParam(4,$cod_usuario);
	$stmt -> bindParam(5,$cod_caso);



	$stmt->execute(); 

	if($stmt->rowCount() >0){
		echo '<script>
		alert("Visita alterada com sucesso!");
		location.href="../visita/index.php"
	</script>';
}else{
	echo '<script>
	alert("Erro ao alterar visita!");
	location.href="../visita/index.php"
</script>';
}	
}catch(PDOException $e){
	echo 'ERROR: ' . $e->getMessage();

}

?>

