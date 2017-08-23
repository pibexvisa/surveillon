<!DOCTYPE html>
<!-- saved from url=(0040)http://getbootstrap.com/examples/signin/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://getbootstrap.com/favicon.ico">

    <title>Surveillon</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">		

    <link href="css/surveillon.css" rel="stylesheet">
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
    <script src="js/jquery.min.js.download"></script>

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js.download"></script>
       <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
  <script>
  $(document).ready(function(){
       $("#logar").click(function(event){
        $("#alerta").html('');
        $.post("logar.php",
          {matricula:$("#matricula").val(),inputPassword:$("#inputPassword").val()},
          function(data,status){
            if(status=="success"){
              if(data.trim() == "ok"){
                window.location="index.php";
              }else{
                $("#alerta").html("Matrícula ou Senha inválidos.");
              }
            }else{
                $("#alerta").html("Problemas no serviço. Contate o administrador.");
            }
          
        });
        return false;
      });
     });


    </script>
    <nav class="navbar navbar-inverse navbar-fixed-top surveillon">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand surveillon" href="http://getbootstrap.com/examples/dashboard/#">Surveillon Camará</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="http://getbootstrap.com/examples/dashboard/#">Sobre o Surveillon</a></li>
          </ul>

        </div>
      </div>
    </nav>
    <div class="container">

      <form name="login" class="form-signin" method="POST">
        <h2 class="form-signin-heading">Acesso</h2>
        <label for="matricula" class="sr-only">Matricula</label>
        <input type="text" id="matricula" name="matricula" class="form-control" placeholder="Matricula" required="" autofocus="">
        <label for="inputPassword" class="sr-only">Senha</label>
        <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Senha" required="">
        <div id="alerta" style="color:red;"></div>
        <input type="submit" id="logar" onclick="logar();" class="btn btn-lg btn-primary btn-block" value="Entrar">
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<?php include("geral/footer.php");?>
		<script src="js/ie10-viewport-bug-workaround.js.download"></script>


</body><object id="2acaf92a-baf9-8e97-c8ab-48a3aa8fbfa7" width="0" height="0" type="application/gas-events-cef"></object></html>
