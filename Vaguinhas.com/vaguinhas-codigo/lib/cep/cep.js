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
   /* Executa a requisição quando o campo CEP perder o foco */
  $('#cep2').blur(function(){
          /* Configura a requisição AJAX */
          $.ajax({
               url : 'lib/cep/consultar_cep.php', /* URL que será chamada */
               type : 'POST', /* Tipo da requisição */
               data: 'cep=' + $('#cep2').val(), /* dado que será enviado via POST */
               dataType: 'json', /* Tipo de transmissão */
               success: function(data){
                   if(data.sucesso == 1){
                       $('#rua2').val(data.rua);
                       $('#bairro2').val(data.bairro);
                       $('#cidade2').val(data.cidade);
                       $('#estado2').val(data.estado);

                       $('#numero2').focus();
                   }
               }
          });
  return false;
  })
});
$(document).ready( function() {
   /* Executa a requisição quando o campo CEP perder o foco */
   $('#cep_vendedor').blur(function(){
           /* Configura a requisição AJAX */
           $.ajax({
                url : 'lib/cep/consultar_cep.php', /* URL que será chamada */ 
                type : 'POST', /* Tipo da requisição */ 
                data: 'cep=' + $('#cep_vendedor').val(), /* dado que será enviado via POST */
                dataType: 'json', /* Tipo de transmissão */
                success: function(data){
                    if(data.sucesso == 1){
                        $('#rua_vendedor').val(data.rua);
                        $('#bairro_vendedor').val(data.bairro);
                        $('#cidade_vendedor').val(data.cidade);
                        $('#estado_vendedor').val(data.estado);
 
                        $('#numero_vendedor').focus();
                    }
                }
           });   
   return false;    
   })
});
$(document).ready( function() {
   /* Executa a requisição quando o campo CEP perder o foco */
   $('#cep_comprador').blur(function(){
           /* Configura a requisição AJAX */
           $.ajax({
                url : 'lib/cep/consultar_cep.php', /* URL que será chamada */ 
                type : 'POST', /* Tipo da requisição */ 
                data: 'cep=' + $('#cep_comprador').val(), /* dado que será enviado via POST */
                dataType: 'json', /* Tipo de transmissão */
                success: function(data){
                    if(data.sucesso == 1){
                        $('#rua_comprador').val(data.rua);
                        $('#bairro_comprador').val(data.bairro);
                        $('#cidade_comprador').val(data.cidade);
                        $('#estado_comprador').val(data.estado);
 
                        $('#numero_comprador').focus();
                    }
                }
           });   
   return false;    
   })
});
