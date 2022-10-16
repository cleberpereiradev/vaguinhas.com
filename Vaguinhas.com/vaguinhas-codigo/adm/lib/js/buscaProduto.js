$(document).ready( function() {
   /* Executa a requisição quando o campo CEP perder o foco */
   $('#selecionaProduto').blur(function(){
           /* Configura a requisição AJAX */
           $.ajax({
                url : 'includes/consultarProduto.php', /* URL que será chamada */ 
                type : 'POST', /* Tipo da requisição */ 
                data: 'produtos_id=' + $('#selecionaProduto').val(), /* dado que será enviado via POST */
                dataType: 'json', /* Tipo de transmissão */
                success: function(data){
                    if(data.sucesso == 1){
                        $('#valorProduto').val(data.valorProduto);
						$('#porcentoMinimo').val(data.porcentoMinimo);
                    }
                }
           });   
   return false;    
   })
});
