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
	<title>Resultado da Busca</title>
	<meta charset="utf-8" />
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
    
	if ($metododebusca == "razaosocial"){

	echo 'Filtro usado na busca: ' . $dadoparabusca;
	echo '<table>';
    $query = "SELECT * FROM cadastro_empresa WHERE razao_social = '$dadoparabusca'";
    $resultado = mysql_query($query, $conexao) or die (mysql_error());
    $linhas = mysql_num_rows($resultado);

        if ($linhas){

        	echo '<table>';
            $cor = "#90EE90";
            echo "<tr bgcolor=\"$cor\"><td>Código</td><td>Razão Social</td><td>CNPJ</td><td>Número</td><td>Rua</td><td>Bairro</td><td>Cidade</td><td>Estado</td><td>Latitude</td><td>Longitude</td><td>Tipo</td><td>Responsável</td></tr>";

            while($escreve = mysql_fetch_array($resultado)){
        		
                $codigo = $escreve['codigo_empresa'];
                $nome = $escreve['razao_social'];
                $cnpj = $escreve['cnpj'];
                $numero = $escreve['numero'];
                $rua = $escreve['rua'];
                $bairro = $escreve['bairro'];
                $cidade = $escreve['cidade'];
                $estado = $escreve['estado'];
                $latitude = $escreve['latitude'];
                $longitude = $escreve['longitude'];
                $tipo = $escreve['tipo'];
                $responsavel = $escreve['responsavel'];

                    if ($linhas %2 == 0){

                        $cor = "#F0F0F0";
                    }

                    else {

                    $cor = "#E2EFFE";

                    }

                echo "<tr bgcolor=\"$cor\"><td>&nbsp;$codigo</td><td>&nbsp;$nome</td><td>&nbsp;$cnpj</td><td>&nbsp;$numero</td><td>&nbsp;$rua</td><td>&nbsp;$bairro</td><td>&nbsp;$cidade</td><td>&nbsp;$estado</td><td>&nbsp;$latitude</td><td>&nbsp;$longitude</td><td>&nbsp;$tipo</td><td>&nbsp;$responsavel</td></tr>";

            }
            
            echo '</table>';
            echo '<br>';
            echo '<a href="alterarempresa.php">Alterar Empresa!</a>';
            echo '<br>';
            //echo '<a href="excluirusuario.php">Excluir Usuário!</a>';
            echo '<br>';
            echo '<a href="listaempresa.php">Voltar</a>';
            mysql_close($conexao);
        
        }

        else {

        	echo 'nenhum dado recebido!';
            mysql_close($conexao);

        }
    }

  	if ($metododebusca == "cnpj"){
	
	echo 'Filtro usado na busca: ' . $dadoparabusca;
	echo '<table>';
    $query = "SELECT * FROM cadastro_empresa WHERE cnpj = '$dadoparabusca'";
    $resultado = mysql_query($query, $conexao) or die (mysql_error());
    $linhas = mysql_num_rows($resultado);

        if ($linhas){

            echo '<table>';
            $cor = "#90EE90";
            echo "<tr bgcolor=\"$cor\"><td>Código</td><td>Razão Social</td><td>CNPJ</td><td>Número</td><td>Rua</td><td>Bairro</td><td>Cidade</td><td>Estado</td><td>Latitude</td><td>Longitude</td><td>Tipo</td><td>Responsável</td></tr>";

            while($escreve = mysql_fetch_array($resultado)){
                
                $codigo = $escreve['codigo_empresa'];
                $nome = $escreve['razao_social'];
                $cnpj = $escreve['cnpj'];
                $numero = $escreve['numero'];
                $rua = $escreve['rua'];
                $bairro = $escreve['bairro'];
                $cidade = $escreve['cidade'];
                $estado = $escreve['estado'];
                $latitude = $escreve['latitude'];
                $longitude = $escreve['longitude'];
                $tipo = $escreve['tipo'];
                $responsavel = $escreve['responsavel'];

                    if ($linhas %2 == 0){

                        $cor = "#F0F0F0";
                    }

                    else {

                    $cor = "#E2EFFE";

                    }

                echo "<tr bgcolor=\"$cor\"><td>&nbsp;$codigo</td><td>&nbsp;$nome</td><td>&nbsp;$cnpj</td><td>&nbsp;$numero</td><td>&nbsp;$rua</td><td>&nbsp;$bairro</td><td>&nbsp;$cidade</td><td>&nbsp;$estado</td><td>&nbsp;$latitude</td><td>&nbsp;$longitude</td><td>&nbsp;$tipo</td><td>&nbsp;$responsavel</td></tr>";

            }
            
            echo '</table>';
            echo '<br>';
            echo '<a href="alterarempresa.php">Alterar Empresa!</a>';
            echo '<br>';
            //echo '<a href="excluirusuario.php">Excluir Usuário!</a>';
            echo '<br>';
            echo '<a href="listaempresa.php">Voltar</a>';
            mysql_close($conexao);
        
        }

        else {

            echo 'nenhum dado recebido!';
            mysql_close($conexao);

        }
    }
    
}	elseif ($metododebusca == "todas"){
	
   	echo 'Filtro usado na busca: Todas';
	echo '<table>';
    $query = "SELECT * FROM cadastro_empresa";
    $resultado = mysql_query($query, $conexao) or die (mysql_error());
    $linhas = mysql_num_rows($resultado);

        if ($linhas){

            echo '<table>';
            $cor = "#90EE90";
            echo "<tr bgcolor=\"$cor\"><td>Código</td><td>Razão Social</td><td>CNPJ</td><td>Número</td><td>Rua</td><td>Bairro</td><td>Cidade</td><td>Estado</td><td>Latitude</td><td>Longitude</td><td>Tipo</td><td>Responsável</td></tr>";

            while($escreve = mysql_fetch_array($resultado)){
                
                $codigo = $escreve['codigo_empresa'];
                $nome = $escreve['razao_social'];
                $cnpj = $escreve['cnpj'];
                $numero = $escreve['numero'];
                $rua = $escreve['rua'];
                $bairro = $escreve['bairro'];
                $cidade = $escreve['cidade'];
                $estado = $escreve['estado'];
                $latitude = $escreve['latitude'];
                $longitude = $escreve['longitude'];
                $tipo = $escreve['tipo'];
                $responsavel = $escreve['responsavel'];

                    if ($linhas %2 == 0){

                        $cor = "#F0F0F0";
                    }

                    else {

                    $cor = "#E2EFFE";

                    }

                echo "<tr bgcolor=\"$cor\"><td>&nbsp;$codigo</td><td>&nbsp;$nome</td><td>&nbsp;$cnpj</td><td>&nbsp;$numero</td><td>&nbsp;$rua</td><td>&nbsp;$bairro</td><td>&nbsp;$cidade</td><td>&nbsp;$estado</td><td>&nbsp;$latitude</td><td>&nbsp;$longitude</td><td>&nbsp;$tipo</td><td>&nbsp;$responsavel</td></tr>";

            }
            
            echo '</table>';
            echo '<br>';
            echo '<br>';
            echo '<a href="listaempresa.php">Voltar</a>';
            mysql_close($conexao);
        
        }

        else {

            echo 'nenhum dado recebido!';
            mysql_close($conexao);

        }
    }

    else {

    	echo 'Nenhum dado fornecido para busca!';
        echo '<br>';
        echo '<a href="listausuario.php">Voltar</a>';
        mysql_close($conexao);
    }

?>

</body>
</html>