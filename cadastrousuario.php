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
<title>Cadastro de Usuário</title>
<link rel="stylesheet" type="text/css" href="estilo.css" />
<link rel="stylesheet" type="text/javascript" href="validacoes.js" />
<meta charset="utf-8">
</head>

<body>
	<?php 

	echo ('Você está logado com a conta: ' . $_SESSION['login']);
	echo ('<br>');
	?>
<div id = "areacadastrousuario">
	<p class = "cadastrousuario">Cadastrar Novo Usuário</p>
		<form method="post" action="validacaocadusu.php" name="formcadastrousuario" id="formcadastrousuario" >
	<p class = "formulariocadastrousuario">
		<br>
	<table>
	<tr>
		<td><label>Nome Completo: </label>
			<input type="text" name="nomecompleto" id="nomecompleto" /></td>
		<td><label>CPF: </label>
			<input type="text" name="cpf" id="cpf" /></td>
	</tr>
	<tr>
		<td><label>Matricula: </label>
			<input type="text" name="matricula" id="matricula" /></td>
		<td><label>Login: </label>
			<input type="text" name="login" id="login" /></td>
	</tr>
	<tr>
		<td><label>Senha: </label>
			<input type="password" name="senha" id="senha" /></td>
		<td><label>Confirmar Senha: </label>
			<input type="password" name="confirmarsenha" id="confirmarsenha" /></td>
	</tr>
	<tr>
		<td><label>Administrador?</label>
			<input type="radio" name="tipousuario" id="tipousuario" value="1"> Sim </input>
			<input type="radio" name="tipousuario" id="tipousuario" value="0"> Não </input>
		</td>

		<td><label>Empresa: </label>
			<select name="codigoempresa" id="codigoempresa">
			<option>Selecione a empresa...</option>
			<?php
				 include 'conexaobd.php';
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
		<br>
		<a href="index.php">Menu</a>
	</p>
</form>
</div>

</body>
</html>