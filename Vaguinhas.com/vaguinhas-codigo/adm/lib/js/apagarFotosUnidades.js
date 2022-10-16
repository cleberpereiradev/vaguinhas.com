var req;
function apagaFoto(fotoId, divresultado, unidadesId) {
	if(window.XMLHttpRequest) {
		req = new XMLHttpRequest();
	}else if(window.ActiveXObject) {
		req = new ActiveXObject("Microsoft.XMLHTTP");
	}
	var url = "includes/apagarFotosUnidades.php?id=" + fotoId + "&unidades_id=" + unidadesId;
	req.open("Get", url, true);
	req.onreadystatechange = function() {
		if(req.readyState == 1) {
			document.getElementById(divresultado).innerHTML = "<span style='color: #268b3c;'>Buscando...</span>";
		}
		if(req.readyState == 4 && req.status == 200) {
			var resposta = req.responseText;
			document.getElementById(divresultado).innerHTML = resposta;
		}
		if(valor == ""){
			document.getElementById(divresultado).innerHTML = "";
		}
	}
req.send(null);
}

