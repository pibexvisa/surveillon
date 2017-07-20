        <h1 class="page-header">Usuário</h1>
            <div class="container">
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-4"><img src="geral/img/lupa.png" width="80"></div>
          <div class="col-md-4"><a href="#" onclick="carregaPagina('geral/usuario/cadastrarUsu.php');"><img src="geral/img/cadastro.png" width="80">Novo Usuário</a>
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
              <div class="col-md-3">
                <label>Nome</label>
                <input type="text" name="nome" id='nome' placeholder ="Digite o nome..." class="input" onfocus="this.value=''"/> 
              </div>
              <div class="col-md-3">
                <label>Matrícula</label>
                <input type="text" name="matricula" id='matricula' placeholder ="Digite a matrícula." class="input" onfocus="this.value=''"/> 
              </div>
              <div class="col-md-2">
                <select name="perfil" id="perfil" class="form-control">
                    <option value="">Todos os perfis</option>
                    <option value="adm">Administrador</option>
                    <option value="com">Comum</option>
                  </select> 
              </div>
              <div class="col-md-2"> 
                <button onclick="buscar('geral/usuario/buscar_usuarios.php');" class="btn btn-md btn-success btn-block">Buscar</button>
              </div>
           </div>
        </div>

      </form> 

      <div id="tabBusca" ><script>buscar("geral/usuario/buscar_usuarios.php");</script></div> 



