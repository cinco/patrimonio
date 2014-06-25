<?php ob_start();

	function validarlogin(){
	//Acessando variaveis do arquivo conexaobd.php e funcoes.php
	include 'conexaobd.php';
	include 'funcoes.php';

	//Variáveis recebendo os dados inserios em login.php
	$login = $_POST['login'];
	$senha = $_POST['senha'];

	//Buscando se o usuário está cadastrado no banco de dados
	$busca = "SELECT * FROM cadastro_usuario WHERE login = '$login' AND senha = '$senha'";
	$resultado = mysql_query($busca, $conexao) or die ('Erro na seleção da tabela!');

	/* 
	Caso consiga realizar o login: 
	Cria/inicia a sessão e redireciona para index.php 
	*/
	
	if (mysql_num_rows($resultado) > 0) {

		session_start();
		$_SESSION['login'] = $login;
		$_SESSION['senha'] = $senha;
		$_SESSION['count'] = 1;
		mysql_close($conexao);
		header('location:index.php');
		boasvindas($_SESSION['login']);
		
		}

	/*
	Caso não consiga realizar o login, destói a sessão, 
	limpa os dados e redireciona para a pagina login.php
	*/

	else {

		session_destroy();
		unset($_SESSION['login']);
		unset($_SESSION['senha']);
		unset($_SESSION['count']);
		mysql_close($conexao);
		header('location:login.php');
	}

}
?>