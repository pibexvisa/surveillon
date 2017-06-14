<!DOCTYPE html>
<!-- saved from url=(0043)http://getbootstrap.com/examples/dashboard/ -->
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="../css/adm.css"/>
	<meta charset="utf-8">

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="http://getbootstrap.com/favicon.ico">
	
	<link rel="stylesheet" type="text/css" href="../../css/cadastro.css"/>
	<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../js/jquery.js"></script>
	<script type="text/javascript" src="../../js/jquery.validate.js"></script>
	<script type="text/javascript" src="../../js/validaUsu.js"></script>

	<title>Surveillon</title>

	<!-- Bootstrap core CSS -->
	<link href="../../css/bootstrap.min.css" rel="stylesheet">

	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<link href="../../css/ie10-viewport-bug-workaround.css" rel="stylesheet">

	<link href="../../css/surveillon.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="../../css/dashboard.css" rel="stylesheet">

	<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
	<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
	<script src="../js/ie-emulation-modes-warning.js.download"></script>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
	<script type="text/javascript">
	function habilitar(){
        if(document.getElementById('hab').checked){
            document.getElementById('senhaa').removeAttribute("disabled");
        }
        else {
            document.getElementById('onoff').value=''; //Evita que o usuário defina um texto e desabilite o campo após realiza-lo
            document.getElementById('senhaa').setAttribute("disabled", "disabled");
        }
    }

	</script>
  </head>

  <body>


  	<!--Topo do Sistema-->
  	<?php include("../../geral/topo.php");?>
  	<!--Fim do Topo do Sistema-->

  	<div class="container-fluid">
  		<div class="row">
  			<!--Lateral Esquerda-->
  			<?php include("../../geral/sidebar.php");?>
  			<!--Fim Lateral Esquerda-->
  			<!--Area Central do Sistema-->
  			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  				<h1 class="page-header">Alterar Dados do usuário</h1>

			<?php
  			     try{
  			include "../../conexao/conexao.php";
  			$stmt = $conexao->prepare("select * from usuario where codigo = ?");
  			$cod_caso= $_GET["codigo"]; 
 			$stmt->bindValue(1,$cod_caso);
 			$stmt->execute();
  			$resultado = $stmt->fetchAll();
  			foreach($resultado as $linha){
  			    ?> 
  				<div id="header" > 
  				<!-- NOSEARCH -->
  				<div id="toolbar"></div><br> 

  		<form id="cadastro" action="updateUsu.php?codigo=<?php echo $linha['codigo']?>" method="POST" class="header"> 
  				<div class="margimformadm">

  		<center><ul>
		<fieldset style=" width:400px"><table  border="0" class="table table-striped">
	
			<tr><li>
			<td width=30%><label for="nome"><b>Matricula:</b></label></td>
			<td><input type="text" name="matricula" maxlength="" class="form-control" value="<?php echo $linha["matricula"] ?>"></td>
			</li></tr>

	
		<tr><li>
		<td><label for="nome"><b>Alterar senha:</b></label></td>
		<td><input type="password" name="senhaa" id="senhaa" class="form-control" disabled></td>
		<tr><td></td><td>Selecione se deseja alterar  <input type="checkbox" value="alterar" id="hab" name="hab" onclick="habilitar()" name="alterarSenha"></td></tr>
		</li></tr>
				
  			<tr><li>
  			<td><label for="nome"><b>Nome:</b></label></td>
  			<td><input type="text" class="form-control" name="nome"  value="<?php echo $linha["nome"] ?>"></td>
  			</li></tr>
  				<tr><li>
  				<td><label for="nome"><b>Cpf:</b></label></td>
  				<td><input type="text" class="form-control" name="cpf" maxlength="11" value="<?php echo $linha["cpf"] ?>"></td>
  				</li></tr>			
  			
			
			<tr><li>
  			<td><label for="nome"><b>Email:</b></label></td>
  			<td><input type="text" class="form-control" name="email"  value="<?php echo $linha["email"] ?>"></td>
  			</li></tr>

			<tr><li>
  			<td><label for="nome"><b>Telefone:</b></label></td>
  			<td><input type="text" class="form-control" name="telefone" maxlength="11" value="<?php echo $linha["telefone"] ?>"></td>
  				</li></tr>
	
		<tr><li>
               <td><label for="nome"><b>Tipo de perfil:</b></label></td>
               <td>
                  <?php	$array_teste = array('Administrador','Funcionário'); 
                 $valor_compara = $linha['perfil'];
                 echo '<select name="perfil" class="form-control" id="select">';
                 foreach($array_teste as $val){
                   $sel = ($val == $valor_compara)?'selected="selected"':'';
                   echo '<option value="'.$val.'" '.$sel.'>'.$val.'</option>';
                 } ?>
               </select>
             </td>
           </li></tr>
	
			<table class="table table-striped">
                	<tr>
                  	<td><a id="cancelar" href="../usuario/index.php" class="btn btn-lg btn-primary btn-block">Cancelar</a></td>
                	  <td><input type="submit" value="Alterar" class="btn btn-lg btn-primary btn-block"></td>
                	</tr>
			</table></ul>
  			</table></fieldset></center>
			</form> 
  		</div>

  					<?php
  						} 
  							}catch(PDOException $e){
  							echo 'ERROR: ' . $e->getMessage();
  						} 
  					?>
</div>
  				<!--Fim da Area Central do Sistema-->
  			</div>
  		</div>

 <!-- Bootstrap core JavaScript
 ================================================== -->
 <!-- Placed at the end of the document so the pages load faster -->
 <script src="js/jquery.min.js.download"></script>
 <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
 <script src="js/bootstrap.min.js.download"></script>
 <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
 <script src="js/holder.min.js.download"></script>
 <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 <script src="js/ie10-viewport-bug-workaround.js.download"></script>


</body><object id="98ab2918-b948-b0ba-3878-8ba9ea92aab8" width="0" height="0" type="application/gas-events-cef"></object></html>
