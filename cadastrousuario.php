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
<title>Cadastro de Usuário</title>
<link rel="stylesheet" type="text/css" href="estilo.css">
<meta charset="utf-8">
</head>

<body>
<div id = "areacadastrousuario">
	<p class = "cadastrousuario">Cadastrar Novo Usuário</p>
		<form method="post" action="validacadusu.php" name="formcadastrousuario" id="formcadastrousuario" >
	<p class = "formulariocadastrousuario">
		<br>
	<table>
	<tr>
		<td><label>Nome Completo: </label>
			<input type="text" name="nomecompleto" id="nomecompleto" /></td>
		<td><label>CPF: </label>
			<input type="text" name="cpf" id="cpf" /></td>
	</tr>
	<tr>
		<td><label>Matricula: </label>
			<input type="text" name="matricula" id="matricula" /></td>
		<td><label>Login: </label>
			<input type="text" name="login" id="login" /></td>
	</tr>
	<tr>
		<td><label>Senha: </label>
			<input type="password" name="senha" id="senha" /></td>
		<td><label>Confirmar Senha: </label>
			<input type="password" name="confirmarsenha" id="confirmarsenha" /></td>
	</tr>
	<tr>
		<td><label>Tipo Usuário: </label>
			<input type="text" name="tipousuario" id="tipousuario" /></td>
		<td><label>Código da Empresa: </label>
			<input type="text" name="codigoempresa" id="codigoempresa" /></td>
	</tr>
	<tr>
		<td><input type="reset" value="Limpar Campos" /></td>
		<td><input type="submit" value="Cadastrar"/></td>
	</tr>
	</table>
		<br>
	</p>
</div>
</body>

</html>