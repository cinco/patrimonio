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
<title>Lista de Usuários</title>
<link rel="stylesheet" type="text/css" href="estilo.css">
<meta charset="utf-8">
</head>

<body>
	<?php 

	include 'conexaobd.php';
	echo ('Você está logado com a conta: ' . $_SESSION['login']);

	?>
<div id = "arealistausuario">
	<p class = "listausuario">Buscar Usuário</p>
		<form method="post" action="validacaolistausu.php" name="formlistausuario" id="formlistausuario" >
	<p class = "formulariolistausuario">
		<p>Meio para realização de Busca:
        <input type="radio" name="mtbusca" id="nome" value="nome">Nome</input>
		<input type="radio" name="mtbusca" id="cpf" value="cpf">CPF</input>
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