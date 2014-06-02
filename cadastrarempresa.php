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
<title>Cadastro de Empresa</title>
<link rel="stylesheet" type="text/css" href="estilo.css" />
<link rel="stylesheet" type="text/javascript" href="validacoes.js" />
<meta charset="utf-8">
</head>

<body>
	<?php 

	echo ('Você está logado com a conta: ' . $_SESSION['login']);
	echo ('<br>');
	?>
<div id = "areacadastroempresa">
	<p class = "cadastroempresa">Cadastrar Nova Empresa</p>
		<form method="post" action="validacaocadempresa.php" name="formcadastroempresa" id="formcadastroempresa" >
	<p class = "formulariocadastroempresa">
		<br>
	<table>
	<tr>
		<td><label>Razão Social: </label>
			<input type="text" name="razaosocial" id="razaosocial" /></td>
		<td><label>CNPJ: </label>
			<input type="text" name="cnpj" id="cnpj" /></td>
		<td><label>Número: </label>
			<input type="text" name="numero" id="numero" /></td>
	</tr>
	<tr>
		<td><label>Rua: </label>
			<input type="text" name="rua" id="rua" /></td>
		<td><label>Bairro: </label>
			<input type="text" name="bairro" id="bairro" /></td>
		<td><label>Cidade: </label>
			<input type="text" name="cidade" id="cidade" /></td>
	</tr>
	<tr>
		<td><label>Estado: </label>
			<input type="text" name="estado" id="estado" /></td>
		<td><label>Latitude: </label>
			<input type="text" name="latitude" id="latitude" /></td>
		<td><label>Longitude: </label>
			<input type="text" name="longitude" id="longitude" /></td>
	</tr>
	<tr>
		<td><label>Empresa é Cliente?</label>
			<input type="radio" name="tipoempresa" id="tipoempresa" value="0"> Sim </input>
			<input type="radio" name="tipoempresa" id="tipoempresa" value="1"> Não </input>
		</td>
		<td><label>Responsável Legal</label>
			<input type="text" name="responsavelempresa" id="responsavelempresa" /></td>
		<td><input type="reset" value="Limpar Campos" /> <input type="submit" value="Cadastrar"/></td>
	</tr>
	</table>
		<br>
		<br>
		<a href="index.php">Menu</a>
	</p>
</form>
</div>

</body>
</html>