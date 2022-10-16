var req;
function removerItemOrcamento(itensID, orcamentosID, divResultado) {
	if(window.XMLHttpRequest) {
		req = new XMLHttpRequest();
	}else if(window.ActiveXObject) {
		req = new ActiveXObject("Microsoft.XMLHTTP");
	}
	var url = "includes/removerItemOrcamento.php?itens_id=" + itensID + "&orcamentos_id=" + orcamentosID;
	req.open("Get", url, true);
	req.onreadystatechange = function() {
		if(req.readyState == 1) {
			document.getElementById(divResultado).innerHTML = "<span style='color: #268b3c;'>carregando...</span>";
		}
		if(req.readyState == 4 && req.status == 200) {
			var resposta = req.responseText;
			document.getElementById(divResultado).innerHTML = resposta;
		}
	}
	req.send(null);
}
