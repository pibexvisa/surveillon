<!DOCTYPE html>
<!-- saved from url=(0043)http://getbootstrap.com/examples/dashboard/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="http://getbootstrap.com/favicon.ico">

<title>Surveillon</title>

<!-- Bootstrap core CSS -->
<link href="../../css/bootstrap.min.css" rel="stylesheet">

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<link href="../../css/ie10-viewport-bug-workaround.css" rel="stylesheet">

<link href="../../css/surveillon.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="../../css/dashboard.css" rel="stylesheet">

<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
<script src="../js/ie-emulation-modes-warning.js.download"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
    </head>
    <body>

      <!--Topo do Sistema-->
      <?php include("../../topo.php");?>
      <!--Fim do Topo do Sistema-->

      <div class="container-fluid">
        <div class="row">
         <!--Lateral Esquerda-->
         <?php include("../../geral/sidebar.php");?>
         <!--Fim Lateral Esquerda-->
         <!--Area Central do Sistema-->
         <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
           <h1 class="page-header">Casos</h1>
           <fieldset>
            <table style="width:80%" align="center"  cellspacing="15"> 
              <tr>
                <th width="center"><img src="../casos/img/lupa.png" width="80"></th>
                <td align="center"><img src="../casos/img/cadastro.png" width="80">
                </tr> 
                <tr>
                  <td align="center"><?php include 'buscar_caso.php';?></td> <!-- include formulario de busca -->
                  <td align="center"><a href="cadastrar_caso.php">Cadastrar Caso</a></td>   
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

                    <td width=10% align="center"><img src="../casos/img/exclui.png" width="40"> <a></td>
                    <td width=10% align="center"><img src="../casos/img/alterar.png" width="40"> <a></td>
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
                      <td width=10% align="center"><p><?php echo $linha['competencia']?></p></td>
                      <td  width=10% align="center"><a href="#"onclick="show_confirm(<?php echo $linha['codigo']?>)">Excluir <a></td>
                      <td width=10% align="center"><a href="alterar_caso.php?codigo= <?php echo $linha['codigo'] ?>">Alterar <a></td>

                    </tr>
                  </fieldset> 
                </table> 
                <?php   }  ?>

                <script type="text/javascript">
                  function show_confirm(codigo){
                    var excluir = confirm("deseja excluir!");
                    if( excluir==true){
                     window.location.href="deletar_caso.php?codigo="+codigo+'';
                   }
                 }
               </script>

             </div>
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

