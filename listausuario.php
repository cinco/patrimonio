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
<title>Lista de Usuários</title>
<link rel="stylesheet" type="text/css" href="estilo.css">
<meta charset="utf-8">
</head>

<body>
	<?php 

	include 'conexaobd.php';
	echo ('Você está logado com a conta: ' . $_SESSION['login']);

	$query = "SELECT codigo_usuario, nome_completo, cpf, matricula, login, tipo_usuario FROM cadastro_usuario WHERE cpf = '089.413.224-57'";
    $resultado = mysql_query($query, $conexao);

    if (mysql_num_rows($resultado)){
        while($escreve = mysql_fetch_array($resultado)){

            	echo $escreve['codigo_usuario'] . " " . $escreve['nome_completo'] . " " . $escreve['cpf'] . " " . $escreve['matricula'] . " " . $escreve['login'] . " " . $escreve['tipo_usuario'] . "<br>";
            }
        } else {
        	echo 'nenhum dado recebido!';
      	}
	?>
<div id = "arealistausuario">
	<p class = "listausuario">Buscar Usuário</p>
		<form method="post" action="validacaolistausu.php" name="formlistausuario" id="formlistausuario" >
	<p class = "formulariolistausuario">
		<br>
		Método de Busca:
		<br>
		<input type="radio" name="mtbusca" id="nome" value="nome">Nome</input>
		<input type="radio" name="mtbusca" id="cpf" value="cpf">CPF</input>
		<input type="radio" name="mtbusca" id="matricula" value="matricula">Matricula</input>
		<input type="text" name="dadobuscado" id="dadobuscado" />
		<input type="submit" value="Buscar"> 
		<br>
	</p>
</form>
</div>
<?php

echo '<table>';
    $query = "SELECT codigo_usuario, nome_completo, cpf, matricula, login, tipo_usuario FROM cadastro_usuario WHERE cpf = '089.413.224-56'";
    $resultado = mysql_query($query, $conexao);
    $linhas = mysql_num_rows($resultado);

        if ($linhas){

        	echo '<table>';
            while($escreve = mysql_fetch_array($resultado)){
        		
                $codigo = $escreve['codigo_usuario'];
                $nome = $escreve['nome_completo'];
                $cpf = $escreve['cpf'];
                $matricula = $escreve['matricula'];
                $login = $escreve['login'];
                $tipousuario = $escreve['tipo_usuario'];

                    if ($linhas %2 == 0){

                        $cor = "#F0F0F0";
                    }

                    else {

                    $cor = "#E2EFFE";

                    }

                echo "<tr bgcolor=\"$cor\"><td>&nbsp;$codigo</td><td>&nbsp;$nome</td><td>&nbsp;$cpf</td><td>&nbsp;$matricula</td><td>&nbsp;$login</td><td>&nbsp;$tipousuario</td>";
	           	//echo $escreve['codigo_usuario'] . " " . $escreve['nome_completo'] . " " . $escreve['cpf'] . " " . $escreve['matricula'] . " " . $escreve['login'] . " " . $escreve['tipo_usuario'] . "<br>";
     
            }
            echo '</table>';
        }

        else {
        	echo 'nenhum dado recebido!';
        }
?>
</body>
</html>