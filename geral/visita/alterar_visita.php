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

    <script src="../../js/Jquery.maske/jquery-1.8.3.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="../../js/Jquery.maske/jquery.maskedinput.min.js" type="text/javascript"></script>


<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
	<script type="text/javascript">
        $(function(){
            $.mask.definitions['~'] = "[+-]";
            $("#data").mask("99/99/9999");
            $("#hora").mask("99:99:99");
        });	
	jQuery(function($){
      $.mask.definitions['H']='[012]';
      $.mask.definitions['N']='[012345]';
      $.mask.definitions['n']='[0123456789]';
      $("#hora").mask("Hn:Nn:Nn");
    });
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
            <h1 class="page-header">Visita</h1>
            <h4 class="sub-header">Alterar Visita</h4>
            <!--Incluir codigo aqui-->
            <div class="table-responsive">
             <?php
             try{
               include "../../conexao/conexao.php";
               $stmt = $conexao->prepare("select visita.data,visita.hora,visita.observacao,visita.codigo,visita.matricula_usuario from visita inner join usuario on visita.matricula_usuario = usuario.matricula where visita.codigo = ?");
               $cod_visita= $_GET["codigo"]; 
               $stmt->bindValue(1,$cod_visita);
               $stmt->execute();
               $resultado = $stmt->fetchAll();
               foreach($resultado as $linha){
                ?> 
                <div id="header" > 
                 <!-- NOSEARCH -->
                 <div id="toolbar"></div><br> 
                 
                 <form  method="POST" class="header" action="update_visita.php?codigo=<?php echo $linha['codigo']?>"> 
                   <div class="margimformadm">
                   
                    <center><fieldset style=" width:600px">
                     <table class="table table-striped">
                       <tr>
                        <td><b>Matricula do Funcionário:*</b></td>
                        <td>
                           <input type="text" name="matricula_usuario"  required="" class="form-control" value="<?php echo $linha['matricula_usuario'] ?>">
                        
                      </td>
                    </tr>
                    
                    <tr>
                      <td><b>Data:*</b></td>
                      <td>
                        <input type="text" name="data" id="data"  required="" maxlength="10" placeholder="ex: dd-mm-aaaa" class="form-control" value="<?php echo date("d/m/Y", strtotime($linha['data'])); ?>">
                      </td>
                    </tr>
                  </tr>
                  <tr>
                    <td><b>Hora:*</b></td>
                    <td>
                      <input maxlength="10" name="hora" id="hora" placeholder="ex: 00:00:00"  required=""  class="form-control" value="<?php echo $linha['hora'] ?>">
                    </td>
                  </tr>
                  <tr>
                    <td><b>Observação:*</b></td>
                    <td>
                      <textarea name="observacao" required=""  rows="4" cols="50" maxlength="200" class="form-control"> <?php echo $linha['observacao'] ?> </textarea> 
                    </td>
                  </tr>
                  <table class="table table-striped">
                <tr>
                  <td><a id="cancelar" href="../visita/index.php" class="btn btn-lg btn-primary btn-block">Cancelar</a></td>
                  <td><input type="submit" value="Cadastrar" class="btn btn-lg btn-primary btn-block"></td>
                </tr>
		</table>
                </table>
              </fieldset></center>
            </form> 
          </div>
          
        </body>
        </html> 
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
