/*
var req;
function selecionaInsumo(qtdImpresso, formato, codProduto, descricao, erro, qtd, valorUnitario, valorTotal, contLinha, divResultado) {
	if(window.XMLHttpRequest) {
		req = new XMLHttpRequest();
	}else if(window.ActiveXObject) {
		req = new ActiveXObject("Microsoft.XMLHTTP");
	}
	var url = "includes/selecionaInsumo.php?qtdImpresso=" + qtdImpresso + "&formato=" + formato +"&codProduto="+ codProduto + "&descricao=" + descricao + "&erro=" + erro + "&qtd=" + qtd + "&valorUnitario=" + valorUnitario + "&valorTotal=" + valorTotal + "&contLinha=" + contLinha;
	req.open("Get", url, true);
	req.onreadystatechange = function() {
		if(req.readyState == 1) {
			document.getElementById(divResultado).innerHTML = "<span style='color: #268b3c;'>carregando...</span>";
		}
		if(req.readyState == 4 && req.status == 200) {
			var resposta = req.responseText;
			document.getElementById(divResultado).innerHTML += resposta;
			document.getElementById('contLinha').value = parseInt(contLinha) + parseInt(1);
			document.getElementById('descricao').value = "";
		}
		if(valor == ""){
			document.getElementById(divResultado).innerHTML += "";
		}
	}
	req.send(null);
}
*/


var req;
function selecionaInsumo(materialID, itensID, divResultado){
	if(window.XMLHttpRequest) {
		req = new XMLHttpRequest();
	}else if(window.ActiveXObject) {
		req = new ActiveXObject("Microsoft.XMLHTTP");
	}
	var url = "includes/selecionaInsumo.php?material_id=" + materialID + "&itens_id=" + itensID;
	req.open("Get", url, true);
	req.onreadystatechange = function() {
		if(req.readyState == 1) {
			//document.getElementById(divResultado).innerHTML = "<span style='color: #268b3c;'>carregando...</span>";
		}
		if(req.readyState == 4 && req.status == 200) {
			var resposta = req.responseText;
			var resultado = parseFloat(resposta);
			document.getElementById(divResultado).value = resultado.toLocaleString('pt-br', {minimumFractionDigits: 2});
		}
	}
	req.send(null);
}
