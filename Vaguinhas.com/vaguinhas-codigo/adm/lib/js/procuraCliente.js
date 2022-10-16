$(document).ready( function() {
   /* Executa a requisição quando o campo CEP perder o foco */
   $('#cpf_vendedor').blur(function(){
           /* Configura a requisição AJAX */
           $.ajax({
                url : 'includes/buscarVendedor.php', /* URL que será chamada */ 
                type : 'POST', /* Tipo da requisição */ 
                data: 'cpf_vendedor=' + $('#cpf_vendedor').val(), /* dado que será enviado via POST */
                dataType: 'json', /* Tipo de transmissão */
                success: function(data){
                    if(data.sucesso == 1){
                        //dados vendedor
                        $('#rg_ie_vendedor').val(data.rg_ie);
						$('#nome_razao_social_vendedor').val(data.nome_razao_social);
						$('#telefone_vendedor').val(data.telefone);
						$('#celular_vendedor').val(data.celular);
						$('#data_nascimento_vendedor').val(data.data_nascimento);
						$('#nacionalidade_vendedor').val(data.nacionalidade);
						$('#profissao_vendedor').val(data.profissao);
						$('#email_vendedor').val(data.email);
						$('#estado_civil_vendedor').val(data.estado_civil);
						
						if(data.estado_civil == "casado"){
							$("#dadosConjugeVendedor").show();
							//dados conjuge
							$('#comunhao_casamento_vendedor').val(data.comunhao_casamento);
							$('#cpf_conjuge_vendedor').val(data.cpf_conjuge);
							$('#rg_ie_conjuge_vendedor').val(data.rg_ie_conjuge);
							$('#nome_razao_social_conjuge_vendedor').val(data.nome_razao_social_conjuge);
							$('#telefone_conjuge_vendedor').val(data.telefone_conjuge);
							$('#celular_conjuge_vendedor').val(data.celular_conjuge);
							$('#data_nascimento_conjuge_vendedor').val(data.data_nascimento_conjuge);
							$('#nacionalidade_conjuge_vendedor').val(data.nacionalidade_conjuge);
							$('#profissao_conjuge_vendedor').val(data.profissao_conjuge);
							$('#email_conjuge_vendedor').val(data.email_conjuge);
						}else{
							$("#dadosConjugeVendedor").hide();
						}
						
						//endereço vendedor
						$('#cep_vendedor').val(data.cep);
						$('#rua_vendedor').val(data.rua);
						$('#numero_vendedor').val(data.numero);
						$('#complemento_vendedor').val(data.complemento);
						$('#bairro_vendedor').val(data.bairro);
						$('#cidade_vendedor').val(data.cidade);
						$('#estado_vendedor').val(data.estado);
						$('#vendedor_id').val(data.id);
                    }
                }
           });   
   return false;    
   })
});
$(document).ready( function() {
   /* Executa a requisição quando o campo CEP perder o foco */
   $('#cpf_comprador').blur(function(){
           /* Configura a requisição AJAX */
           $.ajax({
                url : 'includes/buscarComprador.php', /* URL que será chamada */ 
                type : 'POST', /* Tipo da requisição */ 
                data: 'cpf_comprador=' + $('#cpf_comprador').val(), /* dado que será enviado via POST */
                dataType: 'json', /* Tipo de transmissão */
                success: function(data){
                    if(data.sucesso == 1){
						
						//dados comprador
                        $('#rg_ie_comprador').val(data.rg_ie);
						$('#nome_razao_social_comprador').val(data.nome_razao_social);
						$('#telefone_comprador').val(data.telefone);
						$('#celular_comprador').val(data.celular);
						$('#data_nascimento_comprador').val(data.data_nascimento);
						$('#nacionalidade_comprador').val(data.nacionalidade);
						$('#profissao_comprador').val(data.profissao);
						$('#email_comprador').val(data.email);
						$('#estado_civil_comprador').val(data.estado_civil);
						
						if(data.estado_civil == "casado"){
							$("#dadosConjugeComprador").show();
							//dados conjuge
							$('#comunhao_casamento_comprador').val(data.comunhao_casamento);
							$('#cpf_conjuge_comprador').val(data.cpf_conjuge);
							$('#rg_ie_conjuge_comprador').val(data.rg_ie_conjuge);
							$('#nome_razao_social_conjuge_comprador').val(data.nome_razao_social_conjuge);
							$('#telefone_conjuge_comprador').val(data.telefone_conjuge);
							$('#celular_conjuge_comprador').val(data.celular_conjuge);
							$('#data_nascimento_conjuge_comprador').val(data.data_nascimento_conjuge);
							$('#nacionalidade_conjuge_comprador').val(data.nacionalidade_conjuge);
							$('#profissao_conjuge_comprador').val(data.profissao_conjuge);
							$('#email_conjuge_comprador').val(data.email_conjuge);
						}else{
							$("#dadosConjugeComprador").hide();
						}
						
						//endereço comprador
						$('#cep_comprador').val(data.cep);
						$('#rua_comprador').val(data.rua);
						$('#numero_comprador').val(data.numero);
						$('#complemento_comprador').val(data.complemento);
						$('#bairro_comprador').val(data.bairro);
						$('#cidade_comprador').val(data.cidade);
						$('#estado_comprador').val(data.estado);
						$('#comprador_id').val(data.id);
                    }
                }
           });   
   return false;    
   })
});