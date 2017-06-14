
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>


<?php

include "../../conexao/conexao.php";

	$data= $_POST["data"]; 
	$hora= $_POST["hora"]; 
	$observacao= $_POST["observacao"]; 
	$matricula_usuario = $_POST["matricula"];
	
	function inverteData($data){
    if(count(explode("/",$data)) > 1){
        return implode("-",array_reverse(explode("/",$data)));
    }elseif(count(explode("-",$data)) > 1){
        return implode("/",array_reverse(explode("-",$data)));
    }
}

try{
	$stmt = $conexao->prepare("insert into visita (data,hora,observacao,matricula_usuario) values (?,?,?,?)");

	$stmt -> bindParam(1,inverteData($data));
	$stmt -> bindParam(2,$hora);
	$stmt -> bindParam(3,$observacao);
	$stmt -> bindParam(4,$matricula_usuario);


	$stmt->execute(); 

	if($stmt->rowCount() >0){
		echo '<script>
		alert("Visita cadastrada com sucesso!");
		location.href="../visita/index.php"
	</script>';
}else{
	echo '<script>
	alert("Erro ao cadastrar a Visita!");
	location.href="../visita/index.php"
</script>';
}	


}catch(PDOException $e){
	echo 'ERROR: ' . $e->getMessage();

}

?>

