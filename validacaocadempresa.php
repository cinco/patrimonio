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
<html>
<head>
	<title>Validação de Cadastro de Empresa</title>
	<meta charset="utf-8">

<?php
	
	include 'conexaobd.php';
	echo ('Você está logado com a conta: ' . $_SESSION['login']);
	echo '<br>';

	//Variáveis recebendo os valores inseridos em cadastrousuario.php
	$razaosocial = $_POST['razaosocial'];
	$cnpj = $_POST['cnpj'];
	$numero = $_POST['numero'];
	$rua = $_POST['rua'];
	$bairro = $_POST['bairro'];
	$cidade = $_POST['cidade'];
	$estado = $_POST['estado'];
	$latitude = $_POST['latitude'];
	$longitude = $_POST['longitude'];
	$tipo = $_POST['tipoempresa'];
	$responsavel = $_POST['responsavelempresa'];


	//Inserindo dados no novo usuário no banco de dados
	$queryinsert = "INSERT INTO cadastro_empresa (razao_social, cnpj, numero, rua, bairro, cidade, estado, latitude, longitude, tipo, responsavel) VALUES ('$razaosocial', '$cnpj', '$numero', '$rua', '$bairro', '$cidade', '$estado', '$latitude', '$longitude', '$tipo', '$responsavel')";
	
	mysql_query($queryinsert, $conexao) or die (mysql_error());

	echo ('Cadastro Realizado com sucesso!');
	mysql_close($conexao);

	echo '<br>';
    echo '<a href="cadastrarempresa.php">Cadastrar outra?</a>';
    echo '<br>';
    echo '<a href="index.php">Menu</a>';
?>