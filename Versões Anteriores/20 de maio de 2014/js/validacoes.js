function validarlogin(){
	
<script language="javascript" type="text/javascript">
function validarlogin(){
	
	var login = formlogin.login.value;
	var senha = formlogin.senha.value;

	if(login == ""){
		alert("Preencha o campo Login!");
		formlogin.login.focus();
		return false;
	}

	if(login.length < 6) {
		alert("Login deve ter 6 caracteres!");
		formlogin.login.focus();
		return false;
	}

	if(senha == "") {
		alert("Preencha o campo Senha!");
		formlogin.senha.focus();
		return false;

	]

	if(senha.length < 6){
		alert("Senha deve ter 6 caracteres!");
		formlogin.senha.focus();
		return false;
	}
}
</script>
	}
}