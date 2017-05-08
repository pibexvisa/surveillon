
$(function() {
  
    
    $("#cadastro").validate({
    
        
        rules: {
	
		matricula: {
                    required: true,
                    minlength: 2,
                    maxlength: 10
                },
		
	   senha: {
                    required: true,
                    minlength: 8,
                    maxlength: 20
                },
		
            nome: {
                    required: true,
                    minlength: 5,
                    maxlength: 40
                },
		cpf: {
                    required: true,
                    minlength: 11,
                    number: true
		   
                },
                email: {
                    required: true,
                    email: true
                },
                telefone: {
                    required: true,
                    minlength: 11,
		    number: true
                },
           	perfil: {
                    required: true
                },                
           	  
		},
        
        
        messages: {
            	
		matricula: {
                    required: "Campo obrigatório",
                    minlength: "Mínimo de caracteres permitidos 2",
                    maxlength: "Maxímo de caracteres permitidos 10"
		},
		
	    senha: {
                    required: "Campo obrigatório",
                    minlength: "Mínimo de caracteres permitidos 8",
                   
                },
	
           nome: {
                    required: "Campo obrigatório",
                    minlength: "Mínimo de caracteres permitidos 5",
                    maxlength: "Maxímo de caracteres permitidos 40"
			
                },
		cpf: {
                    required: "Campo obrigatório",
                    minlength: "Mínimo de caracteres permitidos 11",
                    number: "Digite apenas números"
		   
                },
                
                email:{ 
			email:"Digite um email válido",
			required: "Campo obrigatório"
		
			},
                telefone: {
                    required: "Campo obrigatório",
                    minlength: "Mínimo de caracteres permitidos 11",
			number: "Digite apenas números"
                },
              
                perfil: {
	            required: "Campo obrigatório"
                },
		
            }
        });
	});
  

