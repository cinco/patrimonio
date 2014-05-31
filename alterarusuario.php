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
<title>Alterar Usuário</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="estilo.css">
</head>

<body> 

<?php
    
    echo ('Você está logado com a conta: ' . $_SESSION['login']); 
    echo '<br>';
    
?>
<br>
<br>
<a href="cadastrousuario.php">Cadastro de Usuários!</a>
<a href="listausuario.php">Listar Usuários!</a>
</body>
</html>