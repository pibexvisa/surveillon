		    <h1 class="page-header">Casos</h1>
          	<div class="container">
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-4"><img src="geral/img/lupa.png" width="80"></div>
					<div class="col-md-4"><a href="#" onclick="carregaPagina('geral/casos/cadastrar_caso.php');"><img src="geral/img/cadastro.png" width="80">Novo Caso</a>
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
						<div class="col-md-3"><input type="text" name="nome" id='campoPesquisa' placeholder ="Digite o nome do caso..." class="input" onfocus="this.value=''"/> </div>
							<div class="col-md-3">
								<select name="competencia" id="competencia" class="form-control">
			                  		<option value="">Todas as Competências</option>
			                  		<option value="vs"> Vigilância Sanitária</option>
			                  		<option value="va"> Vigilância Ambiental  </option>
			                  		<option value="ve"> Vigilância Epidemiologica  </option>
        						</select> 
							</div>
							<div class="col-md-3"> 
								<button onclick="buscar('geral/casos/buscar_caso.php');" class="btn btn-md btn-success btn-block">Buscar</button>
								<div class="col-md-3"></div>
							</div>
					 </div>
				</div>
			</form> 

			<div id="tabBusca" ><script>buscar("geral/casos/buscar_caso.php");</script></div>


