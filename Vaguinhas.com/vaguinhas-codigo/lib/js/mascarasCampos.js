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
	return v
}


function cpf_mask(v){
	v=v.replace(/\D/g,"")
	v=v.replace(/(\d{3})(\d)/,"$1.$2")
	v=v.replace(/(\d{3})(\d)/,"$1.$2")
	v=v.replace(/(\d{3})(\d)/,"$1-$2")
	return v
}

function tel_mask(v){
	v=v.replace(/\D/g,"")
	v=v.replace(/(\d{2})(\d)/,"($1) $2")
	v=v.replace(/(\d{4})(\d)/,"$1-$2")

    return v
}

function cel_mask(v){
	v=v.replace(/\D/g,"")
	v=v.replace(/(\d{2})(\d)/,"($1) $2")
	v=v.replace(/(\d{5})(\d)/,"$1-$2")

    return v
}

function tempo_mask(v){
	v=v.replace(/\D/g,"")
    return v
}