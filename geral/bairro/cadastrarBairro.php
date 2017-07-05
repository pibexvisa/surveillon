  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script>

      $("#bt_cadastrar").click(function(event){

         if(validaForm()){
           $.post("geral/bairro/insert_bairros.php",
            {area:$("#area").val(),nome:$("#nome").val(),codigo:$("#codigo").val()},
            function(data,status){

              if(status=="success"){
                if($("#codigo").val()=="")
                  mensagem="Cadastro realizado com sucesso!!";
                else
                  mensagem="Atualização realizada com sucesso!!";

                configAlerts("success",mensagem);
            
              }else{
                configAlerts("danger","Erro no cadastro!");
              }
            
          });
        }else{
          configAlerts("warning","Atenção!! Preencha os campos obrigatórios.");
          
        }
        return false;
      });

    

  </script>

   <div class="container-fluid">
    <div class="row">
     <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      <h1 class="page-header">Bairros</h1>
      <div style="display:none;" id="myAlert">
      </div>
      <h4 class="sub-header"><?php echo(isset($_GET["codigo"])?"Alterar Bairro":"Novo Bairro");?></h4>
      <!--Incluir codigo aqui-->
      <div class="table-responsive">
        <form method="POST"  name="fcadastrar"> 
          <div class="margimformadm">
            <h1 class="hidden"><span id="logo">CADASTRAMENTO DE BAIRROS</span></h1>

        <?php 
          include "../../conexao/conexao.php";
          
          $nome=""; $area=""; $codigo="";
          if(isset($_GET["codigo"])){
            
            $stmt = $conexao->prepare("select codigo,nome,area from bairro where codigo = ?");
            $codigo= $_GET["codigo"]; 
            $stmt->bindValue(1,$codigo);
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            foreach($resultado as $linha){
              $nome=$linha["nome"];
              $area=$linha["area"];
            }
        }
        ?>
        <input type='hidden' value='<?php echo $codigo;?>' name='codigo' id='codigo'>
            <center><fieldset style=" width:600px"><table  class="table table-striped" border="0">
              <tr>

                <td><b>Nome: *</b></td>
                <td>
                  <input type="text" name="nome" id="nome" required="" autofocus="" class="form-control" value="<?php echo $nome;?>">
                </td>
              </tr>
              <tr>
                <td><b>Área: *</b></td>
                <td>
                  <select name="area" id="area" required=""  class="form-control">
                    <option value="">Selecione uma área</option>
                    <option value="1" <?php echo($area==1?"selected":"");?>>1</option>
                    <option value="2" <?php echo($area==2?"selected":"");?>>2</option>
                    <option value="3" <?php echo($area==3?"selected":"");?>>3</option>
                    <option value="4" <?php echo($area==4?"selected":"");?>>4</option>
                    <option value="5" <?php echo($area==5?"selected":"");?>>5</option>
                  </select>
                </td>
              </tr>
            </tr>
            <table class="table table-striped">
                  <tr>
                    <td><input type="submit" value ="<?php echo(isset($_GET["codigo"])?"Alterar":" Cadastrar");?>" id="bt_cadastrar" class="btn btn-md btn-primary btn-block"></td>
                    <td><a id="cancelar" href="#" onclick="carregaPagina('geral/bairro/index.php');" class="btn btn-md btn-default btn-block">Cancelar</a></td>
                  </tr>
      </table>
          </table></fieldset></center>
        </form> 
      </div>
      <!--Fim de inclusao de codigo-->

    </div>
    <!--Fim da Area Central do Sistema-->
  </div>
</div>
 
