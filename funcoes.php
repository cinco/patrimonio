<?php
	/* 
    Obs: Funções para exibição de alerta javascript segue com esse padrão de 
    nomeclatura das variaveis (msg + codigo + (nome ou abreviatura)da função)
    Obs:
	 */
    include 'conexaobd.php';

	function boasvindas($logado) {
		$msgboasvindas = 'Seja bem vindo ';
        echo '<script type="text/javascript">alert("' . $msgboasvindas . $logado . '"); </script>';
    }

    function usuariocadastrado($cadastrado) {
		$msgpre = 'Usuário ';
		$msgpos = 'Cadastrado com Sucesso!';
        echo '<script type="text/javascript">alert("' . $msgpre . $cadastrado . $msgpos . '"); </script>';
    }
	
    function boasvindasfail($naologado) {
		$msgprebvf = 'Dados incorretos!';
        echo '<script type="text/javascript">alert("' . $msgprebvf . '"); </script>';
    }

    function sair(){
    session_destroy();
    unset ($_SESSION['login']);
    unset ($_SESSION['senha']);
    header('location:login.php');
    }
?>