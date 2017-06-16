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
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.min.js"></script>
	<script src="../../js/validarVisita.js"></script>
	
	
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
            <h1 class="page-header">Visitas</h1>
            <h4 class="sub-header">Nova Visita</h4>
            <!--Incluir codigo aqui-->
            <div class="table-responsive">
              <form action="insert_visita.php" method="POST" > 
                <div class="margimformadm">
                  <h1 class="hidden"><span id="logo">CADASTRAMENTO DE VISITAS</span></h1>
                  <?php include "../../conexao/conexao.php";?>
                  <center><fieldset style=" width:500px"><table class="table table-striped" border="0">
            
                     <tr>
                      <td><b>Agente:*</b></td>
                      <td>
                        <select name="matricula" required="" selected="" class="form-control">
                         <?php

                         $stmt = $conexao->query("select matricula,nome from usuario");

                         while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){

                          echo "<option value='".$linha['matricula']."'>".$linha['nome']."</option>";

                        }
                        ?>
                      </select>
                    </td>
                  </tr> 
		</table>
		<table border=0 class="table table-striped"> 
                  <tr>
                    <td width=80px><b>Data:*</b></td>
                    <td width=10px>Dia:
                      <input type="text" name="dia" id="dia"  required="" maxlength="2"  class="form-control">
                    </td>
			<td width=10px>Mês:
                      <input type="text" name="mes" id="mes"  required="" maxlength="2"  class="form-control">
                    </td>
			<td width=80px>Ano:
                      <input type="text" name="ano" id="ano"  required="" maxlength="4" class="form-control">
                    </td>
                  </tr>
		
                </tr>
		</table>	
		<table border=0 class="table table-striped"> 
                <tr>
                  <td><b>Hora:*</b></td>
                  <td>
                    <input type="text" maxlength="8" name="hora" id="hora" placeholder="hh:mm:"  required=""  class="form-control">
                  </td>
                </tr>
                <tr>
                  <td><b>Observação:*</b></td>
                  <td>
                    <textarea name="observacao"  required=""  rows="4" cols="50" maxlength="200" class="form-control"> </textarea> 
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
          </form> '
        </div>
        <!--Fim de inclusao de codigo-->
        <?php include("../../geral/footer.php");?>
      </div>
      <!--Fim da Area Central do Sistema-->
    </div>
  </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery.min.js.download"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../js/bootstrap.min.js.download"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../js/holder.min.js.download"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../js/ie10-viewport-bug-workaround.js.download"></script>

	<script type="text/javascript">

$('#dia').on('keyup', function(event) {
  var valorMaximo = 31;

  if (event.target.value > valorMaximo)
    return event.target.value = valorMaximo;
});

$('#mes').on('keyup', function(event) {
  var valorMaximo = 12;

  if (event.target.value > valorMaximo)
    return event.target.value = valorMaximo;
});

$('#ano').on('keyup', function(event) {
  var valorMaximo = 2999;

  if (event.target.value > valorMaximo)
    return event.target.value = valorMaximo;
});
	
    </script>

  </body><object id="98ab2918-b948-b0ba-3878-8ba9ea92aab8" width="0" height="0" type="application/gas-events-cef"></object></html>
