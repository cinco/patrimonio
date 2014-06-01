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
<title>Alterar Usuário</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>

    <?php 

    include 'conexaobd.php';
    

    echo ('Você está logado com a conta: ' . $_SESSION['login']);
    echo ('<br>');
?>


<div id = "areaalteracaousuario">
    <p class = "alteracaousuario">Alterar Usuário</p>
        <form method="post" action="validacaoaltusu.php" name="formalteracaousuario" id="formalteracaousuario" >
    <p class = "formularioalteracaousuario">
        <br>
    <table>

        <?php

    $metbusca = $_SESSION['metbusca'];
    $infobusca = $_SESSION['infobusca'];

    if ($metbusca == "nome"){

        $query = "SELECT * FROM cadastro_usuario WHERE nome_completo = '$infobusca'";
        $resultado = mysql_query($query, $conexao);
        
        while($escreve = mysql_fetch_array($resultado)){

            $nome = $escreve['nome_completo'];
            $cpf = $escreve['cpf'];
            $matricula = $escreve['matricula'];
            $login = $escreve['login'];
            $senha = $escreve['senha'];
            $confsenha = $escreve['confirmar_senha'];

        }

        

    }else if ($metbusca == "cpf"){

        $query = "SELECT * FROM cadastro_usuario WHERE cpf = '$infobusca'";
        $resultado = mysql_query($query, $conexao);

        while($escreve = mysql_fetch_array($resultado)){

            $nome = $escreve['nome_completo'];
            $cpf = $escreve['cpf'];
            $matricula = $escreve['matricula'];
            $login = $escreve['login'];
            $senha = $escreve['senha'];
            $confsenha = $escreve['confirmar_senha'];
            
        }

    }else if ($metbusca == "matricula"){

        $query = "SELECT * FROM cadastro_usuario WHERE matricula = '$infobusca'";
        $resultado = mysql_query($query, $conexao);

        while($escreve = mysql_fetch_array($resultado)){

            $nome = $escreve['nome_completo'];
            $cpf = $escreve['cpf'];
            $matricula = $escreve['matricula'];
            $login = $escreve['login'];
            $senha = $escreve['senha'];
            $confsenha = $escreve['confirmar_senha'];
            
        }
    }

    ?>
    <tr>
        <td><label>Nome Completo: </label>
            <input type="text" name="nomecompleto" id="nomecompleto" value="<?php echo $nome ?>"/></td>
        <td><label>CPF: </label>
            <input type="text" name="cpf" id="cpf" value="<?php echo $cpf ?>"/></td>
    </tr>
    <tr>
        <td><label>Matricula: </label>
            <input type="text" name="matricula" id="matricula" value="<?php echo $matricula ?>"/></td>
        <td><label>Login: </label>
            <input type="text" name="login" id="login" value="<?php echo $login ?>"/></td>
    </tr>
    <tr>
        <td><label>Senha: </label>
            <input type="password" name="senha" id="senha" value="<?php echo $senha ?>"/></td>
        <td><label>Confirmar Senha: </label>
            <input type="password" name="confirmarsenha" id="confirmarsenha" value="<?php echo $confsenha ?>"/></td>
    </tr>
    <tr>
        <td><label>Administrador?</label>
            <input type="radio" name="tipousuario" id="tipousuario" value="1"> Sim </input>
            <input type="radio" name="tipousuario" id="tipousuario" value="0"> Não </input>

        <td><label>Empresa: </label>
            <select name="codigoempresa" id="codigoempresa">
            <option>Selecione a empresa...</option>

            <?php
                 $listaempresas = mysql_query("SELECT codigo_empresa, razao_social FROM cadastro_empresa", $conexao);
                 while($empresa = mysql_fetch_array($listaempresas)) { ?>
                 <option value="<?php echo $empresa['codigo_empresa'] ?>"><?php echo $empresa['razao_social'] ?></option>
                 <?php 
                 mysql_close($conexao);
                 }

            ?>

            </select>
        </td>
    </tr>
    <tr>
        <td><input type="reset" value="Limpar Campos" /></td>
        <td><input type="submit" value="Cadastrar"/></td>
    </tr>
    </table>
        <br>
    </p>
</form>
</div>
</body>
</html>