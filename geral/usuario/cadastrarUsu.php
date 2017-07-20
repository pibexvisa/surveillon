
<script>
$("#bt_cadastrar").click(function(event){

 	if(validaForm()){
 	   $.post("geral/usuario/insert.php",
	    {matricula:$("#matricula").val(),nome:$("#nome").val(),codigo:$("#codigo").val(),senha:$("#senha").val(),cpf:$("#cpf").val(),email:$("#email").val(),telefone:$("#telefone").val(),perfil:$("#perfil").val()},
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

function habilitar(){
    if(document.getElementById('hab').checked){
        document.getElementById('senha').removeAttribute("disabled");
        document.getElementById('senha').setAttribute("required","required");
        document.getElementById('senha').value="";
    }
    else {
        document.getElementById('hab').value=''; //Evita que o usuário defina um texto e desabilite o campo após realiza-lo
        document.getElementById('senha').setAttribute("disabled", "disabled");
        document.getElementById('senha').removeAttribute("required");
    }
}


</script>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">Usuarios</h1>
  <div style="display:none;" id="myAlert"></div>
  <h4 class="sub-header"><?php echo(isset($_GET["codigo"])?"Alterar Usuário":"Novo Uśuário");?></h4>
	<div class="table-responsive">
		<form name="fcadastrar" method="POST">
		<input type="hidden" name="codigo" value=<?php echo(isset($_GET["codigo"])?$_GET["codigo"]:""); ?>>
		<center><fieldset style=" width:400px">
			<?php 
		          include "../../conexao/conexao.php";
		          
		          $nome=""; $matricula =""; $cpf="";$email="";$telefone="";
		          $perfil=""; $senha="";

		          if(isset($_GET["codigo"])){
		            
		            $stmt = $conexao->prepare("select matricula,cpf, senha, nome,email, telefone, perfil from usuario where codigo = ?");
		            $codigo= $_GET["codigo"]; 
		            $stmt->bindValue(1,$codigo);
		            $stmt->execute();
		            $resultado = $stmt->fetchAll();
		            foreach($resultado as $linha){
		            	$matricula = $linha["matricula"];
		              $nome=$linha["nome"];
		              $cpf=$linha["cpf"];
		              $email=$linha["email"];
		              $telefone=$linha["telefone"];
		              $perfil=$linha["perfil"];
		              $senha=$linha["senha"];
		            }
		        }
		        ?>
            <table class="table table-striped" border="0">
				<tr>
					<input type="hidden" id="codigo" name="codigo" value=<?php echo(isset($_GET["codigo"])?$_GET["codigo"]:""); ?>>
					<td><label for="nome"><b>Matricula:*</b></label></td>
					<td><input type="text" id="matricula" name="matricula" maxlength="11" class="form-control" value="<?php echo $matricula;?>" required></td>
				</tr>			
				<tr>
					<td><label for="nome"><b>Senha:*</b></label></td>
					<td>
						<input type="password" id="senha" name="senha" class="form-control" <?php echo(isset($_GET["codigo"])?"disabled":"required");?> maxlength=15>
						<div id='habilitaSenha' style="display:<?php echo(isset($_GET["codigo"])?"":"none");?>;" >
		Selecione se deseja alterar  <input type="checkbox" value="alterar" id="hab" name="hab" onclick="habilitar()">
						</div>
					</td>
				</tr>

			    <tr>
					<td><label for="nome"><b>Nome:*</b></label></td>
					<td><input type="text" name="nome" id="nome" class="form-control" required value="<?php echo $nome;?>"></td>
				</tr> 
				<tr>
					<td><label for="nome"><b>CPF:*</b></label></td>
					<td><input type="text" id="cpf" name="cpf" maxlength="11" class="form-control" value="<?php echo $cpf;?>" required></td>
				</tr>
				<tr>
					<td><label for="nome"><b>E-mail:*</b></label></td>
					<td><input type="text" id="email" name="email" value="<?php echo $email;?>" class="form-control" required></td>
				</tr>
				<tr>
					<td><label for="nome"><b>Telefone:*</b></label></td>
					<td><input type="text" id="telefone" name="telefone" placeholder="Ex: (DD) 9 9999-9999" maxlength="11" class="form-control" required value="<?php echo $telefone;?>"></td>
				</tr>
				<tr>
					<td><label for="nome"><b>Perfil:*</b></td>
					<td>
						<select name="perfil" id="perfil" class="form-control" required>
							<option value="">Selecione uma opçao</option>
							<option value="adm" <?php echo ($perfil=="adm"?"selected":"");?>>Administrador</option>
							<option value="com" <?php echo ($perfil=="com"?"selected":"");?>>Comum</option>
						
						</select>
					</td>
				</tr>
				
				 <table class="table table-striped">
                  <tr>
                    <td><input type="submit" value = <?php echo(isset($_GET["codigo"])?"Alterar":"Cadastrar");?> id="bt_cadastrar" class="btn btn-md btn-primary btn-block"></td>
                    <td><a id="cancelar" href="#" onclick="carregaPagina('geral/usuario/index.php');" class="btn btn-md btn-default btn-block">Cancelar</a></td>
                  </tr>
      			</table>

			</ul>	
        	</table>
		</form>
  	</div>

</div>
