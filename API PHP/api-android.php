<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');


$MAX_TEMP = "33.0";
$MAX_HUM = "65.0";

$enlace =  mysqli_connect('127.0.0.1', 'root', 'ptiproject', 'finapps2015');
if (!$enlace) {
    die('No pudo conectarse: ' . mysql_error());
} else {
//echo 'Conectado satisfactoriamente';
}

$success = sprintf("SELECT max(id) as max from registres");
$query = mysqli_query($enlace, $success);

$row = mysqli_fetch_array($query);
$highest_id = $row[0];

$second_id = $highest_id-1;

$success = sprintf("SELECT valor from registres where id = %s OR id = %s",
            mysqli_real_escape_string($enlace, $highest_id),
            mysqli_real_escape_string($enlace, $second_id));
$success = mysqli_query($enlace, $success);

$row = mysqli_fetch_array($success);
$temp = $row[0];
$row = mysqli_fetch_array($success);
$hum = $row[0];
$response = sprintf('
[
    {
        "name": "Cocina",
        "sensors": [
            {
                "name": "Temperatura",
                "min_value": 0,
                "max_value": 60,
                "value": 20,
                "type": "temperature",
                "alert": {
                    "min_value": 10,
                    "max_value": 45 
                } 
            },
            {
                "name": "Humedad",
                "min_value": 0,
                "max_value": 120,
                "value": %s,
                "type": "humidity",
                "alert": {
                    "min_value": 10,
                    "max_value": 80 
                }
            },
            {
                "name": "Movimiento",
                "toggle": true,
                "type": "movement"
            }
        ]
    },
    {
        "name": "Dormitorio",
        "sensors": [
            {
                "name": "Temperatura",
                "min_value": 0,
                "max_value": 60,
                "value": %s,
                "type": "temperature"
            }
        ]
    },
    {
        "name": "Recibidor",
        "sensors": [
            {
                "name": "Temperatura",
                "min_value": 0,
                "max_value": 60,
                "value": 45,
                "type": "temperature"
            }
        ]
    }
 ]',$hum,$temp);
echo $response;





mysqli_close($enlace);

?>