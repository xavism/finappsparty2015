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

$second_id = $highest_id;

$success = sprintf("SELECT valor from registres where id = %s",
            mysqli_real_escape_string($enlace, $second_id));
$success = mysqli_query($enlace, $success);

$row = mysqli_fetch_array($success);
$temp = $row[0];
echo $temp;
?>