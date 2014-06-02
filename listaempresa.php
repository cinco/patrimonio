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
		<input type="radio" name="mtbusca" id="cnpj" value="cnpj">CPF</input>
		<input type="radio" name="mtbusca" id="matricula" value="matricula">Matricula</input>
        <input type="radio" name="mtbusca" id="todos" value="todos">Todos</input> </p>
        <p>Parâmetro de Busca:
		<input type="text" name="dadobuscado" id="dadobuscado" /></p>
		<input type="submit" value="Buscar"> 
		<br>
	</p>
</form>
<br>
<br>
<b>OBRSERVAÇÃO: </b>Para selecionar TODOS, não é necessário passar nenhum Parâmetro de busca!
<br>
<a href="index.php">Menu</a>
</div>
</body>
</html>