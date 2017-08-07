        <h1 class="page-header">Visitas</h1>
            <div class="container">
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-4"><img src="geral/img/lupa.png" width="80"></div>
          <div class="col-md-4"><a href="#" onclick="carregaPagina('geral/visita/cadastrar_visita.php');"><img src="geral/img/cadastro.png" width="80">Nova Visita</a>
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
            <div class="col-md-6"><input type="text" name="nome" id='campoPesquisa' placeholder ="Digite o nome do agente..." class="input" onfocus="this.value=''"/> </div>
              <div class="col-md-3"> 
                <button onclick="buscar('geral/visita/buscar_visita.php');" class="btn btn-md btn-success btn-block">Buscar</button>
                <div class="col-md-3"></div>
              </div>
           </div>
        </div>
      </form> 



      <div id="tabBusca" ><script>buscar("geral/visita/buscar_visita.php");</script></div> 
 
            <script type="text/javascript">


              
           </script>




