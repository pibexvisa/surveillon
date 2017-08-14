<?php
    include '../../conexao/conexao.php'; /* include da conexão com o baco de dados */
	
	function inverteData1($data1){
     if(count(explode("/",$data1)) > 1){
         return implode("-",array_reverse(explode("/",$data1)));
     }elseif(count(explode("-",$data1)) > 1){
         return implode("/",array_reverse(explode("-",$data1)));
     }
 }

	function inverteData2($data2){
     if(count(explode("/",$data2)) > 1){
         return implode("-",array_reverse(explode("/",$data2)));
     }elseif(count(explode("-",$data2)) > 1){
         return implode("/",array_reverse(explode("-",$data2)));
     }
 }

	if ($_POST["nome"] != null){
      $query = "select visita.codigo,visita.matricula_usuario,usuario.nome,visita.data,visita.hora from visita inner join usuario on visita.matricula_usuario = usuario.matricula and usuario.matricula= visita.matricula_usuario where usuario.nome like ?";
      
      $nome= (isset($_POST["nome"])?$_POST["nome"]:"");
	  
      $stmt = $conexao->prepare($query); 
      $stmt->bindValue(1, "%".$nome."%");
	  
	
	}else if (isset($_POST["data1"])&&($_POST["data2"])){
      $query = "select visita.codigo,visita.matricula_usuario,usuario.nome,visita.data,visita.hora from visita inner join usuario on visita.matricula_usuario = usuario.matricula and usuario.matricula= visita.matricula_usuario where visita.data between ? and ? ";
      
      $data1= (isset($_POST["data1"])?$_POST["data1"]:"");
	  $data2= (isset($_POST["data2"])?$_POST["data2"]:"");
      
      $stmt = $conexao->prepare($query); 
      $stmt->bindValue(1, inverteData2($data1));
	  $stmt->bindValue(2, inverteData2($data2));

    }else{
     $stmt = $conexao->query ("select visita.codigo,visita.matricula_usuario,usuario.nome,visita.data,visita.hora from visita inner join usuario on visita.matricula_usuario = usuario.matricula and usuario.matricula= visita.matricula_usuario");
    }
        echo "
          <div class='all panel panel-success' id='resultBusca'>
            <div class='row panel-heading'>
              <div class='col-md-2'>
                    <b>Matricula</b>
                </div>
		<div class='col-md-2'>
                    <b>Agente</b>
                </div>
		<div class='col-md-2'>
                    <b>Hora</b>
                </div>
                <div class='col-md-2'>
                    <b>Data</b>
                </div>
                <div class='col-md-2'>
                    <img src='geral/img/exclui.png' width='40'>
                </div>
                <div class='col-md-2'>
                    <img src='geral/img/alterar.png' width='40'>
                </div>
            </div>";
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        $class="";
        foreach($resultado as $linha){
          echo "<div class='row list-group busca $class'>
		 <div class='col-md-2'>".
                       $linha['matricula_usuario']."
                  </div>
                  <div class='col-md-2'>".
                       $linha['nome']."
                  </div>
		<div class='col-md-2'>".
                       $linha['hora']."
                  </div>
                  <div class='col-md-2'>".
                       date("d/m/Y", strtotime($linha['data']))."
                  </div>
                  <div class='col-md-2'>
                    <a href='#' onclick=\"show_confirm('".$linha['codigo']."','geral/visita/deletar_visita.php','geral/visita/index.php');\">Excluir </a>
                  </div>
                  <div class='col-md-2'>
                    <a href='#' onclick=\"carregaPagina('geral/visita/cadastrar_visita.php?codigo=".$linha['codigo']."');\">Alterar </a>
                  </div>
                </div>";
                $class = ($class==""?"active":"");
        }
      echo "</div> 
            <div id='pagi'></div>";
      ?> 
