<?php
	//Iniciando a sessão
	session_start();
 
	//Caso o usuário não esteja autenticado, limpa os dados e redireciona para a pagina login.php
	if ( !isset($_SESSION['login']) and !isset($_SESSION['senha']) ) {
    
    session_destroy();
    unset ($_SESSION['login']);
    unset ($_SESSION['senha']);
    header('location:login.php');
}
?>

<html>

<head>
<title>Login</title>
<link rel="stylesheet" type="text/css" href="estilo.css">
<meta charset="utf-8">
</head>

<body>
<div id = "areacadastrousuario">
	<p class = "cadastrousuario">Cadastrar Novo Usuário</p>
		<form method="post" action="validacaocadastrousuario.php" name="formcadastrousuario" id="formcadastrousuario" >
	<p class = "formulariocadastrousuario">
		<br>
		<label>Nome Completo: </label>
		<input type="text" name="nomecompleto" id="nomecompleto" />
		<br>
		<br>
		<label>CPF: </label>
		<input type="text" name="cpf" id="cpf" />
		<br>
		<br>
		<label>Matricula: </label>
		<input type="text" name="matricula" id="matricula" />
		<br>
		<br>
		<label>Login: </label>
		<input type="text" name="login" id="login" />
		<br>
		<br>
		<label>Senha: </label>
		<input type="password" name="senha" id="senha" />
		<br>
		<br>
		<label>Confirmar Senha: </label>
		<input type="text" name="confirmarsenha" id="confirmarsenha" />
		<br>
		<br>
		<label>Tipo Usuário: </label>
		<input type="text" name="tipousuario" id="tipousuario" />
		<br>
		<br>
		<input type="reset" value="Limpar Campos" />
		<input type="submit" value="Cadastrar"/>
		<br>
	</p>
</div>
</body>

</html>