 <?php
    include '../../conexao/conexao.php'; /* include da conexão com o baco de dados */

    $perfil = ""; $matricula="";$nome="";
    
    if (isset($_POST["nome"]) || isset($_POST["matricula"]) || isset($_POST["perfil"])){
      $query = "select codigo, nome, matricula, perfil from usuario where nome like :nome ";
      
      $nome= (isset($_POST["nome"])?$_POST["nome"]:"");
      $matricula =    (isset($_POST["matricula"])?$_POST["matricula"]:"");
      $perfil =    (isset($_POST["perfil"])?$_POST["perfil"]:"");

      if($matricula!="")
        $query .= " AND matricula = :matricula";

      if($perfil!="")
        $query .= " AND perfil = :perfil";

      $query .= " order by nome";
      
      $stmt = $conexao->prepare($query); 
      $stmt->bindValue(":nome","%" .$nome ."%");

      if($matricula!="")
        $stmt->bindValue(":matricula",$matricula);

      if($perfil!="")
         $stmt->bindValue(":perfil",$perfil);

    }else{

     $stmt = $conexao->query("select codigo, nome, matricula, perfil from usuario order by nome");
    }

         echo "
          <div class='all panel panel-success' id='resultBusca'>
            <div class='row panel-heading'>
              <div class='col-md-4'>
                    <b>Nome</b>
                </div>
                <div class='col-md-2'>
                    <b>Matrícula</b>
                </div>
                <div class='col-md-2'>
                    <b>Perfil</b>
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
                  <div class='col-md-4'>".
                       $linha['nome']."
                  </div>
                  <div class='col-md-2'>".
                       $linha['matricula']."
                  </div>
                  <div class='col-md-2'>".
                       $linha['perfil']."
                  </div>
                  <div class='col-md-2'>
                    <a href='#' onclick=\"show_confirm('".$linha['codigo']."','geral/usuario/deletarUsu.php','geral/usuario/index.php');\">Excluir </a>
                  </div>
                  <div class='col-md-2'>
                    <a href='#' onclick=\"carregaPagina('geral/usuario/cadastrarUsu.php?codigo=".$linha['codigo']."');\">Alterar </a>
                  </div>
                </div>";

                $class = ($class==""?"active":"");
        }
      echo "</div> 
            <div id='pagi'></div>";
      ?> 