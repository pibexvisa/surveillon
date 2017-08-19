
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
		          $dia=""; $mes=""; $ano="";
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
					<td>
					<?php 
		               include "../../conexao/conexao.php";
		               $stmt=$conexao->query("select matricula, nome from usuario order by nome"); 
		               echo "<select name='matricula' id='matricula' class='input' required>
		                      <option value=''>Selecione um Agente</option>";
		                $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
		                foreach ($resultado as $value) {
		                  echo "<option value='".$value["matricula"]."' ".($value["matricula"]==$matricula_usuario?"selected":"").">".$value["nome"]."</option>";
		                }
		              
		                echo "</select>";
			         ?>
			         </td>
				</tr>			
				<table class="table table-striped" border="0">		
				<tr>
					<td width=40px><label for="nome"><b>Data:*</b></label></td>
					
					<td width=40px>
					<select id="dia" name="dia" required class="input">
						<option value="">Dia</option>
						<option value="01"<?php ($dia=="01"?"selected":"")?>>01</option>
						<option value="02"	<?php ($dia=="02"?"selected":"")?>>02</option>
						<option value="03"	<?php echo ($dia=="03"	?"selected":"")	?>>03</option>
						<option value="04"	<?php echo ($dia=="04"	?"selected":"")	?>>04</option>
						<option value="05"	<?php echo ($dia=="05"	?"selected":"")	?>>05</option>
						<option value="06"	<?php echo ($dia=="06"	?"selected":"")	?>>06</option>
						<option value="07"	<?php echo ($dia=="07"	?"selected":"")	?>>07</option>
						<option value="08"	<?php echo ($dia=="08"	?"selected":"")	?>>08</option>
						<option value="09"	<?php echo ($dia=="09"	?"selected":"")	?>>09</option>
						<option value="10"	<?php echo ($dia=="10"	?"selected":"")	?>>10</option>
						<option value="11"	<?php echo ($dia=="11"	?"selected":"")	?>>11</option>
						<option value="12"	<?php echo  ($dia=="12"	?"selected":"")	?>>12</option>
						<option value="13"	<?php echo ($dia=="13"	?"selected":"")	?>>13</option>
						<option value="14"	<?php echo ($dia=="14"	?"selected":"")	?>>14</option>
						<option value="15"	<?php echo ($dia=="15"	?"selected":"")	?>>15</option>
						<option value="16"	<?php echo ($dia=="16"	?"selected":"")	?>>16</option>
						<option value="17"	<?php echo ($dia=="17"	?"selected":"")	?>>17</option>
						<option value="18"	<?php echo ($dia=="18"	?"selected":"")	?>>18</option>
						<option value="19"	<?php echo ($dia=="19"?"selected":"")	?>>19</option>
						<option value="20"	<?php echo ($dia=="20"	?"selected":"")	?>>20</option>
						<option value="21"	<?php echo ($dia=="21"	?"selected":"")	?>>21</option>
						<option value="22"	<?php echo ($dia=="22"	?"selected":"")	?>>22</option>
						<option value="23"	<?php echo ($dia=="23"	?"selected":"")	?>>23</option>
						<option value="24"	<?php echo ($dia=="24"	?"selected":"")	?>>24</option>
						<option value="25"	<?php echo ($dia=="25"	?"selected":"")	?>>25</option>
						<option value="26"	<?php echo ($dia=="26"	?"selected":"")	?>>26</option>
						<option value="27"	<?php echo ($dia=="27"	?"selected":"")	?>>27</option>
						<option value="28"	<?php echo ($dia=="28"	?"selected":"")	?>>28</option>
						<option value="29"	<?php echo ($dia=="29"	?"selected":"")	?>>29</option>
						<option value="30"	<?php echo ($dia=="30"	?"selected":"")	?>>30</option>
						<option value="31"	<?php echo ($dia=="31"	?"selected":"")	?>>31</option>
					</select>
					
					<td width=40px>
					<select id="mes" name="mes" required class="input">
						<option value="">Mês</option>
						<option value="01"<?php ($mes=="01"?"selected":"")?>>Janeiro</option>
						<option value="02"	<?php ($mes=="02"?"selected":"")?>>Fevereiro</option>
						<option value="03"	<?php echo ($mes=="03"	?"selected":"")	?>>Março</option>
						<option value="04"	<?php echo ($mes=="04"	?"selected":"")	?>>Abril</option>
						<option value="05"	<?php echo ($mes=="05"	?"selected":"")	?>>Maio</option>
						<option value="06"	<?php echo ($mes=="06"	?"selected":"")	?>>Junho</option>
						<option value="07"	<?php echo ($mes=="07"	?"selected":"")	?>>Julho</option>
						<option value="08"	<?php echo ($mes=="08"	?"selected":"")	?>>Agosto</option>
						<option value="09"	<?php echo ($mes=="09"	?"selected":"")	?>>Setembro</option>
						<option value="10"	<?php echo ($mes=="10"	?"selected":"")	?>>Outubro</option>
						<option value="11"	<?php echo ($mes=="11"	?"selected":"")	?>>Novembro</option>
						<option value="12"	<?php echo  ($mes=="12"	?"selected":"")	?>>Dezembro</option>
					</select>
					</td>
					<td width=40px>
					<select id="ano" name="ano" required>
						<option value="">Ano</option>
						<?php 
							for($anoSel = date("Y"); $anoSel>=2015;$anoSel--){
								echo "<option value='$anoSel' ".($anoSel==$ano?"selected":"").">$anoSel</option>";		
							}
						?>
						
					</select>
					</td>
				</tr>
				</table>
				<table class="table table-striped" border="0">	
			    <tr>
			    <script>$('.time').mask('00:00:00');</script>
					<td><label for="nome"><b>Hora:*</b></label></td>
					<td><input type="text" name="hora" id="hora" class="time" style="width:85px;" required value="<?php echo $hora;?>"></td>
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
