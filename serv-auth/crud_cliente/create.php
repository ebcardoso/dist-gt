<?php /*<form nome="formlogin "action="createInBD.php" method="post">
	<label for="nome">Nome:</label>
	<input type="text" name="name" class="text" id="nome"/>
		</br>
	<label for="username">Login:</label>
	<input type="text" name="username" class="text" id="nome"/>
		</br>
	<label for="senha">Senha:</label>
	<input type="password" name="pass" class="text"/>
		</br></br>
	<input type="submit" name="enviar" value="Entrar" class="send"/>
</form> */ ?>

<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6 ielt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7 ielt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<title>Cadastro</title>
	<link rel="stylesheet" type="text/css" href="../style/style.css" />
	</head>

	<body>
		<div class="container">
			<section id="content">
				<form nome="formlogin "action="createInBD.php" method="post">
					<h1>Cadastro</h1>

					<div>
						<input type="text" name="name" required="" id="username" />
					</div>
					<div>
						<input type="text" name="username" required="" id="username" />
					</div>
					<div>
						<input type="password" name="pass" required="" id="password" />
					</div>
					<div>
						<input type="submit" value="Cadastrar" />
						<a href="../index.php">Voltar</a>
						<?php
						/*<a href="crud_cliente/create.php">Cadastrar-se</a> */ ?>
					</div>
				</form><!-- form -->
				<?php /*<div class="button">
					<a href="#">Download source file</a>
				</div><!-- button --> */?>
			</section><!-- content -->
		</div><!-- container -->
	</body>
</html>