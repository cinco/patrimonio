<?php
	//Iniciando a sessão
	session_start();
 
	//Caso o usuário não esteja autenticado, limpa os dados e redireciona para a pagina login.php
	if (!isset($_SESSION['login']) and !isset($_SESSION['senha']) ) {
    
    session_destroy();
    unset ($_SESSION['login']);
    unset ($_SESSION['senha']);
    header('location:login.php');
}

?>

<?php
	
	include 'conexaobd.php';
	echo ('Você está logado com a conta: ' . $_SESSION['login']);

	//Variáveis recebendo os valores inseridos em cadastrousuario.php

	$nome = $_POST['nomecompleto'];
	$cpf = $_POST['cpf'];
	$matricula = $_POST['matricula'];
	$login = $_POST['login'];
	$senha = $_POST['senha'];
	$confirmacaosenha = $_POST['confirmarsenha'];
	$tipousuario = $_POST['tipousuario'];
	$codigoempresa = $_POST['codigoempresa'];
	

	//Inserindo dados no novo usuário no banco de dados
	$queryinsert = "UPDATE cadastro_usuario SET nome_completo = '$nome', cpf = '$cpf', matricula = '$matricula', login = '$login', senha = '$senha', confirmar_senha = '$confirmacaosenha', tipo_usuario = '$tipousuario' WHERE 1";
	
	mysql_query($queryinsert, $conexao) or die (mysql_error());

	echo ('Cadastro Realizado com sucesso!');
	mysql_close($conexao);
?>