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
<title>Lista de Empresas</title>
<link rel="stylesheet" type="text/css" href="estilo.css">
<meta charset="utf-8">
</head>

<body>
	<?php 

	include 'conexaobd.php';
	echo ('Você está logado com a conta: ' . $_SESSION['login']);

	?>
<div id = "arealistausuario">
	<p class = "listausuario">Buscar Empresa: </p>
		<form method="post" action="validacaolistaemp.php" name="formlistaempresa" id="formlistaempresa" >
	<p class = "formulariolistaempresa">
		<p>Meio usado para realização de Busca:
        <input type="radio" name="mtbusca" id="razaosocial" value="razaosocial">Razão Social</input>
		<input type="radio" name="mtbusca" id="cnpj" value="cnpj">CNPJ</input>
        <input type="radio" name="mtbusca" id="todas" value="todas">Todas</input> </p>
        <p>Parâmetro de Busca:
		<input type="text" name="dadobuscado" id="dadobuscado" /></p>
		<input type="submit" value="Buscar"> 
		<br>
	</p>
</form>
<br>
<br>
<b>OBRSERVAÇÃO: </b>Para selecionar TODAS, não é necessário passar nenhum Parâmetro de busca!
<br>
<a href="index.php">Menu</a>
</div>
</body>
</html>