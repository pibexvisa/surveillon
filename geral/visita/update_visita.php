<head><meta charset="utf-8"></head>

<?php

include "../../conexao/conexao.php";

try{
	$stmt = $conexao->prepare("update visita
		set data=? ,hora=?,observacao=?,matricula_usuario=? where codigo = ?");

	$data= $_POST["data"]; 
	$hora= $_POST["hora"]; 
	$observacao= $_POST["observacao"]; 
	$matricula_usuario= $_POST["matricula_usuario"]; 
	$codigo= $_GET["codigo"]; 


	$stmt -> bindParam(1,$data);
	$stmt -> bindParam(2,$hora);
	$stmt -> bindParam(3,$observacao);
	$stmt -> bindParam(4,$matricula_usuario);
	$stmt -> bindParam(5,$codigo);



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

