function carregaPagina(link){
			//alert(link);
			$("#conteudo").load(link);
		}
/**/
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
