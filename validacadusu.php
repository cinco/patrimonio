	<?php
		//Iniciando a sessão
		session_start();
	 
	 	//Acessando variaveis do arquivo conexaobd.php
		include 'conexaobd.php';
		include 'funcoes.php';

		//Caso o usuário não esteja autenticado, limpa os dados e redireciona para a pagina login.php
	if ( !isset($_SESSION['login']) and !isset($_SESSION['senha']) ) {
	    session_destroy();
	    unset ($_SESSION['login']);
	    unset ($_SESSION['senha']);
	    header('location:login.php');

	} else {

		//Variáveis recebendo os dados inserios em cadastrousuario.php
		$nomecompleto = $_POST['nomecompleto'];
		$cpf = $_POST['cpf'];
		$matricula = $_POST['matricula'];
		$login = $_POST['login'];
		$senha = $_POST['senha'];
		$confirmarsenha = $_POST['confirmarsenha'];
		$tipousuario = $_POST['tipousuario'];
		$fkcodigoempresa = $_POST['codigoempresa'];
		/* $query = "INSERT INTO `clientes` ( `nome` , `email` , `sexo` , `ddd` , `telefone` , `endereço` , `cidade` , `estado` , `bairro` , `país` , `login` , `senha` , `news` , `id` ) 
		VALUES ('$nome', '$email', '$sexo', '$ddd', '$tel', '$endereco', '$cidade', '$estado', '$bairro', '$pais', '$login', '$senha', '$news', '')";
		mysql_query($query,$conexao); */
		//instrução SQL para inserção no banco de dados - tabela: cadastro_usuario
		$inserirdados = "INSERT INTO 'cadastro_usuario' ('nome_completo', 'cpf', 'matricula', 'login', 'senha', 
		'confirmar_senha', 'tipo_usuario') VALUES ('$nomecompleto', '$cpf', '$matricula', '$login', 
		'$senha', '$confirmarsenha', '$tipousuario') WHERE 'fk_codigo_empresa' = '$fkcodigoempresa'";
		$resultadoinsert = mysql_query($inserirdados, $conexao) or die ('Erro com a seleção da tabela');

		mysql_close($conexao);
	}
		//Caso consiga realizar o cadastro, um alerta javascript será mostrado informando a confirmação do cadastro
		if(mysql_num_rows($resultadoinsert) > 0){

			usuariocadastrado($nomecompleto);
			header('location:cadastrousuario.php');

		}

		//Caso não consiga, exibe um alerta javacript informando ao usuário
		else {
			
			header('location:index.php');
		}

	?>