var req;
 
// FUNÇÃO PARA BUSCA NOTICIA
function buscar(arquivo, valor, divresultado) {
 
// Verificando Browser
if(window.XMLHttpRequest) {
   req = new XMLHttpRequest();
}
else if(window.ActiveXObject) {
   req = new ActiveXObject("Microsoft.XMLHTTP");
}
 
// Arquivo PHP juntamente com o valor digitado no campo (método GET)
var url = "classes/buscas/"+arquivo+"?valor="+valor;
 
// Chamada do método open para processar a requisição
req.open("Get", url, true);
 
// Quando o objeto recebe o retorno, chamamos a seguinte função;
req.onreadystatechange = function() {
 
	// Exibe a mensagem "Buscando..." enquanto carrega
	if(req.readyState == 1) {
		document.getElementById(divresultado).innerHTML = "<span style='color: #268b3c;'>Buscando...</span>";
	}
 
	// Verifica se o Ajax realizou todas as operações corretamente
	if(req.readyState == 4 && req.status == 200) {
 
	// Resposta retornada pelo busca.php
	var resposta = req.responseText;
 
	// Abaixo colocamos a(s) resposta(s) na div resultado
	document.getElementById(divresultado).innerHTML = resposta;
	}
	if(valor == ""){
		document.getElementById(divresultado).innerHTML = "";
	}
}
req.send(null);
}



// FUNÇÃO PARA EXIBIR NOTICIA
function exibir(arquivop, id, divresultadop) {
 
// Verificando Browser
if(window.XMLHttpRequest) {
   req = new XMLHttpRequest();
}
else if(window.ActiveXObject) {
   req = new ActiveXObject("Microsoft.XMLHTTP");
}
 
// Arquivo PHP juntamento com a id da noticia (método GET)
var url = "classes/preencher/"+arquivop+"?id="+id;
 
// Chamada do método open para processar a requisição
req.open("Get", url, true);
 
// Quando o objeto recebe o retorno, chamamos a seguinte função;
req.onreadystatechange = function() {
 
	// Exibe a mensagem "Aguarde..." enquanto carrega
	if(req.readyState == 1) {
		document.getElementById(divresultadop).innerHTML = "<span style='color: #0091ff;'>Aguarde...";
	}
 
	// Verifica se o Ajax realizou todas as operações corretamente
	if(req.readyState == 4 && req.status == 200) {
 
	// Resposta retornada pelo exibir.php
	var resposta = req.responseText;
 
	// Abaixo colocamos a resposta na div conteudo
	document.getElementById(divresultadop).innerHTML = resposta;
	}
}
req.send(null);
}