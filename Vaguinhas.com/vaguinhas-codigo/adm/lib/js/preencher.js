$(document).ready( function() {
   /* Executa a requisição quando o campo CEP perder o foco */
   $('#preenchimento').click(function(){
           /* Configura a requisição AJAX */
           $.ajax({
                url : 'includes/preencher.php', /* URL que será chamada */
                type : 'POST', /* Tipo da requisição */
                data: 'usuario_id=' + $('#usuario_preenche').val(), /* dado que será enviado via POST */
                dataType: 'json', /* Tipo de transmissão */
                success: function(data){
                    if(data.sucesso == 1){
                        $('#rg_responsavel').val(data.rg);
                        $('#responsavel_visita').val(data.nome);
						$('#cpf_responsavel').val(data.cpf);
                    }
                }
           });
   return false;
   })
});
