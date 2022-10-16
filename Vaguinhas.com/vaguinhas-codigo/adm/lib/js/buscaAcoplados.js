$(document).ready( function() {
   /* Executa a requisição quando o campo CEP perder o foco */
   $('#acoplados_id').change(function(){
       document.getElementById('largura_acoplado').value = "";
       document.getElementById('comprimento_acoplado').value = "";
       document.getElementById('cm_acoplado').value = "";
       document.getElementById('custo_acoplado').value = "";
       document.getElementById('volta_custo_acoplado').value = "";
       document.getElementById('mostraCustoAcoplado').value = "";
       document.getElementById('total_acoplado').value = "";

       /* Configura a requisição AJAX */
       $.ajax({
            url : 'includes/buscaAcoplados.php', /* URL que será chamada */
            type : 'POST', /* Tipo da requisição */
            data: 'valor=' + $('#acoplados_id').val(), /* dado que será enviado via POST */
            dataType: 'json', /* Tipo de transmissão */
            success: function(data){
                if(data.sucesso == 1){
                    $('#volta_custo_acoplado').val(data.custo);
                    $('#mostraCustoAcoplado').html(data.mostraCusto);

                }else{
                    $('#volta_custo_acoplado').val("");
                }
            }
       });
       return false;
   })
});
