$(document).ready( function() {
   /* Executa a requisição quando o campo CEP perder o foco */
   $('#materialID').change(function(){
           /* Configura a requisição AJAX */
           $.ajax({
                url : 'includes/buscaMaterial.php', /* URL que será chamada */
                type : 'POST', /* Tipo da requisição */
                data: 'valor=' + $('#materialID').val(), /* dado que será enviado via POST */
                dataType: 'json', /* Tipo de transmissão */
                success: function(data){
                    if(data.sucesso == 1){
                        $('#voltaUnidadeMedida').val(data.unidadeMedida);
                        $('#voltaQtd').val(data.qtd);
                    }else{
                        $('#voltaUnidadeMedida').val("");
                        $('#voltaQtd').val("");
                    }
                }
           });
   return false;
   })

   $('#materialRetirarID').change(function(){
           /* Configura a requisição AJAX */
           $.ajax({
                url : 'includes/buscaMaterial.php', /* URL que será chamada */
                type : 'POST', /* Tipo da requisição */
                data: 'valor=' + $('#materialRetirarID').val(), /* dado que será enviado via POST */
                dataType: 'json', /* Tipo de transmissão */
                success: function(data){
                    if(data.sucesso == 1){
                        $('#voltaUnidadeMedida1').val(data.unidadeMedida);
                        $('#voltaQtd1').val(data.qtd);
                    }else{
                        $('#voltaUnidadeMedida1').val("");
                        $('#voltaQtd1').val("");
                    }
                }
           });
   return false;
   })

   $('#compraMaterialID').change(function(){
           /* Configura a requisição AJAX */
           $.ajax({
                url : 'includes/buscaMaterialCompra.php', /* URL que será chamada */
                type : 'POST', /* Tipo da requisição */
                data: 'material_id=' + $('#compraMaterialID').val(), /* dado que será enviado via POST */
                dataType: 'json', /* Tipo de transmissão */
                success: function(data){
                    if(data.sucesso == 1){
                        $('#voltaUnidadeMedida').val(data.unidadeMedida);
                        $('#voltaUnidadeMedidaID').val(data.unidadeMedidaID);
                    }else{
                        $('#voltaUnidadeMedida').val("");
                        $('#voltaUnidadeMedidaID').val("");
                    }
                }
           });
   return false;
   })

});
