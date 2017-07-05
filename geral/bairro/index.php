		    <h1 class="page-header">Bairro</h1>
          	<div class="container">
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-4"><img src="geral/img/lupa.png" width="80"></div>
					<div class="col-md-4"><a href="#" onclick="carregaPagina('geral/bairro/cadastrarBairro.php');"><img src="geral/img/cadastro.png" width="80">Novo Bairro</a>
					</div>
					<div class="col-md-2"></div>
				</div>
			</div>
			<!-- formulario de busca -->
			<form id="fBusca" method="POST" onsubmit="return false;"> 
				<style>
					.input{color:#ccc;}
					.input:focus{color:#000;}
				</style>

				<div class="container">
					<div class="row">
						<div class="col-md-3"><input type="text" name="nome" id='campoPesquisa' placeholder ="Digite o nome do bairo..." class="input" onfocus="this.value=''"/> </div>
							<div class="col-md-3">
								<select name="area" id="area" class="form-control">
			                  		<option value="">Selecione uma área</option>
			                  		<option value="1">1</option>
			                  		<option value="2">2 </option>
			                  		<option value="3">3</option>
			                  		<option value="4">4</option>
			                  		<option value="5">5</option>
        						</select> 
							</div>
							<div class="col-md-3"> 
								<button onclick="buscar('geral/bairro/buscar_bairros.php');" class="btn btn-md btn-success btn-block">Buscar</button>
								<div class="col-md-3"></div>
							</div>
					 </div>
				</div>
			</form> 



			<div id="tabBusca" ><script>buscar("geral/bairro/buscar_bairros.php");</script></div> 
 
            <script type="text/javascript">


							
           </script>




