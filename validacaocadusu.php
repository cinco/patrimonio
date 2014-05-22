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
	$queryinsert = "INSERT INTO cadastro_usuario (nome_completo, cpf, matricula, login, senha, 
		confirmar_senha, tipo_usuario, fk_codigo_empresa) VALUES ('$nome', '$cpf', '$matricula', '$login', '$senha',
		'$confirmacaosenha', '$tipousuario', '$codigoempresa')";
	
	mysql_query($queryinsert, $conexao) or die ('Erro no cadastro!');

	echo ('Cadastro Realizado com sucesso!');
	mysql_close($conexao);
?>