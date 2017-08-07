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
            <li <?php echoActiveClassIfRequestMatches("denuncias"); ?>><a href="#" onclick="carregaPagina('mod_denuncias/denuncias.php');">Denúncias <span class="sr-only">(current)</span></a></li>
          </ul>
					<ul class="nav nav-sidebar">
			<li style="background-color:#cccccc;text-align:center;">Admin</li>
			<li <?php echoActiveClassIfRequestMatches("casos"); ?> onclick="carregaPagina('geral/casos/index.php');"><a href="#">Casos</a></li>
			<li <?php echoActiveClassIfRequestMatches("bairro"); ?> onclick="carregaPagina('geral/bairro/index.php');"><a href="#">Bairros</a></li>
			<li <?php echoActiveClassIfRequestMatches("visita"); ?>onclick="carregaPagina('geral/visita/index.php');"><a href="#">Visitas</a></li>
            <li <?php echoActiveClassIfRequestMatches("bairro"); ?> onclick="carregaPagina('geral/usuario/index.php');"><a href="#">Usuários</a></li>
		
					</ul>
</div>
