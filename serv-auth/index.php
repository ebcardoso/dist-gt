<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6 ielt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7 ielt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<title>Trabalho de Distribuídos</title>
	<link rel="stylesheet" type="text/css" href="style/style.css" />
	</head>

	<body>
		<div class="container">
			<section id="content">
				<form nome="formlogin "action="login/login.php" method="post">
					<h1>Login</h1>

					<div>
						<input type="text" name="username" required="" id="username" />
					</div>
					<div>
						<input type="password" name="senha" required="" id="password" />
					</div>
					<div>
						<input type="submit" value="Login" />
						<?php //<a href="#">Lost your password?</a> ?>
						<a href="crud_cliente/create.php">Cadastrar-se</a>
					</div>
				</form><!-- form -->
				<?php //<div class="button">
					//<a href="#">Download source file</a>
				//</div><!-- button --> ?>
			</section><!-- content -->
		</div><!-- container -->
	</body>
</html>