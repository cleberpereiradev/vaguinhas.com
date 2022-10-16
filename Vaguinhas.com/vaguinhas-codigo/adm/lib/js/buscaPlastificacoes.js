$(document).ready( function() {
   /* Executa a requisição quando o campo CEP perder o foco */
   $('#plastificacoes_id').change(function(){
       document.getElementById('largura_plastifica').value = "";
       document.getElementById('comprimento_plastifica').value = "";
       document.getElementById('cm_plastifica').value = "";
       document.getElementById('custo_plastifica').value = "";
       document.getElementById('volta_custo_plastifica').value = "";
       document.getElementById('mostraCustoPlastifica').value = "";
       document.getElementById('total_plastifica').value = "";
       /* Configura a requisição AJAX */
       $.ajax({
            url : 'includes/buscaPlastificacoes.php', /* URL que será chamada */
            type : 'POST', /* Tipo da requisição */
            data: 'valor=' + $('#plastificacoes_id').val(), /* dado que será enviado via POST */
            dataType: 'json', /* Tipo de transmissão */
            success: function(data){
                if(data.sucesso == 1){
                    $('#volta_custo_plastifica').val(data.custo);
                    $('#mostraCustoPlastifica').html(data.mostraCusto);

                }else{
                    $('#volta_custo_plastifica').val("");
                }
            }
       });
       return false;
   })
});
