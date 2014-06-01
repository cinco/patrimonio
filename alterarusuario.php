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
<form action="alterarusuario.php" method="post" name="formalterausuario" id="formalterausuario">
<?php
    echo ('Você está logado com a conta: ' . $_SESSION['login']); 

?>
    <br>

    Insira o cpf para Consulta: <input type="text" name="cpf" id="cpf" />
</form>

<?php
    
    include 'conexaobd.php';
    $cpf = $_POST['cpf'];
    $listausuarios = mysql_query("SELECT * FROM cadastro_usuario WHERE cpf = '$cpf'", $conexao);
    $linhas = mysql_num_rows($listausuarios);

    if ($linhas){

    $nome = 
    
    }

    
?>
<br>
<br>
</body>
</html>