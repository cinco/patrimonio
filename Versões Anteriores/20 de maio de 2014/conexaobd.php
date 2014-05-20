<?php

	//Realizando conexão MySQL
	$servidor = '127.0.0.1';
	$nomeusuariobase = 'root';
	$senhabase = 'Aqfeadp1123581321';
	$basededados = 'patrimonio';
	$conexao = mysql_connect($servidor, $nomeusuariobase, $senhabase) or die ('Erro na conexão com o servidor!');

	//Selecionando o a Base de Dados
	$selecionabasedados = mysql_select_db($basededados, $conexao) or die ('Banco de dados inexistente!');
	
?>