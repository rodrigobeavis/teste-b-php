
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
	<title>MEU CEP</title>
</head>
	<body>
		<section>
		<form action="index.php" method="POST">
			<label for="cep"> Insira o CEP: </label>
			<input type="text" name="cep" id="cep">
			<input type="submit" value="Enviar">
		</form>
		<div>
		</section>
		<section>
			<?php
			if(!empty($address)){

				echo "<br><br>CEP Informado: $cep <br>
						 	Rua: $address->logradouro<br>
						 	Bairro: $address->bairro<br>
						 	Cidade: $address->localidade<br>
						 	Estado: $address->uf<br>";
			}
		?>
		</section>
		</div>
	</body>
</html>
