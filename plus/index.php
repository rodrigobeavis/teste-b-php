
<?php

$path = str_replace('\\', '/',  dirname(__DIR__));
require_once "{$path}/parte_cde/Autoload.class.php";
new Autoload;

if (!empty(filter_input(INPUT_POST, 'cep', FILTER_DEFAULT))) {
	$cep = filter_input(INPUT_POST, 'cep', FILTER_DEFAULT);
	$ObjAddress = new Address;
	$address = $ObjAddress->get_address($cep);
}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<title>MEU CEP</title>
</head>

	<body>
		<header>
			<nav class="navbar navbar-expand-lg navbar-light bg-dark text-light" role="navigation">
					<h1>MEU CEP</h1>
			</nav>
		</header>
		<section class="container mt-5" >
			<div class="row mt-5">
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 mx-auto">
					<form action="index.php" method="POST">
						<label for="cep"><strong> Insira o CEP </strong></label>
						<input type="text" name="cep" id="cep" class="form-control">
						<input type="submit" value="Enviar" class="btn btn-block btn-outline-success mt-3">
					</form>
				</div>
			</div>
		</section>
		<section class="container mt-5">
			<div class="row mt-5">
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 mx-auto">

					<?php
					if(!empty($address)){
						?>

						<div class="card">
						<div class="card-body">
					    <h5 class="card-title">CEP Informado: <?=$cep?> </h5>
					    <p class="card-text">
					    	<?php
								echo "
											<p class='mb-0'><strong>Rua:</strong> $address->logradouro</p>
											<p class='mb-0'><strong>Bairro:</strong> $address->bairro</p>
											<p class='mb-0'><strong>Cidade:</strong> $address->localidade</p>
											<p class='mb-0'><strong>Estado:</strong> $address->uf</p>";
											 ?>
					    </p>
					  </div>
					</div>
					<?php
					}
				?>
				</div>
		</div>
		</section>
		</div>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<script src=".\assets\jquery.mask.min.js" ></script>
		<script src=".\assets\address.js" ></script>
	</body>
</html>
