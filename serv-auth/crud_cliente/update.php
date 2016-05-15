<?php
	session_start();
?>

<form nome="formlogin "action="updateInBD.php" method="post">
	<label for="pass1">Nova Senha:</label>
	<input type="password" name="pass1" id="pass1"/> </br>
		
	<label for="pass2">Nova Senha:</label>
	<input type="password" name="pass2" id="pass2"/> </br>

	<input type="submit" name="enviar" value="Alterar Senha"/>
</form>