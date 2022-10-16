function espelhaResultado(idOrigem,idDestino){
	var e = document.getElementById(idOrigem);
	var select = e.options[e.selectedIndex].text;
	document.getElementById(idDestino).value = select;
}

function LimparPreenche(idDiv){
	document.getElementById(idDiv).innerHTML = "";
}

function Preenche(idSelect, idDiv, tipo){

	if(tipo == "funcionarios"){
		var e = document.getElementById(idSelect);
		var Checkbox = e.options[e.selectedIndex].value;
		var ValorPreenchido = e.options[e.selectedIndex].innerHTML;
	}else{
		var Checkbox = document.getElementById(idSelect).value;
		var ValorPreenchido = Checkbox;
	}

	var teste = document.getElementById(idDiv).innerHTML;

	var str = teste;
	var patt = new RegExp(Checkbox);
	var res = patt.test(str);

	var alerta = "";

	if(tipo == "marcas"){
		alerta = "marca";
	}else if(tipo == "funcionarios"){
		alerta = "funcion\u00e1rio";
	}else{
		alerta = "especifica\u00e7\u00e3o";
	}

	if(Checkbox != ""){
		if (res == true) {
			alert("Voc\u00ea j\u00e1 incluiu essa "+alerta+"!");
		}else{
			var Check = "<label><input type='checkbox' name='"+tipo+"[]' value='"+Checkbox+"' checked>"+ValorPreenchido+"</label>";
			document.getElementById(idDiv).innerHTML += Check;
		}
	}
}
function optionCheck(){
	var option = document.getElementById("consulta").value;
	if(option == "renda"){
		document.getElementById("renda").style.display ="block";
		document.getElementById("bairro").style.display ="none";
		document.getElementById("idade").style.display ="none";
		document.getElementById("fgts").style.display ="none";
	}
	if(option == "bairro"){
		document.getElementById("renda").style.display ="none";
		document.getElementById("bairro").style.display ="block";
		document.getElementById("idade").style.display ="none";
		document.getElementById("fgts").style.display ="none";
	}
	if(option == "idade"){
		document.getElementById("renda").style.display ="none";
		document.getElementById("bairro").style.display ="none";
		document.getElementById("idade").style.display ="block";
		document.getElementById("fgts").style.display ="none";
	}
	if(option == "fgts"){
		document.getElementById("renda").style.display ="none";
		document.getElementById("bairro").style.display ="none";
		document.getElementById("idade").style.display ="none";
		document.getElementById("fgts").style.display ="block";
	}
}

function maiusculo(campo) {
	campo.value = campo.value.toUpperCase();
	var digits=" 0123456789.,abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-+çÇáÁàÀãÃâÂéÉèÈêÊíÍìÌîÎóÓòÒõÕôÔúÚùÙûÛñÑ*&%$#@!:;></\\"
	var campo_temp
	for (var i=0;i<campo.value.length;i++){
	  campo_temp=campo.value.substring(i,i+1)
	  if (digits.indexOf(campo_temp)==-1){
			campo.value = campo.value.substring(0,i);
			break;
	   }
	}
}
function acentos(campo){
	var digits=" 0123456789.,abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-+çÇ"
	var campo_temp
	for (var i=0;i<campo.value.length;i++){
	  campo_temp=campo.value.substring(i,i+1)
	  if (digits.indexOf(campo_temp)==-1){
			campo.value = campo.value.substring(0,i);
			break;
	   }
	}
}


function semApostrofo(campo){
	var digits=" 0123456789.,abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-+çÇáÁàÀãÃâÂéÉèÈêÊíÍìÌîÎóÓòÒõÕôÔúÚùÙûÛñÑ*&%$#@!:;></\\"
	var campo_temp
	for (var i=0;i<campo.value.length;i++){
	  campo_temp=campo.value.substring(i,i+1)
	  if (digits.indexOf(campo_temp)==-1){
			campo.value = campo.value.substring(0,i);
			break;
	   }
	}
}


function mascara(o,f){
	v_obj=o
	v_fun=f
	setTimeout("execmascara()",1)
}

function execmascara(){
	v_obj.value=v_fun(v_obj.value)
}


function data_mask(v){
	v=v.replace(/\D/g,"")
	v=v.replace(/(\d{2})(\d)/,"$1/$2")
	v=v.replace(/(\d{2})(\d)/,"$1/$2")
	v=v.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
	return v
}


function cpf_mask(v){
	v=v.replace(/\D/g,"")
	v=v.replace(/(\d{3})(\d)/,"$1.$2")
	v=v.replace(/(\d{3})(\d)/,"$1.$2")
	v=v.replace(/(\d{3})(\d)/,"$1-$2")
	return v
}

function rg_mask(v){
	v=v.replace(/\D/g,"");
	v=v.replace(/(\d)(\d{7})$/,"$1.$2");
	v=v.replace(/(\d)(\d{4})$/,"$1.$2");
	v=v.replace(/(\d)(\d)$/,"$1-$2");
    return v;
}

function tel_mask(v){
	v=v.replace(/\D/g,"")
	v=v.replace(/(\d{2})(\d)/,"($1) $2")
	v=v.replace(/(\d{4})(\d)/,"$1-$2")

    return v
}

function cel_mask(v){
	v=v.replace(/\D/g,"")
	v=v.replace(/(\d{2})(\d)/,"($1) $2 ")
	v=v.replace(/(\d{4})(\d)/,"$1-$2")

    return v
}

//----------------CIDADE E ESTADO PELO CEP
function limpa_formulário_cep() {
	//Limpa valores do formulário de cep.
    document.getElementById('rua').value=("");
    document.getElementById('bairro').value=("");
    document.getElementById('cidade').value=("");
    document.getElementById('uf').value=("");
    document.getElementById('ibge').value=("");
}

function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
		//Atualiza os campos com os valores.
		document.getElementById('rua').value=(conteudo.logradouro);
        document.getElementById('bairro').value=(conteudo.bairro);
        document.getElementById('cidade').value=(conteudo.localidade);
        document.getElementById('uf').value=(conteudo.uf);
        document.getElementById('ibge').value=(conteudo.ibge);
    } //end if.
    else {
        //CEP não Encontrado.
        limpa_formulário_cep();
        alert("CEP não encontrado.");
    }
}

function pesquisacep(valor) {
	//Nova variável "cep" somente com dígitos.
    var cep = valor.replace(/\D/g, '');
    //Verifica se campo cep possui valor informado.
    if (cep != "") {
		//Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;
        //Valida o formato do CEP.
		if(validacep.test(cep)) {

			//Preenche os campos com "..." enquanto consulta webservice.
			document.getElementById('rua').value="...";
			document.getElementById('bairro').value="...";
			document.getElementById('cidade').value="...";
			document.getElementById('uf').value="...";
            document.getElementById('ibge').value="...";

            //Cria um elemento javascript.
            var script = document.createElement('script');

            //Sincroniza com o callback.
            script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

            //Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);

        } //end if.
        else {
            //cep é inválido.
            limpa_formulário_cep();
            alert("Formato de CEP inválido.");
        }
    }else{
		//cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
};
//--------------------------------------------------



function optionqCheck(){
			var option = document.getElementById("optionsq").value;
			if(option == "q0"){
				document.getElementById("q1").style.display ="none";
				document.getElementById("q2").style.display ="none";
				document.getElementById("q3").style.display ="none";
				document.getElementById("abrirq").style.display ="none";
				document.getElementById("abrirq1").style.display ="none";
			}
			if(option == "q1"){
				document.getElementById("q1").style.display ="block";
				document.getElementById("q2").style.display ="none";
				document.getElementById("q3").style.display ="none";
				document.getElementById("abrirq").style.display ="block";
				document.getElementById("abrirq1").style.display ="block";
			}
			if(option == "q2"){
				document.getElementById("q1").style.display ="block";
				document.getElementById("q2").style.display ="block";
				document.getElementById("q3").style.display ="none";
				document.getElementById("abrirq").style.display ="block";
				document.getElementById("abrirq1").style.display ="block";
			}
			if(option == "q3"){
				document.getElementById("q1").style.display ="block";
				document.getElementById("q2").style.display ="block";
				document.getElementById("q3").style.display ="block";
				document.getElementById("abrirq").style.display ="block";
				document.getElementById("abrirq1").style.display ="block";
			}
}
function optioncCheck(){
			var option = document.getElementById("optionsc").value;
			if(option == "1"){
				document.getElementById("c1").style.display ="block";
			}
			if(option == "0"){
				document.getElementById("c1").style.display ="none";
			}
}
function optionsCheck(){
			var option = document.getElementById("optionss").value;
			if(option == "1"){
				document.getElementById("s1").style.display ="block";
			}
			if(option == "0"){
				document.getElementById("s1").style.display ="none";
			}
}
function optionaCheck(){
			var option = document.getElementById("optionsa").value;
			if(option == "1"){
				document.getElementById("a1").style.display ="block";
				document.getElementById("a2").style.display ="none";
			}
			if(option == "0"){
				document.getElementById("a1").style.display ="none";
				document.getElementById("a2").style.display ="block";
			}
}

function validarCPF( cpf, campo ){
	var filtro = /^\d{3}.\d{3}.\d{3}-\d{2}$/i;

	if(!filtro.test(cpf))
	{
		window.alert("CPF inválido. Tente novamente.");
		document.getElementById(campo).value = "";
		return false;
	}

	cpf = remove(cpf, ".");
	cpf = remove(cpf, "-");

	if(cpf.length != 11 || cpf == "00000000000" || cpf == "11111111111" ||
		cpf == "22222222222" || cpf == "33333333333" || cpf == "44444444444" ||
		cpf == "55555555555" || cpf == "66666666666" || cpf == "77777777777" ||
		cpf == "88888888888" || cpf == "99999999999")
	{
		window.alert("CPF inválido. Tente novamente.");
		document.getElementById(campo).value = "";
		return false;
   }

	soma = 0;
	for(i = 0; i < 9; i++)
	{
		soma += parseInt(cpf.charAt(i)) * (10 - i);
	}

	resto = 11 - (soma % 11);
	if(resto == 10 || resto == 11)
	{
		resto = 0;
	}
	if(resto != parseInt(cpf.charAt(9))){
		window.alert("CPF inválido. Tente novamente.");
		document.getElementById(campo).value = "";
		return false;
	}

	soma = 0;
	for(i = 0; i < 10; i ++)
	{
		soma += parseInt(cpf.charAt(i)) * (11 - i);
	}
	resto = 11 - (soma % 11);
	if(resto == 10 || resto == 11)
	{
		resto = 0;
	}

	if(resto != parseInt(cpf.charAt(10))){
		window.alert("CPF inválido. Tente novamente.");
		document.getElementById(campo).value = "";
		return false;
	}

	return true;
 }

function remove(str, sub) {
	i = str.indexOf(sub);
	r = "";
	if (i == -1) return str;
	{
		r += str.substring(0,i) + remove(str.substring(i + sub.length), sub);
	}

	return r;
}

function FormataCnpj(campo, teclapres)
			{
				var tecla = teclapres.keyCode;
				var vr = new String(campo.value);
				vr = vr.replace(".", "");
				vr = vr.replace("/", "");
				vr = vr.replace("-", "");
				tam = vr.length + 1;
				if (tecla != 14)
				{
					if (tam == 3)
						campo.value = vr.substr(0, 2) + '.';
					if (tam == 6)
						campo.value = vr.substr(0, 2) + '.' + vr.substr(2, 5) + '.';
					if (tam == 10)
						campo.value = vr.substr(0, 2) + '.' + vr.substr(2, 3) + '.' + vr.substr(6, 3) + '/';
					if (tam == 15)
						campo.value = vr.substr(0, 2) + '.' + vr.substr(2, 3) + '.' + vr.substr(6, 3) + '/' + vr.substr(9, 4) + '-' + vr.substr(13, 2);
				}
			}



function validarCNPJ(cnpj) {

    cnpj = cnpj.replace(/[^\d]+/g,'');

    if(cnpj == '') return false;

    if (cnpj.length != 14)
        return false;

    // Elimina CNPJs invalidos conhecidos
    if (cnpj == "00000000000000" ||
        cnpj == "11111111111111" ||
        cnpj == "22222222222222" ||
        cnpj == "33333333333333" ||
        cnpj == "44444444444444" ||
        cnpj == "55555555555555" ||
        cnpj == "66666666666666" ||
        cnpj == "77777777777777" ||
        cnpj == "88888888888888" ||
        cnpj == "99999999999999")
        return false;

    // Valida DVs
    tamanho = cnpj.length - 2
    numeros = cnpj.substring(0,tamanho);
    digitos = cnpj.substring(tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(0))
        return false;

    tamanho = tamanho + 1;
    numeros = cnpj.substring(0,tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(1))
          return false;

    return true;

}


function selectVerifica(nome, tolerancia, metodo, resultado){
	var nomeVerifica = document.getElementById(nome).value;
	var toleranciaVerifica = document.getElementById(tolerancia).value;
	var metodoVerifica = document.getElementById(metodo).value;
	if(nomeVerifica != "" && toleranciaVerifica != "" && metodoVerifica != ""){
		var contador = document.getElementById('somar').value;
		contador++;
		document.getElementById('somar').value = contador;
		document.getElementById(resultado).innerHTML += "<div class='col-sm-3' id='"+ contador +"'><div class='card text-dark bg-info mb-3'><div class='card-body'><div class='row'><div class='col-sm-12 text-right'><button type='button' class='btn btn-danger btn-sm' onclick='apagaVerificacao(\""+ contador +"\");'><i class='fas fa-window-close'></i></button></div></div><label><b>Verificação:</b></label><input type='text' class='form-control' name='nome_verifica[]' value='"+ nomeVerifica +"' required><br><label><b>Tolerância:</b></label><input type='text' class='form-control' name='tolerancia_verifica[]' value='"+ toleranciaVerifica +"' required><br><label><b>Método:</b></label><input type='text' class='form-control' name='metodo_verifica[]' value='"+ metodoVerifica +"' required></div></div></div>";
		document.getElementById(nome).value = "";
		document.getElementById(tolerancia).value = "";
		document.getElementById(metodo).value = "";
	}else{
		alert('Preencha corretamente os dados da verifica\u00e7\u00e3o.');
	}
}

function apagaVerificacao(id){
	var contador = document.getElementById('somar').value;
	contador--;
	document.getElementById('somar').value = contador;

	document.getElementById(id).remove();
}

function limpaDiv(div){
	document.getElementById(div).innerHTML = "";
}


function escolherVizinho(vizinho, resultado){
	var vizinhos = document.getElementById(vizinho);

	var vizinhoID = vizinhos.options[vizinhos.selectedIndex].value;
	var vizinhoValor = vizinhos.options[vizinhos.selectedIndex].text;
	if(vizinhoID != ""){
		document.getElementById(resultado).innerHTML += "<div class='row form-group align-items-center'><div class='col-sm-12'><b>"+ vizinhoValor +"</b><input type='hidden' name='apto_vizinho_id[]' value='"+ vizinhoID +"'></div></div>";
	}else{

	}
}

function removerAgendamento(remover, visita){
	var visita_id = document.getElementById(visita).value;
	document.getElementById(remover).innerHTML += "<div class='row'><div class='col-sm-12'><label>Tem certeza que deseja excluir este agendamento de visita?</label> <a href='includes/removerVisita.php?visitaAgendada="+ visita_id +"'>Sim! Excluir</a></div></div>";
	//document.getElementById(remover).innerHTML += "<a href='includes/removerAgendamento.php?visitaID="+ visita_id +">REMOVER</a>";
}


function soNumero(campo){
	var digits=" 0123456789."
	var campo_temp
	for (var i=0;i<campo.value.length;i++){
	  campo_temp=campo.value.substring(i,i+1)
	  if (digits.indexOf(campo_temp)==-1){
			campo.value = campo.value.substring(0,i);
			break;
	   }
	}
}


function formatarMoeda(campo) {

    var elemento = document.getElementById(campo);
    var valor = elemento.value;

    if(valor == ""){
        valor = 0.0;
    }

    valor = valor + '';
    valor = parseInt(valor.replace(/[\D]+/g,''));
    valor = valor + '';
    valor = valor.replace(/([0-9]{2})$/g, ",$1");

    if (valor.length > 6) {
        valor = valor.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
    }
    if (valor.length > 10) {
        valor = valor.replace(/([0-9]{3}).([0-9]{3}),([0-9]{2}$)/g, ".$1.$2,$3");
    }
    if (valor.length > 14) {
        valor = valor.replace(/([0-9]{3}).([0-9]{3}).([0-9]{3}),([0-9]{2}$)/g, ".$1.$2.$3,$4");
    }

    elemento.value = valor;
}


function novoFormatarMoeda(a, e, r, t) {
    let n = ""
      , h = j = 0
      , u = tamanho2 = 0
      , l = ajd2 = ""
      , o = window.Event ? t.which : t.keyCode;
    if (13 == o || 8 == o)
        return !0;
    if (n = String.fromCharCode(o),
    -1 == "0123456789".indexOf(n))
        return !1;
    for (u = a.value.length,
    h = 0; h < u && ("0" == a.value.charAt(h) || a.value.charAt(h) == r); h++)
        ;
    for (l = ""; h < u; h++)
        -1 != "0123456789".indexOf(a.value.charAt(h)) && (l += a.value.charAt(h));
    if (l += n,
    0 == (u = l.length) && (a.value = ""),
    1 == u && (a.value = "0" + r + "0" + l),
    2 == u && (a.value = "0" + r + l),
    u > 2) {
        for (ajd2 = "",
        j = 0,
        h = u - 3; h >= 0; h--)
            3 == j && (ajd2 += e,
            j = 0),
            ajd2 += l.charAt(h),
            j++;
        for (a.value = "",
        tamanho2 = ajd2.length,
        h = tamanho2 - 1; h >= 0; h--)
            a.value += ajd2.charAt(h);
        a.value += r + l.substr(u - 2, u)
    }
    return !1
}
