<?php
	//Iniciando a sessão
	session_start();
 
	//Caso o usuário não esteja autenticado, limpa os dados e redireciona para a pagina login.php
	if (!isset($_SESSION['login'])) {
    
    session_destroy();
    unset ($_SESSION['login']);
    unset ($_SESSION['count']);
    header('location:login.php');

    }

?>

<html>

<head>
<title>Patrimônio - Usuário: <?php echo $_SESSION['login']; ?></title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="estilo.css">
</head>

<body> 

<?php
    
    include 'funcoes.php';
    $_SESSION['count'];

    if ($_SESSION['count'] == 1){
    boasvindas($_SESSION['login']);
    $_SESSION['count']++;
    }

?>
<br>

<div class="drop">
<ul class="drop_menu">
<li><a href='#'>Cadastros</a>
    <ul>
    <li><a href='cadastrousuario.php'>Usuário</a></li>
    <li><a href='#'>Empresas</a>
        <ul>
        <li><a href='cadastroempresa.php'>Empresa</a></li>
        <li><a href='#'>Departamento</a></li>
        <li><a href='#'>Sub Departamento</a></li>
        </ul>
    </li>
    <li><a href='cadastrobem.php'>Bens</a></li>
    </ul>
</li>
<li><a href='#'>Movimentações</a>
    <ul>
    <li><a href='#'>Inclusão</a></li>
    <li><a href='#'>Retorno</a></li>
    </ul>
</li>
<li><a href='#'>Consultas</a>
    <ul>
    <li><a href='#'>Cadastros</a>
    <ul>
        <li><a href='listausuario.php'>Usuário</a></li>
        <li><a href='listaempresa.php'>Empresa</a></li>
        <li><a href='#'>Bens</a></li>
    </ul>
    </li>
    <li><a href='#'>Movimentações</a>
    <ul>
        <li><a href='#'>Por bem</a></li>
        <li><a href='#'>Por empresa</a></li>
        <li><a href='#'>Por data</a></li>
    </ul>
    </li>
    <li><a href='#'>Patrimonio</a>
    <ul>
        <li><a href='#'>Por item</a></li>
        <li><a href='#'>Por empresa</a></li>
        <li><a href='#'>Total Geral</a></li>
    </ul>
    </li>
    </ul>
</li>
</ul>
</div>
</body>
</html>