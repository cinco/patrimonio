<html>

<head>
<title>Login</title>
<link rel="stylesheet" type="text/css" href="estilo.css" />
<link rel="stylesheet" type="text/javascript" href="validacoes.js" />
<meta charset="utf-8">
</head>

<body>
<div id = "arealogin">
	<p class = "telalogin">Autenticação</p>
		<form method="post" action="validacaologin.php" name="formlogin" id="formlogin" >
	<p class = "formulariologin">
		<label>Login: </label>
		<input type="text" name="login" id="login" maxlength="15" />
		<br>
		<br>
		<label>Senha: </label>
		<input type="password" name="senha" id="senha" maxlength="15" />
		<br>
		<br>
		<input type="reset" value="Limpar Campos" />
		<input type="submit" value="Entrar" />
		<p></p>
	</p>
	<p class = "telalogin">Sistema de Controle Patrimonial</p>
</div>
</body>

</html>