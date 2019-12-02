<?php
require_once __DIR__ . '/vendor/autoload.php';
//require_once __DIR__ . '/composer/autoload_real.php';

//variables
  $patente = $_POST["patente"];
  $cobrar = $_POST['cobrar'];
  $ingreso = $_POST['ingreso'];
  $salida = $_POST['salida'];

//instancia pdf
  $mpdf = new \Mpdf\Mpdf();


//crear pdf
$data = '';

$data .='<h1>Su Ticket</h1>';

//agregar data
$data .= '<strong>Vehiculo:</strong>' .$patente.'<br>';
$data .= '<strong>Hora de ingreso:</strong>' .date("d-m-y H:i",$ingreso).'<br>';
$data .= '<strong>Hora de salida:</strong>' .date("d-m-y H:i",$salida).'<br>';
$data .= '<strong>Cobrar:</strong> $' .$cobrar.'<br>';

//escribir pdf
$mpdf->WriteHTML($data);

//salida a navegador
$mpdf->Output('TicketParking.pdf', 'D');
?>