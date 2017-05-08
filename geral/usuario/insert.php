<?php
include ("../../conexao/conexao.php");

$matricula = $_POST["matricula"];
$senha = $_POST["senha"];
$cpf = $_POST["cpf"];
$nome = $_POST["nome"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];
$perfil = $_POST["perfil"];

//echo $matricula.$senha.$nome.$cpf.$email.$telefone.$perfil;

$senhaCripto = password_hash($senha,PASSWORD_DEFAULT);

$stmt = $conexao->prepare("insert into usuario (matricula, senha, cpf, nome, email, telefone, perfil) values (?,?,?,?,?,?,?)");

$stmt -> bindParam(1,$matricula);
$stmt -> bindParam(2,$senhaCripto);
$stmt -> bindParam(3,$cpf);
$stmt -> bindParam(4,$nome);
$stmt -> bindParam(5,$email);
$stmt -> bindParam(6,$telefone);
$stmt -> bindParam(7,$perfil);

$stmt->execute(); 

if($stmt->rowCount() >0){
			 echo '<script>
						alert("Usuário cadastrado com sucesso!");
						location.href="../usuario/index.php"
					</script>';
			}else{
			 echo '<script>
						alert("Erro ao cadastrar usuário!");
						location.href="../usuario/index.php"
					</script>';
			}



?>
