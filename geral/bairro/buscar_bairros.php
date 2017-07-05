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

        echo '   
           <table width=100% class="table table-striped">
            <tr>
              <td width= 10% align="center"><b>Nome</b></td>
              <td width= 10% align="center"><b>Area</b></td>

              <td width=10% align="center"><img src="geral/img/exclui.png" width="40"> <a></td>
              <td width=10% align="center"><img src="geral/img/alterar.png" width="40"> <a></td>
            </tr>
          </table> ';
        $stmt->execute();

        $resultado = $stmt->fetchAll();
        foreach($resultado as $linha){
          echo "
          <table width=100% class='table table-striped'>
           <tr> 
             <td width=10%  align='center'><p > ".$linha['area']."</p></th>
              <td width=10%  align='center'><p > ".$linha['nome']."</p></td>

              <td  width=10% align='center'><a href='#' onclick=\"show_confirm(".$linha['codigo'].",'geral/bairro/deletarbairro.php','geral/bairro/index.php');\">Excluir <a></td>
              <td width=10% align='center'><a href='#' onclick=\"carregaPagina('geral/bairro/cadastrarBairro.php?codigo=".$linha['codigo']."');\">Alterar <a></td>

            </tr> 
        </table> ";
      }
      
      ?> 