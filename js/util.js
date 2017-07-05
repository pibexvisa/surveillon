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

/*function paginacaoBusca(totalLinhas,limite,curPage,hTextPrefix){

	$('.pagination').pagination({
        items: totalLinhas,
        itemsOnPage: <limite,
        cssStyle: 'light-theme',
        currentPage : curPage,
        hrefTextPrefix : hTextPrefix+'?page=';
	});

}*/
