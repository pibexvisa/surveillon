 <?php
    include '../../conexao/conexao.php'; /* include da conexão com o baco de dados */
    
    if (isset($_POST["nome"]) || isset($_POST["area"])){
      $query = "select codigo,nome,area from bairro where nome like ? ";
      
      $nome= (isset($_POST["nome"])?$_POST["nome"]:"");
      $area = (isset($_POST["area"])?$_POST["area"]:"");

      
      if($area!="")
        $query .= " AND area = ?";

      
      $stmt = $conexao->prepare($query); 
      $stmt->bindValue(1,"%" .$nome ."%");

      if($area!="")
        $stmt->bindValue(2,$area);

    }else{

     $stmt = $conexao->query ("select codigo,nome,area from bairro");
    }

        echo "
          <div class='all panel panel-success' id='resultBusca'>
            <div class='row panel-heading'>
              <div class='col-md-2'>
                    <b>Área</b>
                </div>
                <div class='col-md-6'>
                    <b>Nome</b>
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
                       $linha['area']."
                  </div>
                  <div class='col-md-6'>".
                       $linha['nome']."
                  </div>
                  <div class='col-md-2'>
                    <a href='#' onclick=\"show_confirm('".$linha['codigo']."','geral/bairro/deletarbairro.php','geral/bairro/index.php');\">Excluir </a>
                  </div>
                  <div class='col-md-2'>
                    <a href='#' onclick=\"carregaPagina('geral/bairro/cadastrarBairro.php?codigo=".$linha['codigo']."');\">Alterar </a>
                  </div>
                </div>";

                $class = ($class==""?"active":"");
        }
      echo "</div> 
            <div id='pagi'></div>";
      ?> 