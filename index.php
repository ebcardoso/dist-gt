<html>
	<head> <title> Página de Login </title> </head>
	<h2> Login </h2>
	
	<form nome="formlogin "action="serv_auth/log.php" method="post">
		<label for="username">Login:</label>
		<input type="text" name="username" class="text" id="nome"/>
			</br>
		<label for="senha">Senha:</label>
		<input type="password" name="senha" class="text"/>
			</br></br>
		<input type="submit" name="enviar" value="Entrar" class="send"/>
	</form>
</html>