<?php
require 'requests-master/Requests.php';
Requests::register_autoloader();
require 'culqi-php-master/culqi.php';

$tok = $_POST["token"];
$ema = $_POST["email"];
$pre = $_POST["amount"];
$des = $_POST["description"];
 

$PUBLIC_KEY = "sk_test_QoyPKCji5KudUf2c";
$culqi = new Culqi\Culqi(array('api_key' => $PUBLIC_KEY));

try {  

  $charge = $culqi->Charges->create(
  array(
	"amount" => $pre,
	"capture" => true,
	"currency_code" => "PEN",
	"description" => $des,
	"email" => $ema,
	"installments" => 0,
	"source_id" => $tok 
  ));

  echo "ok";
  
} catch(Exception $e) {
  // ERROR: El cargo tuvo algún error o fue rechazado
  echo $e->getMessage();

}

?>