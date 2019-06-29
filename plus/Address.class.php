<?php

/**
 * Description of Address
 * @author rodrigo.pedroza
 */
class Address
{

  function __construct()
  {}

  public function get_address($cep){

  try {


      $cep = preg_replace("/[^0-9]/", "", $cep);

      if (empty($cep)) {
        throw new \Exception("Error type!", 1);
      }else{
        $url = "http://viacep.com.br/ws/{$cep}/xml/";
        $xml = simplexml_load_file($url);
        return $xml;
      }

  } catch (\Exception $e) {
      echo "Erro: {$e}" ;
  }



  }
}
