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

	echo '<table width=100% class="table table-striped">
	        <tr>
	          <td width=10% align="center"><b>Id</b></td>
	          <td width= 10% align="center"><b>Nome</b></td>
	          <td width= 10% align="center"><b>Competência</b></td>
	          <td width=10% align="center"><img src="geral/img/exclui.png" width="40"> <a></td>
	    	<td width=10% align="center"><img src="geral/img/alterar.png" width="40"> <a></td>
		  	</tr>
		  </table>';

    $resultado = $stmt->fetchAll();

    foreach($resultado as $linha){
		echo "<table width=100% class='table table-striped'>
       			<tr> 
		          <td width=10%  align='center'><p>". $linha['codigo']." </p></th>
		          <td width=10%  align='center'><p>". $linha['nome']."  </p></td>
		          <td width=10% align='center'><p>";
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
								echo 'Não reconhecido.';
						}
						echo "</p></td>
		          <td  width=10% align='center'><a href='#' onclick=\"show_confirm('".$linha['codigo']."','geral/casos/deletar_caso.php','geral/casos/index.php');\">Excluir <a></td>
		          <td width=10% align='center'><a href='#' onclick=\"carregaPagina('geral/casos/cadastrar_caso.php?codigo=".$linha['codigo']."');\">Alterar <a></td>

        		</tr>
    		</table> ";


    }  

?>
