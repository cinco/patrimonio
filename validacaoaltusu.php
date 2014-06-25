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
	<title>Alteração de Usuário</title>
	<meta charset='utf-8'>
	</head>
	<body>
<?php
	
	include 'conexaobd.php';
	echo ('Você está logado com a conta: ' . $_SESSION['login']);
	echo '<br>';
	echo '<br>';

	//Variáveis recebendo os valores inseridos em cadastrousuario.php
	$nome = $_POST['nomecompleto'];
	$cpf = $_POST['cpf'];
	$matricula = $_POST['matricula'];
	$login = $_POST['login'];
	$senha = $_POST['senha'];
	$confirmacaosenha = $_POST['confirmarsenha'];
	$tipousuario = $_POST['tipousuario'];
	$codigoempresa = $_POST['codigoempresa'];
	$codigousu = $_POST['codigousuario'];
	

	//Inserindo dados no novo usuário no banco de dados
	$queryinsert = "UPDATE cadastro_usuario SET nome_completo = '$nome', cpf = '$cpf', matricula = '$matricula', login = '$login', senha = '$senha', confirmar_senha = '$confirmacaosenha', tipo_usuario = '$tipousuario' WHERE codigo_usuario = '$codigousu'";
	
	mysql_query($queryinsert, $conexao) or die (mysql_error());

	echo ('Alteração realizada com sucesso!');
	mysql_close($conexao);
	echo '<br>';
    echo '<a href="listausuario.php">Realizar outra busca</a>';
    echo '<br>';
    echo '<a href="index.php">Menu</a>';
?>
</body>
</html>