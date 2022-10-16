$(document).ready( function() {
   /* Executa a requisição quando o campo CEP perder o foco */
   $('#salvar_venda').click(function(){
           /* Configura a requisição AJAX */
           $.ajax({
                url : 'includes/preencheUnidade.php', /* URL que será chamada */
                type : 'POST', /* Tipo da requisição */
                data: 'unidades_id=' + $('#unidades_id').val() + '&valor=' + $('#valor').val() + '&tipo_pagamento=' + $('#tipo_pagamento').val() + '&valor_entrada=' + $('#valor_entrada').val() + '&quantidade_parcelas_entrada=' + $('#quantidade_parcelas_entrada').val() + '&vencimento_entrada=' + $('#vencimento_entrada').val() + '&valor_mensais=' + $('#valor_mensais').val() + '&quantidade_parcelas_mensais=' + $('#quantidade_parcelas_mensais').val() + '&vencimento_parcelas_mensais=' + $('#vencimento_parcelas_mensais').val() + '&valor_intermediarias=' + $('#valor_intermediarias').val() + '&quantidade_parcelas_intermediarias=' + $('#quantidade_parcelas_intermediarias').val() + '&vencimento_parcelas_intermediarias=' + $('#vencimento_parcelas_intermediarias').val() + '&imobiliarias_id=' + $('#imobiliarias_id').val() + '&tipo=' + $('#tipo').val() + '&vendas_id=' + $('#vendas_id').val() + '&saldo_devedor=' + $('#saldo_devedor').val(), /* dado que será enviado via POST */
                dataType: 'json', /* Tipo de transmissão */
                success: function(data){
                    if(data.sucesso == 1){
                        $('#vendas_id').val(data.vendas_id);
                        $('#dadosVendedores-tab').removeClass("disabled");
						$('#dadosCompradores-tab').removeClass("disabled");
						$('#arquivosAuxiliares-tab').removeClass("disabled");
						$('#dadosVenda-tab').removeClass("active");
						$('#dadosVenda').removeClass("show");
						$('#dadosVenda').removeClass("active");
						$('#dadosVendedores-tab').addClass("aparece");
						$('#dadosVendedores').addClass("show");
						$('#dadosVendedores').addClass("active");
						$('#deuCerto').removeClass("some");
						$('#deuCerto').addClass("aparece");
						setTimeout(function(){
							$('#deuCerto').removeClass("aparece");
							$('#deuCerto').addClass("some");
						},3000);
						$('#tituloToast').html("Sucesso!");
						$('#tituloToast').addClass("text-success");
						$('#horarioToast').html(data.hora);
						$('#textoToast').html("O registro foi salvo com sucesso!");
						$('#textoToast').addClass("text-success");
						$(".toast").toast('show');
                    }else{
                        $('#vendas_id').val(data.vendas_id);
                        $('#dadosVendedores-tab').addClass("disabled");
						$('#dadosCompradores-tab').addClass("disabled");
						$('#arquivosAuxiliares-tab').addClass("disabled");
						$('#deuRuim').removeClass("some");
						$('#deuRuim').addClass("aparece");
						$('#tituloToast').html("Erro!");
						$('#tituloToast').addClass("text-danger");
						$('#horarioToast').html(data.hora);
						$('#textoToast').html("O registro não foi salvo!");
						$('#textoToast').addClass("text-danger");
						$(".toast").toast('show');
                    }
                }
           });
   return false;
   })
});
