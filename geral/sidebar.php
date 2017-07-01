<?php 
  function echoActiveClassIfRequestMatches($requestUri)
	{	
	    $current_file_name =basename(dirname($_SERVER['REQUEST_URI']));
			
	    if ($current_file_name == $requestUri)
	        echo 'class = "active surveillon"';
	}
	?>
<div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li <?php echoActiveClassIfRequestMatches("denuncias"); ?>><a href="../../mod_denuncias/denuncias.php">Denúncias <span class="sr-only">(current)</span></a></li>
          </ul>
					<ul class="nav nav-sidebar">
			<li style="background-color:#cccccc;text-align:center;">Admin</li>
			<li <?php echoActiveClassIfRequestMatches("casos"); ?> onclick="carregaPagina('geral/casos/index.php');"><a href="../casos/index.php">Casos</a></li>
			<li <?php echoActiveClassIfRequestMatches("bairro"); ?>><a href="../bairro/index.php">Bairros</a></li>
			<li <?php echoActiveClassIfRequestMatches("visita"); ?>><a href="../visita/index.php">Visitas</a></li>
                <li <?php echoActiveClassIfRequestMatches("usuario"); ?>><a href="../usuario/index.php">Usuários</a></li>
		
					</ul>
</div>
