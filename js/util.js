/*Funcao generica para que qualquer busca da pagina trabalhe da 
mesma forma*/
function buscar(paginaBusca){
	var datastring = $("#fBusca").serialize();
	$.ajax({
		  type: "POST",
		  url: paginaBusca,
		  data: datastring,
		  dataType: "html",
		  success: function(response) {
		      $("#tabBusca").html(response);
		      paginacaoBusca(20);
		  },
		  error: function() {
		      alert('Houve um erro.');
		  }
	});

	
}

function show_confirm(ncodigo,pagExclusao,pagVolta){
    var excluir = confirm("Deseja Excluir este Item?");
    if( excluir){
		$.post(pagExclusao,
			{codigo:ncodigo},
			function(data,status){
				if(status=="success"){
					configAlerts("success","Exclusão realizada com sucesso!!");

				}else{
					configAlerts("danger","Erro na exclusão!");
				}

	 		});
		carregaPagina(pagVolta);
   }
 }

/*Carrega a pagina quando clicada no sidebar*/
function carregaPagina(link){
	$("#conteudo").load(link);
}
/*Valida qualquer form que tiver o name fcadastrar*/
function validaForm(){
		var formulario = document.forms["fcadastrar"];
		for(var i=0;i< formulario.elements.length;i++){
			if(formulario.elements[i].required){
				if(formulario.elements[i].tagName=="TEXTAREA"){
					if(formulario.elements[i].value.trim()==""){
						formulario.elements[i].focus();
						return false;
					}
				}
				if(formulario.elements[i].value==""){
					formulario.elements[i].focus();	
					return false;					
				}					
			}
		}
		return true;
}
/**/
function configAlerts(status,mensagem){
		switch(status){
			case "success":
				$("#myAlert").hide();
				$("#myAlert").removeClass();
				$("#myAlert").addClass("alert alert-success alert-dismissable");
				$("#myAlert").show();
			break;
			case "fail":
				$("#myAlert").hide();
				
				$("#myAlert").addClass("alert alert-danger alert-dismissable");
				$("#myAlert").show();
			break;
			case "warning":
				$("#myAlert").hide();
				$("#myAlert").removeClass();
				$("#myAlert").addClass("alert alert-warning alert-dismissable");
				$("#myAlert").show();
			break;
			case "info":
				$("#myAlert").hide();
				$("#myAlert").removeClass();
				$("#myAlert").addClass("alert alert-info alert-dismissable");
				$("#myAlert").show();
			break;
		}
		$("#myAlert").html(mensagem);

		$("#myAlert").fadeTo(2000, 500).slideUp(500, function(){
 			$("#myAlert").slideUp(500);
		});
}

function ir_para_pagina(numero_da_pagina,mostrar_por_pagina) {
      //Pegamos o número de itens definidos que seria exibido por página
      var mostrar_por_pagina = parseInt(mostrar_por_pagina, 0);
      //pegamos  o número de elementos por onde começar a fatia
      inicia = numero_da_pagina * mostrar_por_pagina;
     //o número do elemento onde terminar a fatia
      end_on = inicia + mostrar_por_pagina;
     $('#resultBusca').children('.row.list-group.busca').css('display', 'none').slice(inicia, end_on).css('display', 'block');
     $('.page[longdesc=' + numero_da_pagina+ ']').addClass('active')
       .siblings('.active').removeClass('active');
    $('#current_page').val(numero_da_pagina);
  }

 function anterior() {
     nova_pagina = parseInt($('#current_page').val(), 0) - 1;
      //se houver um item antes do link ativo atual executar a função
      if ($('.active').prev('.page').length == true) {
          ir_para_pagina(nova_pagina);
      }
  }

function proxima() {
      nova_pagina = parseInt($('#current_page').val(), 0) + 1;
      //se houver um item após o link ativo atual executar a função
      if ($('.active').next('.page').length == true) {
          ir_para_pagina(nova_pagina);
      }
  }

function paginacaoBusca(mostrar_por_pagina){
    var numero_de_itens = $('#tabBusca').children('#resultBusca').children('.row.list-group.busca').size();
    var numero_de_paginas = Math.ceil(numero_de_itens / mostrar_por_pagina);
    $('#pagi').append('<div class=controls></div><input id=current_page type=hidden><input id=mostrar_por_pagina type=hidden>');
    $('#current_page').val(0);
    $('#mostrar_por_pagina').val(mostrar_por_pagina);
    var navegacao = '';
	var link_atual = 0;
	
	while (numero_de_paginas > link_atual) {
        navegacao += '<li><a class="page" onclick="ir_para_pagina(' + link_atual + ','+mostrar_por_pagina+')" longdesc="' + link_atual + '">' + (link_atual + 1) + '</a></li>';
    	link_atual++;
    }
	
	$('.controls').html('<div class="paginacao"><ul class="pagination pagination-sm">'+navegacao+'</ul></div>');
	$('.controls .page:first').addClass('active');
			      $('#tabBusca').children().css('display', 'none');
			      $('#tabBusca').children().slice(0, mostrar_por_pagina).css('display', 'block');


}
