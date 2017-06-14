<!DOCTYPE html>
<!-- saved from url=(0043)http://getbootstrap.com/examples/dashboard/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="http://getbootstrap.com/favicon.ico">

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
  <h1 class="page-header">Casos</h1>
  <h4 class="sub-header">Alterar Caso</h4>
  <!--Incluir codigo aqui-->
  <div class="table-responsive">
    <?php
    try{
      include "../../conexao/conexao.php";
      $stmt = $conexao->prepare("select codigo,nome,competencia,descricao from caso where codigo = ?");
      $cod_caso= $_GET["codigo"]; 
      $stmt->bindValue(1,$cod_caso);
      $stmt->execute();
      $resultado = $stmt->fetchAll();
      foreach($resultado as $linha){ 
        ?> 
        <div id="header" > 
          <!-- NOSEARCH -->
          <div id="toolbar"></div><br> 


          <form action="update_caso.php?codigo=<?php echo $linha['codigo']?>" method="POST" class="header"> 
           <div class="margimformadm">

            <center><fieldset style=" width:600px">
             <table  class="table table-striped" border="0">
              <tr>
               <td><b>Nome:</b></td>
               <td><input class="form-control" type="text" name="nome"  value="<?php echo  $linha['nome'] ?>"></td>
             </tr>
             <tr>
               <td><b>Competência:</b></td>
               <td>
                 <?php	$array_teste = array('Vigilância Sanitária','Vigilância Ambiental','Vigilância Epidemiologica'); 
                 $valor_compara = $linha['competencia'];
                 echo '<select name="competencia" class="form-control" id="select">';
                 foreach($array_teste as $val){
                   $sel = ($val == $valor_compara)?'selected="selected"':'';
                   echo '<option value="'.$val.'" '.$sel.'>'.$val.'</option>';
                 } ?>
               </select>
             </td>
           </tr>
           <tr>
             <td><b>Descrição:</b></td>
             <td><textarea class="form-control" name="descricao" required=""  rows="4" cols="50" maxlength="200"> <?php  echo $linha['descricao'] ?></textarea><td>
             </tr>
             		<table class="table table-striped">
                	<tr>
                  	<td><a id="cancelar" href="../casos/index.php" class="btn btn-lg btn-primary btn-block">Cancelar</a></td>
                	  <td><input type="submit" value="Cadastrar" class="btn btn-lg btn-primary btn-block"></td>
                	</tr>
			</table>
          </table>
        </fieldset></center>
      </form> 
    </div>

  </body>
  </html> 

  <?php 	} 
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
