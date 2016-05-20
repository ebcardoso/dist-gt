<?php /*<html>
<head> <title> Fazer Empréstimo </title> </head>

<body>
	<h2> Empréstimo </h2>
	<form nome="formlogin "action="fazer_emprestimo2.php" method="post">
		<label>Valor:</label>
		<input type="text" name="valor"/>
		<input type="submit" name="confirmar" value="Confirmar"/>
	</form>
	<a href="index.php"> Voltar </a>
</body>
</html> */ ?>

<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6 ielt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7 ielt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<title>Empréstimo</title>
	<link rel="stylesheet" type="text/css" href="../style/style.css" />
	</head>

	<body>
		<div class="container">
			<section id="content">
				<form nome="formlogin "action="fazer_emprestimo2.php" method="post">
					<h1>Empréstimo</h1>

					<div>
						<input type="text" name="valor" required="" id="username" />
					</div>
					<div>
						<input type="submit" value="Confirmar" />
						<?php //<a href="#">Lost your password?</a> ?>
						<a href="index.php">Voltar</a>
					</div>
				</form><!-- form -->
				<?php //<div class="button">
					//<a href="#">Download source file</a>
				//</div><!-- button --> ?>
			</section><!-- content -->
		</div><!-- container -->
	</body>
</html>