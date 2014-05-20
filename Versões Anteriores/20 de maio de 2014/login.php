<html>

<head>
<title>Login</title>
<link rel="stylesheet" type="text/css" href="estilo.css">
<meta charset="utf-8">
</head>

<body>
<div id = "arealogin">
	<p class = "telalogin">Autenticação - Sistema de Patrimonio</p>
		<form method="post" action="validacaologin.php" name="formlogin" id="formlogin" >
	<p class = "formulariologin">
		<br>
		<label>Login: </label>
		<input type="text" name="login" id="login" />
		<br>
		<br>
		<label>Senha: </label>
		<input type="password" name="senha" id="senha" />
		<br>
		<br>
		<input type="reset" value="Limpar Campos" />
		<input type="submit" value="Entrar"/>
		<br>
	</p>
</div>
</body>

</html>