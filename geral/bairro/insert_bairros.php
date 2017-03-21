
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>


<?php

include '../../conexao/conexao.php';

try{
$stmt = $conexao->prepare("insert into bairro
(nome,area) values (?,?)");

$nome= $_POST["nome"]; 
$area= $_POST["area"]; 



$stmt -> bindParam(1,$nome);
$stmt -> bindParam(2,$area);

 
  
$stmt->execute(); 

  if($stmt->rowCount() >0){
			 echo '<script>
						alert("Bairro cadastrado com sucesso!");
						location.href="../bairro/index.php"
					</script>';
			}else{
			 echo '<script>
						alert("Erro ao cadastrar bairro!");
					</script>';
			}	


}catch(PDOException $e){
echo 'ERROR: ' . $e->getMessage();

}

?>

