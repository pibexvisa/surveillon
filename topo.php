<script src="js/util.js"></script>
<nav class="navbar navbar-inverse navbar-fixed-top surveillon">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
					<?php
					function echoActiveClassIfRequestMatches($requestUri)
					{	
					    $current_file_name =basename(dirname($_SERVER['REQUEST_URI']));
							
					    if ($current_file_name == $requestUri)
					        echo 'class = "active surveillon"';
					}
	
					function echoDisableLink($requestUri)
					{	
						 $current_file_name =basename($_SERVER['REQUEST_URI'],".php");

						 if ($current_file_name == $requestUri){
							  echo "class=disabled";
						 }
					}

					switch(basename(dirname($_SERVER['REQUEST_URI']))){
						case "mod_denuncias":
							$current_module = "Modulo de Denúncias";
						break;
						default:
							$current_module = "Geral";
						break;
					}
					?>
          <a class="navbar-brand surveillon" href="../inicio.php">Surveillon Camará - <?=$current_module;?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a class="surveillon"; href="http://getbootstrap.com/examples/dashboard/#"><?php echo "<b> Usuário: </b>".$_SESSION["nome"]."-".$_SESSION["matricula"]." <b>&nbsp;&nbsp;Perfil:</b>".($_SESSION["perfil"]=="adm"?"Administrador":"Comum");?></a></li>
            <li onclick="carregaPagina('sobre.php');"><a href="#">Sobre o Surveillon</a></li>
            <li><a href="logout.php">Sair</a></li>
          </ul>

        </div>
      </div>
</nav>
