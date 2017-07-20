  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script>

      $("#bt_cadastrar").click(function(event){

         if(validaForm()){
           $.post("geral/casos/insert_caso.php",
            {nome: $("#nome").val(),competencia: $("#competencia").val(),descricao:$("#descricao").val(),codigo:$("#codigo").val()},
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
      <h1 class="page-header">Casos</h1>
      <div style="display:none;" id="myAlert">
      </div>
      <h4 class="sub-header"><?php echo(isset($_GET["codigo"])?"Alterar Caso":"Novo Caso");?></h4>
      <!--Incluir codigo aqui-->
      <div class="table-responsive">
        <form method="POST"  name="fcadastrar"> 
          <div class="margimformadm">
            <h1 class="hidden"><span id="logo">CADASTRAMENTO DE CASOS</span></h1>

        <?php 
          $nome=""; $competencia=""; $descricao="";$codigo="";
          if(isset($_GET["codigo"])){
            include "../../conexao/conexao.php";
            $stmt = $conexao->prepare("select codigo,nome,competencia,descricao from caso where codigo = ?");
            $codigo= $_GET["codigo"]; 
            $stmt->bindValue(1,$codigo);
            $stmt->execute();
            $resultado = $stmt->fetchAll();
            foreach($resultado as $linha){
              $nome=$linha["nome"];
              $competencia=$linha["competencia"];
              $descricao=$linha["descricao"];
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
                <td><b>Competência: *</b></td>
                <td>
                  <select name="competencia" id="competencia" required=""  class="form-control">
                    <option value="">Selecione uma competência</option>
                    <option value="vs" <?php echo($competencia=="vs"?"selected":"");?>> Vigilância Sanitária</option>
                    <option value="va" <?php echo($competencia=="va"?"selected":"");?>> Vigilância Ambiental  </option>
                    <option value="ve" <?php echo($competencia=="ve"?"selected":"");?>> Vigilância Epidemiologica  </option>
                  </select>
                </td>
              </tr>
            </tr>
            <tr>
              <td><b>Descrição: *</b></td>
              <td>

                <textarea name="descricao" id="descricao" required=""  rows="4" cols="50" maxlength="200" class="form-control" > <?php echo $descricao;?></textarea>

              </td>
            </tr>
            <table class="table table-striped">
                  <tr>
                    <td><input type="submit" value ="<?php echo(isset($_GET["codigo"])?"Alterar":" Cadastrar");?>" id="bt_cadastrar" class="btn btn-md btn-primary btn-block"></td>
                    <td><a id="cancelar" href="#" onclick="carregaPagina('geral/casos/index.php');" class="btn btn-md btn-default btn-block">Cancelar</a></td>
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
 
