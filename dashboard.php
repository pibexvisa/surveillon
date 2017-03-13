<!DOCTYPE html>
<!-- saved from url=(0043)http://getbootstrap.com/examples/dashboard/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://getbootstrap.com/favicon.ico">

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
		
		<link href="css/surveillon.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">

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
	<?php
	  function echoActiveClassIfRequestMatches($requestUri)
	{	
	    $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");

	    if ($current_file_name == $requestUri)
	        echo ""active"';
	}
	?>

		<!--Topo do Sistema-->
    <nav class="navbar navbar-inverse navbar-fixed-top surveillon">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand surveillon" href="http://getbootstrap.com/examples/dashboard/#">Surveillon Camará - Modulo de Denúncias</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a class="surveillon"; href="http://getbootstrap.com/examples/dashboard/#">Fulano</a></li>
            <li><a href="http://getbootstrap.com/examples/dashboard/#">Sobre o Surveillon</a></li>
            <li><a href="http://getbootstrap.com/examples/dashboard/#">Sair</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>
		<!--Fim do Topo do Sistema-->
		
    <div class="container-fluid">
      <div class="row">
			   <!--Lateral Esquerda-->
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="<? echoActiveClassIfRequestMatches($requestUri);?> surveillon"><a href="denuncias.php">Denúncias <span class="sr-only">(current)</span></a></li>
            <li><a href="http://getbootstrap.com/examples/dashboard/#">Casos</a></li>
						<li><a href="http://getbootstrap.com/examples/dashboard/#">Bairros</a></li>
            <li><a href="http://getbootstrap.com/examples/dashboard/#">Usuários</a></li>
          </ul>
        </div>
				<!--Fim Lateral Esquerda-->
				<!--Area Central do Sistema-->
        <?php
				   /*Nessa area sera exibida a pagina corrente*/
				?>
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