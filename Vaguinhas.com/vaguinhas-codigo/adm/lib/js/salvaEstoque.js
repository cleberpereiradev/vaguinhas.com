var req;
function salvaEstoque(produtosId, minimo, atual, divResultado) {
	if(window.XMLHttpRequest) {
		req = new XMLHttpRequest();
	}else if(window.ActiveXObject) {
		req = new ActiveXObject("Microsoft.XMLHTTP");
	}
	var url = "includes/salvaEstoque.php?produtos_id=" + produtosId + "&minimo=" + minimo + "&atual=" + atual;
	req.open("Get", url, true);
	req.onreadystatechange = function() {
		if(req.readyState == 1) {
			document.getElementById(divResultado).innerHTML = "<span style='color: #268b3c;'>carregando...</span>";
		}
		if(req.readyState == 4 && req.status == 200) {
			var resposta = req.responseText;
			document.getElementById(divResultado).innerHTML = resposta;
			var linha_id = "linha_id_" + produtosId;

			if(minimo <= atual){
				document.getElementById(linha_id).style.backgroundColor = "#ff7a7a";
			}else{
				document.getElementById(linha_id).style.backgroundColor = "#ffffff";
			}
		}
	}
	req.send(null);
}
