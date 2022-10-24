$(document).ready( function() {
   /* Executa a requisição quando o campo CEP perder o foco */
   $('#cep').blur(function(){
           /* Configura a requisição AJAX */
           $.ajax({
                url : 'lib/cep/consultar_cep.php', /* URL que será chamada */ 
                type : 'POST', /* Tipo da requisição */ 
                data: 'cep=' + $('#cep').val(), /* dado que será enviado via POST */
                dataType: 'json', /* Tipo de transmissão */
                success: function(data){
                    if(data.sucesso == 1){
                        $('#rua').val(data.rua);
                        $('#bairro').val(data.bairro);
                        $('#cidade').val(data.cidade);
                        $('#estado').val(data.estado);
 
                        $('#numero').focus();
                    }
                }
           });   
   return false;    
   })
});

$(document).ready( function() {
   /* Executa a requisição quando o campo CEP perder o foco */
   $('#cep1').blur(function(){
           /* Configura a requisição AJAX */
           $.ajax({
                url : 'lib/cep/consultar_cep.php', /* URL que será chamada */ 
                type : 'POST', /* Tipo da requisição */ 
                data: 'cep=' + $('#cep1').val(), /* dado que será enviado via POST */
                dataType: 'json', /* Tipo de transmissão */
                success: function(data){
                    if(data.sucesso == 1){
                        $('#rua1').val(data.rua);
                        $('#bairro1').val(data.bairro);
                        $('#cidade1').val(data.cidade);
                        $('#estado1').val(data.estado);
 
                        $('#numero1').focus();
                    }
                }
           });   
   return false;    
   })
});