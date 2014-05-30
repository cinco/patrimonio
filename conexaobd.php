<?php

	//Realizando conexão MySQL
	$servidor = '127.0.0.1';
	$loginsgbd = 'root';
	$senhasgbd = 'Aqfeadp1123581321';
	$basededados = 'patrimonio';
	$conexao = mysql_connect($servidor, $loginsgbd, $senhasgbd) or die ('Erro na conexão com o servidor!');

	//Selecionando o a Base de Dados
	$selecionabasedados = mysql_select_db($basededados, $conexao) or die ('Banco de dados inexistente!');

	/*Funcão para realizar a busca no banco, de acordo com a seleção feita pelo usuário. E, retorna
	
	
    function modoselecaousuario($filtrobuscausuario, $dadofornecido){

    if ($filtrobuscausuario == "nome"){
    
    echo '<table>';
    $query = "SELECT codigo_usuario, nome_completo, cpf, matricula, login, tipo_usuario FROM cadastro_usuario WHERE nome = '$dadofornecido'";
    $resultado = mysql_query($query, $conexao);
    $linhas = mysql_num_rows($resultado);

        if ($linhas){
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
        }

        echo '</table>';
        else {
        	echo 'nenhum dado recebido!';
        }
    }

        if ($filtrobuscausuario == "cpf"){
            $query = "SELECT codigo_usuario, nome_completo, cpf, matricula, login, tipo_usuario FROM cadastro_usuario WHERE cpf = '$dadofornecido'";
            
        }

        if ($filtrobuscausuario == "matricula"){
            $query = "SELECT codigo_usuario, nome_completo, cpf, matricula, login, tipo_usuario FROM cadastro_usuario WHERE matricula = '$dadofornecido'";
            
        }
    }
    */
?>