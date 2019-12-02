<?php
require_once __DIR__ . '/vendor/autoload.php';
//require_once __DIR__ . '/composer/autoload_real.php';
?>

<main role="main" class="container">


 <form action="hacerfacturar.php"> 

      <h1>Cobrar</h1>

      <?php

          date_default_timezone_set('America/Argentina/Buenos_Aires');
        
          $patente = $_GET["patente"];
          $cobrar = $_GET['cobrar'];
          $ingreso = $_GET['ingreso'];
          $salida = $_GET['salida'];


//variables


//instancia pdf
  $mpdf = new \Mpdf\Mpdf();


//crear pdf
$data = '';

$data .='<h1>Su Ticket</h1>';

//agregar data
$data .= '<strong>Vehiculo:</strong>' . $patente .'<br>';
$data .= '<strong>Hora de ingreso:</strong>' . date("d-m-y H:i",$ingreso) .'<br>';
$data .= '<strong>Hora de salida:</strong>' . date("d-m-y H:i",$salida) .'<br>';
$data .= '<strong>Cobrar:</strong> $' . $cobrar .'<br>';

//escribir pdf
$mpdf->WriteHTML($data);

//salida a navegador
$mpdf->Output('TicketParking.pdf', 'D');
?>