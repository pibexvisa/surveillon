<?php 
  function echoActiveClassIfRequestMatches($requestUri)
	{	
	    $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");

	    if ($current_file_name == $requestUri)
	        echo 'class = "active surveillon"';
	}
	?>
<div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li <?php echoActiveClassIfRequestMatches("denuncias"); ?>><a href="mod_denuncias/denuncias.php">Denúncias <span class="sr-only">(current)</span></a></li>
          </ul>
				<ul class="nav nav-sidebar">
				<li style="background-color:#cccccc;text-align:center;">Admin</li>
				<li <?php echoActiveClassIfRequestMatches("casos"); ?>><a href="../geral/casos/index.php">Casos</a></li>
				<li <?php echoActiveClassIfRequestMatches("bairros"); ?>><a href="../geral/bairro/index.php">Bairros</a></li>
				<li <?php echoActiveClassIfRequestMatches("visita"); ?>><a href="../geral/visita/index.php">Visitas</a></li>
            <li <?php echoActiveClassIfRequestMatches("usuarios"); ?>><a href="../geral/usuario/usuarios.php">Usuários</a></li>
					</ul>
</div>
