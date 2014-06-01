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
	<title>Resultado da Busca</title>
	<meta charset="utf-8">
</head>
<body>
<?php

	//Incluindo arquivo conexaobd.php
	include 'conexaobd.php';
	
	$metododebusca = $_POST['mtbusca'];
	$dadoparabusca = $_POST['dadobuscado'];
	
    //Variável de Sessão para armazenar método e informação para busca
    $_SESSION['metbusca'] = $metododebusca;
    $_SESSION['infobusca'] = $dadoparabusca;

	echo ('Você está logado com a conta: ' . $_SESSION['login']);
	echo '<br><br>';
if 	($dadoparabusca != ""){
	if ($metododebusca == "nome"){

	echo 'Filtro usado na busca: ' . $dadoparabusca;
	echo '<table>';
    $query = "SELECT * FROM cadastro_usuario WHERE nome_completo = '$dadoparabusca'";
    //$query = "SELECT codigo_usuario, nome_completo, cpf, matricula, login, tipo_usuario FROM cadastro_usuario WHERE cpf = '089.413.224-56'";
    $resultado = mysql_query($query, $conexao);
    $linhas = mysql_num_rows($resultado);

        if ($linhas){

        	echo '<table>';
            $cor = "#90EE90";
            echo "<tr bgcolor=\"$cor\"><td>Código</td><td>Nome</td><td>CPF</td><td>Matricula</td><td>Login</td><td>Tipo do Usuário</td>";

            while($escreve = mysql_fetch_array($resultado)){
        		
                $codigo = $escreve['codigo_usuario'];
                $nome = $escreve['nome_completo'];
                $cpf = $escreve['cpf'];
                $matricula = $escreve['matricula'];
                $login = $escreve['login'];
                $tipousuario = $escreve['tipo_usuario'];
                $_SESSION['tipousu'] = $tipousuario;

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
            echo '<br>';
            echo '<a href="alterarusuario.php">Alterar Usuário!</a>';
            echo '<br>';
            echo '<a href="listausuario.php">Voltar</a>';
        
        }

        else {

        	echo 'nenhum dado recebido!';

        }
    }

  	if ($metododebusca == "cpf"){
	
	echo 'Filtro usado na busca: ' . $dadoparabusca;
	echo '<table>';
    $query = "SELECT * FROM cadastro_usuario WHERE cpf = '$dadoparabusca'";
    $resultado = mysql_query($query, $conexao);
    $linhas = mysql_num_rows($resultado);

        if ($linhas){

        	echo '<table>';
            $cor = "#90EE90";
            echo "<tr bgcolor=\"$cor\"><td>Código</td><td>Nome</td><td>CPF</td><td>Matricula</td><td>Login</td><td>Tipo do Usuário</td>";

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
     
            }
            
            echo '</table>';
            echo '<br>';
            echo '<a href="alterarusuario.php">Alterar Usuário!</a>';
            echo '<br>';
            echo '<a href="listausuario.php">Voltar</a>';

        }

        else {

        	echo 'nenhum dado recebido!';

        }

    }

    if ($metododebusca == "matricula"){
	
   	echo 'Filtro usado na busca: ' . $dadoparabusca;
	echo '<table>';
    $query = "SELECT * FROM cadastro_usuario WHERE matricula = '$dadoparabusca'";
    $resultado = mysql_query($query, $conexao);
    $linhas = mysql_num_rows($resultado);

        if ($linhas){

        	echo '<table>';
            $cor = "#90EE90";
            echo "<tr bgcolor=\"$cor\"><td>Código</td><td>Nome</td><td>CPF</td><td>Matricula</td><td>Login</td><td>Tipo do Usuário</td>";
            
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
     
            }

            echo '</table>';
            echo '<br>';
            echo '<a href="alterarusuario.php">Alterar Usuário!</a>';
            echo '<br>';
            echo '<a href="listausuario.php">Voltar</a>';

        }

        else {

        	echo 'nenhum dado recebido!';

        }

    }

}	elseif ($metododebusca == "todos"){
	
   	echo 'Filtro usado na busca = Todos';
	echo '<table>';
    $query = "SELECT * FROM cadastro_usuario";
    $resultado = mysql_query($query, $conexao);
    $linhas = mysql_num_rows($resultado);

        if ($linhas){

        	echo '<table>';
        	$cor = "#90EE90";
            echo "<tr bgcolor=\"$cor\"><td>Código</td><td>Nome</td><td>CPF</td><td>Matricula</td><td>Login</td><td>Tipo do Usuário</td>";

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
     
            }

            echo '</table>';
            echo '<br>';
            echo '<a href="listausuario.php">Voltar</a>';

        }

        else {

        	echo 'nenhum dado recebido!';

        }

    }

    else {

    	echo 'Nenhum dado fornecido para busca!';
    }

?>

</body>
</html>