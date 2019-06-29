
<?php

function get_address($cep){


	$cep = preg_replace("/[^0-9]/", "", $cep);
	$url = "http://viacep.com.br/ws/{$cep}/xml/";

	$xml = simplexml_load_file($url);
	return $xml;
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
		if(!empty(filter_input(INPUT_POST, 'cep', FILTER_DEFAULT))){

			$cep = filter_input(INPUT_POST, 'cep', FILTER_DEFAULT);

			$address = get_address($cep);
		
			echo "<br><br>CEP Informado: $cep <br>";
			echo "Rua: $address->logradouro<br>";
			echo "Bairro: $address->bairro<br>";
			echo "Cidade: $address->localidade<br>";
			echo "Estado: $address->uf<br>";
		}
		?>
		</section>
		</div>
	</body>
</html>
