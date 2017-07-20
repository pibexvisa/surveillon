<?php
	include '../../conexao/conexao.php'; /* include da conexão com o baco de dados */
	$nome =""; $competencia = ""; 
	$query = "select codigo,nome,competencia,descricao from caso where nome like ?";
	if (isset($_POST["nome"]) || isset($_POST["competencia"]) ){

		$nome = (isset($_POST["nome"])?$_POST["nome"]:"");
		$competencia = (isset($_POST["competencia"])?$_POST["competencia"]:"");
	
		if($competencia!="")
			$query.=" AND competencia = ?";

		$stmt = $conexao->prepare($query); 
		$stmt->bindValue(1,"%" .$nome."%");

		if($competencia!="")
			$stmt->bindValue(2,$competencia);

		$stmt->execute();

    }else{

      	$stmt = $conexao->query ("select codigo,nome,competencia from caso ");

    } 

	echo "
	<div class='all panel panel-success' id='resultBusca'>
		<div class='row panel-heading'>
			<div class='col-md-1'>
		        <b>Id</b>
		    </div>
		    <div class='col-md-3'>
		        <b>Nome</b>
		    </div>
		    <div class='col-md-3'>
		        <b>Competência</b>
		    </div>
		    <div class='col-md-2'>
		        <img src='geral/img/exclui.png' width='40'>
		    </div>
		    <div class='col-md-2'>
		        <img src='geral/img/alterar.png' width='40'>
		    </div>
		</div>";
    $resultado = $stmt->fetchAll();
    $cont=0; $class="";


    foreach($resultado as $linha){
    	$class = (($cont%2==0)?"":"active");

  echo 
  	"<div class='row list-group busca $class'>
	    <div class='col-md-1'>".
	         $linha['codigo']."
	    </div>
	    <div class='col-md-3'>".
	         $linha['nome']."
	    </div>
	    <div class='col-md-3'>";
	     switch($linha['competencia']){
			case 'va':
				echo 'Vigilância Ambiental';
			break;
			case 'vs':
				echo 'Vigilância Sanitária';
			break;
			case 've':
				echo 'Vigilância Epidemiológica';
			break;
			default:
				echo 'Não reconhecido';
		}
		echo "
	    </div>
	    <div class='col-md-2'>
	    	<a href='#' onclick=\"show_confirm('".$linha['codigo']."','geral/casos/deletar_caso.php','geral/casos/index.php');\">Excluir </a>
	    </div>
	    <div class='col-md-2'>
	    	<a href='#' onclick=\"carregaPagina('geral/casos/cadastrar_caso.php?codigo=".$linha['codigo']."');\">Alterar </a>
	    </div>
  	</div>";
  	$cont++;

    }  
echo "</div> 
<div id='pagi'></div>";
?>

