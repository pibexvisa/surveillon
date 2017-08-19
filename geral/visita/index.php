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
            <div class="col-md-3">
			       <label>Data Inicial:</label>
            <input type="text" name="data1" id='data1' placeholder ="Data Inicial" class="input" onfocus="this.value=''" style="width: 100px;"/> 
			
            </div>
            <div class="col-md-3">
              <label>Data Final:</label>
              <input type="text" name="data2" id='data2' placeholder ="Data Final" class="input" onfocus="this.value=''" style="width: 100px;"/>
            </div>
            <div class="col-md-3">
			       <label>Agente:</label>
              <input type="text" name="nome" id='nome' placeholder ="Digite o nome do agente" class="input" onfocus="this.value=''" style="width: 150px;"/>
            </div>
            <div class="col-md-2"> 
                <button onclick="buscar('geral/visita/buscar_visita.php');" class="btn btn-md btn-success">Buscar</button>
              </div>
            <div class="col-md-4"></div>
          </div>
        </div>    
				
      </form> 



      <div id="tabBusca" ><script>buscar("geral/visita/buscar_visita.php");</script></div> 
 
            <script type="text/javascript">


              
           </script>




