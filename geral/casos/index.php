
      <!--Topo do Sistema-->
      <?php //include("../../topo.php");?>
      <!--Fim do Topo do Sistema-->

      <div class="container-fluid">
        <div class="row">
         <!--Lateral Esquerda-->
         <?php //include("../../geral/sidebar.php");?>
         <!--Fim Lateral Esquerda-->
         <!--Area Central do Sistema-->
         <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
           <h1 class="page-header">Casos</h1>
           <fieldset>
            <table style="width:80%" align="center"  cellspacing="15"> 
              <tr>
                <th width="center"><img src="geral/casos/img/lupa.png" width="80"></th>
                <td align="center"><img src="geral/casos/img/cadastro.png" width="80">
                </tr> 
                <tr>
                  <td align="center"><?php include 'buscar_caso.php';?></td> <!-- include formulario de busca -->
                  <td align="center"><a href="#" onclick="carregaPagina('geral/casos/cadastrar_caso.php');">Cadastrar Caso</a></td>   
                </tr>
              </table>
              <fieldset>
                <?php
                include '../../conexao/conexao.php'; /* include da conexão com o baco de dados */
                if (isset($_GET["nome"])){
                  $stmt = $conexao->prepare("select codigo,nome,competencia,descricao from caso where nome like ? LIMIT 10"); 
                  $nome= $_GET["nome"];
                  $stmt->bindValue(1,"%" .$nome ."%");
                  $stmt->execute();

                }else{

                  $stmt = $conexao->query ("select codigo,nome,competencia from caso LIMIT 10 ");

                } 

                ?>

                <table width=100% class="table table-striped">
                  <tr>
                    <td width=10% align="center"><b>Id</b></td>
                    <td width= 10% align="center"><b>Nome</b></td>
                    <td width= 10% align="center"><b>Competência</b></td>

                    <td width=10% align="center"><img src="geral/casos/img/exclui.png" width="40"> <a></td>
                    <td width=10% align="center"><img src="geral/casos/img/alterar.png" width="40"> <a></td>
                  </tr>
                </table>

                <?php
                $resultado = $stmt->fetchAll();
                foreach($resultado as $linha){
                  ?> 
                  <table width=100% class="table table-striped">
                   <tr> 
                      <td width=10%  align="center"><p><?php echo $linha['codigo'] ?> </p></th>
                      <td width=10%  align="center"><p><?php echo $linha['nome'] ?> </p></td>
                      <td width=10% align="center"><p><?php 
									switch($linha['competencia']){
										case "va":
											echo "Vigilância Ambiental";
										break;
										case "vs":
											echo "Vigilância Sanitária";
										break;
										case "ve":
											echo "Vigilância Epidemiológica";
										break;
										default:
											echo "Não reconhecido.";
									}?></p></td>
                      <td  width=10% align="center"><a href="#"onclick="show_confirm(<?php echo $linha['codigo']?>)">Excluir <a></td>
                      <td width=10% align="center"><a href="#" onclick="carregaPagina('geral/casos/cadastrar_caso.php?codigo=<?php echo $linha['codigo']; ?>');">Alterar <a></td>

                    </tr>
                  </fieldset> 
                </table> 
                <?php   }  ?>

                <script type="text/javascript">
                  function show_confirm(ncodigo){
                    var excluir = confirm("Deseja Excluir este Caso?");
                    if( excluir){
							$.post("geral/casos/deletar_caso.php",
									{codigo:ncodigo},
									function(data,status){
										if(status=="success"){
											configAlerts("success","Exclusão realizada com sucesso!!");
					
										}else{
											configAlerts("danger","Erro na exclusão!");
										}
					
							 		});
								carregaPagina("geral/casos/index.php");
                   }
                 }
               </script>

             </div>
             <!--Fim da Area Central do Sistema-->
           </div>
         </div>



