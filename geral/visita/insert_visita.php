
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>


<?php

include "../../conexao/conexao.php";

try{
	$stmt = $conexao->prepare("insert into visita
		(data,hora,observacao,cod_usuario) values (?,?,?,?)");


	$data= $_POST["data"]; 
	$hora= $_POST["hora"]; 
	$observacao= $_POST["observacao"]; 
	$matricula= $_POST["matricula"]; 


	$stmt -> bindParam(1,$data);
	$stmt -> bindParam(2,$hora);
	$stmt -> bindParam(3,$observacao);
	$stmt -> bindParam(4,$matricula);


	$stmt->execute(); 

	if($stmt->rowCount() >0){
		echo '<script>
		alert("Visita cadastrado com sucesso!");
		location.href="../visita/index.php"
	</script>';
}else{
	echo '<script>
	alert("Erro ao cadastrar a Visita!");
</script>';
}	


}catch(PDOException $e){
	echo 'ERROR: ' . $e->getMessage();

}

?>

