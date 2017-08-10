
<script>
$("#bt_cadastrar").click(function(event){

 	if(validaForm()){
 	   $.post("geral/visita/insert_visita.php",
	    {matricula:$("#matricula").val(),dia:$("#dia").val(),mes:$("#mes").val(),ano:$("#ano").val(),codigo:$("#codigo").val(),hora:$("#hora").val(),observacao:$("#observacao").val()},
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
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">Visita</h1>
  <div style="display:none;" id="myAlert"></div>
  <h4 class="sub-header"><?php echo(isset($_GET["codigo"])?"Alterar Visita":"Novo visita");?></h4>
	<div class="table-responsive">
		<form name="fcadastrar" method="POST">
		<input type="hidden" name="codigo" value=<?php echo(isset($_GET["codigo"])?$_GET["codigo"]:""); ?>>
		<center><fieldset style=" width:400px">
			<?php 
		          include "../../conexao/conexao.php";
		          
		          $matricula_usuario =""; $data="";$hora="";$observacao="";

		          if(isset($_GET["codigo"])){
		            
		            $stmt = $conexao->prepare("select data, hora, observacao, matricula_usuario from visita where codigo = ?");
		            $codigo= $_GET["codigo"]; 
		            $stmt->bindValue(1,$codigo);
		            $stmt->execute();
		            $resultado = $stmt->fetchAll();
		            foreach($resultado as $linha){
						$data = $linha["data"];
						$hora = $linha["hora"];
						$observacao = $linha["observacao"];
						$matricula_usuario = $linha["matricula_usuario"];
						
						$ano= date("Y", strtotime($linha['data']));
						$mes= date("m", strtotime($linha['data']));
						$dia= date("d", strtotime($linha['data']));
		            }
		        }
		        ?>
            <table class="table table-striped" border="0">
				<tr>
					<input type="hidden" id="codigo" name="codigo" value=<?php echo(isset($_GET["codigo"])?$_GET["codigo"]:""); ?>>
					<td><label for="nome"><b>Matricula:*</b></label></td>
					<td><input type="text" id="matricula" name="matricula" maxlength="11" class="form-control" required value="<?php echo $matricula_usuario;?>"></td>
				</tr>			
				<table class="table table-striped" border="0">		
				<tr>
					<td width=40px><label for="nome"><b>Data:*</b></label></td>
					
					<td width=40px>Dia:
					<input type="text" id="dia" name="dia" maxlength="2" class="form-control" required value="<?php echo $dia?>">
					</td>
					
					
					<td width=40px>Mês:
					<input type="text" id="mes" name="mes" maxlength="2" class="form-control" required value="<?php echo $mes ?>">
					</td>
					
					
					<td width=40px>Ano:
					<input type="text" id="ano" name="ano" maxlength="4" class="form-control" required value="<?php echo $ano ?>">
					</td>
				</tr>
				</table>
				<table class="table table-striped" border="0">	
			    <tr>
					<td><label for="nome"><b>Hora:*</b></label></td>
					<td><input type="text" name="hora" id="hora" class="form-control" maxlength="5" required value="<?php echo $hora;?>"></td>
				</tr> 
				<tr>
                  <td><b>Observação:*</b></td>
                  <td>
                    <textarea name="observacao" id="observacao" rows="4" cols="50" maxlength="200" class="form-control" ><?php echo $observacao;?></textarea> 
                  </td>
                </tr>
				</table>
				 <table class="table table-striped">
                  <tr>
                    <td><input type="submit" value = <?php echo(isset($_GET["codigo"])?"Alterar":"Cadastrar");?> id="bt_cadastrar" class="btn btn-md btn-primary btn-block"></td>
                    <td><a id="cancelar" href="#" onclick="carregaPagina('geral/visita/index.php');" class="btn btn-md btn-default btn-block">Cancelar</a></td>
                  </tr>
      			</table>

			</ul>	
        	</table>
		</form>
  	</div>

</div>
