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
<title>Index</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="estilo.css">
</head>

<body>
<?php
    include'funcoes.php';
    boasvindas($_SESSION['login']);
?>

<a href="cadastro_usuario.php">Cadastro de Usuários!</a>

</html>