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
<title>Excluir Usuário</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>

    <?php 

    include 'conexaobd.php';
    

    echo ('Você está logado com a conta: ' . $_SESSION['login']);
    echo ('<br>');
?>


<div id = "areaexclusaousuario">
    <p class = "exclusaousuario">Alterar Usuário</p>
        <form method="post" action="validacaodelusu.php" name="formexclusaousuario" id="formexclusaousuario" >
    <p class = "formularioexclusaousuario">
        <br>
    <table>

        <?php

    $metbusca = $_SESSION['metbusca'];
    $infobusca = $_SESSION['infobusca'];

    if ($metbusca == "nome"){

        $query = "SELECT nome_completo, cpf, matricula, login, senha, confirmar_senha, tipo_usuario, razao_social FROM cadastro_usuario INNER JOIN cadsatro_empresa WHERE nome_completo = '$infobusca'";
        $resultado = mysql_query($query, $conexao);
        
        while($escreve = mysql_fetch_array($resultado)){

            $nome = $escreve['nome_completo'];
            $cpf = $escreve['cpf'];
            $matricula = $escreve['matricula'];
            $login = $escreve['login'];
            $senha = $escreve['senha'];
            $confsenha = $escreve['confirmar_senha'];
            $tpusuario = $escreve['tipo_usuario'];
            $fkcodemp = $escreve['razao_social'];	

        }

        

    }else if ($metbusca == "cpf"){

        $query = "SELECT nome_completo, cpf, matricula, login, senha, confirmar_senha, tipo_usuario, razao_social FROM cadastro_usuario INNER JOIN cadsatro_empresa WHERE cpf = '$infobusca'";
        $resultado = mysql_query($query, $conexao);

        while($escreve = mysql_fetch_array($resultado)){

            $nome = $escreve['nome_completo'];
            $cpf = $escreve['cpf'];
            $matricula = $escreve['matricula'];
            $login = $escreve['login'];
            $senha = $escreve['senha'];
            $confsenha = $escreve['confirmar_senha'];
            $tpusuario = $escreve['tipo_usuario'];
            $fkcodemp = $escreve['razao_social'];
            
        }

    }else if ($metbusca == "matricula"){

        $query = "SELECT nome_completo, cpf, matricula, login, senha, confirmar_senha, tipo_usuario, razao_social FROM cadastro_usuario INNER JOIN cadsatro_empresa WHERE matricula = '$infobusca'";
        $resultado = mysql_query($query, $conexao);

        while($escreve = mysql_fetch_array($resultado)){

            $codigousu = $escreve['codigo_usuario'];
            $nome = $escreve['nome_completo'];
            $cpf = $escreve['cpf'];
            $matricula = $escreve['matricula'];
            $login = $escreve['login'];
            $senha = $escreve['senha'];
            $confsenha = $escreve['confirmar_senha'];
            $tpusuario = $escreve['tipo_usuario'];
            $fkcodemp = $escreve['razao_social'];
            
        }
    }

    ?>
    <tr>
        <td><label>Nome Completo: </label>
            <input type="text" name="nomecompleto" id="nomecompleto" value="<?php echo $nome ?>" READONLY /></td>
        <td><label>CPF: </label>
            <input type="text" name="cpf" id="cpf" value="<?php echo $cpf ?>"READONLY /></td>
    </tr>
    <tr>
        <td><label>Matricula: </label>
            <input type="text" name="matricula" id="matricula" value="<?php echo $matricula ?>" READONLY /></td>
        <td><label>Login: </label>
            <input type="text" name="login" id="login" value="<?php echo $login ?>" READONLY /></td>
    </tr>
    <tr>
        <td><label>Senha: </label>
            <input type="password" name="senha" id="senha" value="<?php echo $senha ?>" READONLY /></td>
        <td><label>Confirmar Senha: </label>
            <input type="password" name="confirmarsenha" id="confirmarsenha" value="<?php echo $confsenha ?>" READONLY /></td>
    </tr>
    <tr>
    	<?php

    	if ($tpusuario == "1"){

        	echo '<td><label>Administrador?</label>';
            echo ' Sim';

        } else {

        	echo '<td><label>Administrador? </label>';
            echo ' Não';
       
        }
            ?>
        <td><label>Empresa: </label>
            <input type="text" name="login" id="login" value="<?php echo $login ?>" READONLY /></td>

            </select>
        </td>
    </tr>
    <tr>
        
        <td><input type="hidden" name="codigousuario" id="codigousuario" value="<?php echo $codigousu ?>" READONLY/></td>
        
    </tr>
    <tr>
        <td><input type="Submit" value="Alterar Usuário" /></td>
    </tr>
    </table>
        <br>
    </p>
</form>
</div>
<br>
<a href="listausuario.php">Realizar outra busca!</a>
</body>
</html>