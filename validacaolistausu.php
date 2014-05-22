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
	
	//Incluindo arquivo conexaobd.php
	include 'conexaobd.php';
	echo ('Você está logado com a conta: ' . $_SESSION['login']);
	
	//Variável recebendo o valore inserido em listausuario.php
	$resultadometbusca = $_POST['mtbusca'];
	
	//Verificando o tipo de busca
	if ($resultadometbusca == "nome"){
		$buscapornome = "SELECT codigo_usuario, nome_completo, cpf, matricula, login, tipo_usuario WHERE nome_completo = '$resultadometbusca'";
		$resultado = mysql_query($buscapornome, $conexao);
		echo var_dump($resultado);

	} elseif ($resultadometbusca == "cpf"){
		$buscaporcpf = "SELECT codigo_usuario, nome_completo, cpf, matricula, login, tipo_usuario WHERE cpf = '$resultadometbusca'";
		$resultado1 = mysql_query($buscaporcpf, $conexao);
		echo var_dump($resultado1);

	} elseif ($resultadometbusca == "matricula") {
		$buscapormatricula = "SELECT codigo_usuario, nome_completo, cpf, matricula, login, tipo_usuario WHERE matricula = '$resultadometbusca'";
		$resultado2 = mysql_query($buscapormatricula, $conexao);
		echo var_dump($resultado);
	}



	echo $dadobusca;

	//Inserindo dados no novo usuário no banco de dados
	//$queryinsert = "INSERT INTO cadastro_usuario (nome_completo, cpf, matricula, login, senha, 
	//	confirmar_senha, tipo_usuario, fk_codigo_empresa) VALUES ('$nome', '$cpf', '$matricula', '$login', '$senha',
	//	'$confirmacaosenha', '$tipousuario', '$codigoempresa')";
	
	//mysql_query($queryinsert, $conexao) or die ('Erro no cadastro!');

//	echo ('Cadastro Realizado com sucesso!');
//	mysql_close($conexao);
?>