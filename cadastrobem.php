<?php
	//Iniciando a sessão
	session_start();
 
	//Caso o usuário não esteja autenticado, limpa os dados e redireciona para a pagina login.php
	if (!isset($_SESSION['login'])) {
    
    session_destroy();
    unset ($_SESSION['login']);
    header('location:login.php');
}
?>

<html>
<head>
<title>Cadastro de Bens</title>
<link rel="stylesheet" type="text/css" href="estilo.css" />
<link rel="stylesheet" type="text/javascript" href="validacoes.js" />
<meta charset="utf-8">
</head>

<body>
	<?php 

	echo ('Você está logado com a conta: ' . $_SESSION['login']);
	echo ('<br>');
	?>
<div id = "areacadastrobem">
	<p class = "cadastrobem">Cadastrar Nova Empresa</p>
		<form method="post" action="validacaocadbem.php" name="formcadastrobem" id="formcadastrobem" >
	<p class = "formulariocadastrobem">
		<br>
	<table>
	<tr>
		<td><label>Descrição: </label>
			<input type="text" name="descricao" id="descricao" /></td>
		<td><label>Valor Nominal: </label>
			<input type="text" name="valornominal" id="valornominal" /></td>
		<td><label>Taxa Depreciação: </label>
			<input type="text" name="taxadepreciacao" id="taxadepreciacao" /></td>
	</tr>
	<tr>
		<td><label>Código Localização Atual:</label>
			<input type="text" name="codlocatual" id="codlocatual" /></td>
		<td><label>Código Localização Anterior:</label>
			<input type="text" name="codlocanterior" id="codlocanterior" /></td>
		<td><label>Data de Entrada:</label>
			<input type="date" name="data" id="data" /></td>
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