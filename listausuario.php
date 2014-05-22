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
<title>Lista de Usuários</title>
<link rel="stylesheet" type="text/css" href="estilo.css">
<meta charset="utf-8">
</head>

<body>
	<?php 

	echo ('Você está logado com a conta: ' . $_SESSION['login']);

	?>
<div id = "arealistausuario">
	<p class = "listausuario">Buscar Usuário</p>
		<form method="post" action="validacaolistausu.php" name="formlistausuario" id="formlistausuario" >
	<p class = "formulariolistausuario">
		<br>
		Método de Busca:
		<br>
		<input type="radio" name="mtbusca" id="nome" value="nome">Nome</input>
		<input type="radio" name="mtbusca" id="cpf" value="cpf">CPF</input>
		<input type="radio" name="mtbusca" id="matricula" value="matricula">Matricula</input>
		<input type="text" name="dadobuscado" id="dadobuscado" />
		<input type="submit" value="Buscar"> 
		<br>
	</p>
</form>
</div>
</body>
</html>