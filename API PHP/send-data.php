<?php

function alerta ($message){
    $to      = 'marcfernandezantolin@gmail.com';
    $subject = 'Alerta Domestica';
    $headers = 'From: alerta_hogar@lacaixa.com' . "\r\n";

    mail($to, $subject, $message, $headers);
}

function store_bd($enlace, $id_sensor, $time, $valor){
    $success = sprintf("INSERT INTO registres (id_sensor, time, valor) values (%s, '%s', %s)",
            mysqli_real_escape_string($enlace, $id_sensor),
            mysqli_real_escape_string($enlace, $time),
            mysqli_real_escape_string($enlace, $valor));
    
    $success = mysqli_query($enlace, $success);

}

error_reporting(E_ALL);
ini_set('display_errors', '1');
/*$dat = urldecode($_POST["data"]);
var_dump($dat);
$dat = json_decode($dat);
var_dump($dat);
*/
$dat[0]=$_POST["sens1"];
$dat[1]=$_POST["sens2"];


$MAX_TEMP = "33.0";
$MAX_HUM = "65.0";

$enlace =  mysqli_connect('127.0.0.1', 'root', 'ptiproject', 'finapps2015');
if (!$enlace) {
    die('No pudo conectarse: ' . mysql_error());
} else {
//echo 'Conectado satisfactoriamente';
}


date_default_timezone_set('Europe/Madrid');
$date = date('Y-m-d H:i:s', time());


    store_bd($enlace, "1", $date, $dat[0]);
    if ((double)$dat[0] > (double)$MAX_TEMP) {
        alerta("La temperatura es extremadamente alta, por favor compruebe la integridad de su hogar.");
    }

    store_bd($enlace, "2", $date, $dat[1]);
    if ((double)$dat[1] > (double)$MAX_HUM) {
        alerta("La humedad de su casa es demasiado alta, procedemos a encender el deshumidificador");
    }

    if ((double)$dat[1] <= (double)$MAX_HUM && ((double)$dat[0] <= (double)$MAX_TEMP))
        echo "ok";
/*
foreach ($dat->data as $sensor) {
    $id = $sensor->id;
    $valor = $sensor->value;
    
    if (strcmp($id, "1") == 0){ //TEMP
        store_bd($enlace, $id, $date, $valor);
        if ((double)$valor > (double)$MAX_TEMP) {
            alerta("La temperatura es extremadamente alta, por favor compruebe la integridad de su hogar.");
            
        }
    } else if (strcmp($id, "2") == 0) { //HUM
        store_bd($enlace, $id, $date, $valor);
        if ((double)$valor > (double)$MAX_HUM) {
            alerta("La humedad de su casa es demasiado alta, procedemos a encender el deshumidificador");
        }
    } else if (strcmp($id, "3") == 0) { //JOY
        store_bd($enlace, $id, $date, $valor);
        if ($valor > 0){
            alerta("Se ha detectado movimiento en su hogar.");
        }
    }

}*/


mysqli_close($enlace);

?>