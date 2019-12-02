<?php
require_once __DIR__ . '/vendor/autoload.php';
//require_once __DIR__ . '/composer/autoload_real.php';


 

  include '../funciones/accesoadatos.php';

  $cantidadAutos=0;
  $totalFacturado = 0;
  date_default_timezone_set('America/Argentina/Buenos_Aires');



  $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
  $consulta =$objetoAccesoDato->RetornarConsulta("select patente  , horaingreso, horasalida,importe  from vehiculosfacturados");
  $consulta->execute();     
  $datos= $consulta->fetchAll(PDO::FETCH_ASSOC);

    
    foreach ($datos as $vehiculosfacturados)
    {
     

      echo "<tr>";
        echo "<td>".$vehiculosfacturados['patente']."</td>   <td>".$vehiculosfacturados['horaingreso']."</td>   <td>".$vehiculosfacturados['horasalida']."</td>   <td>".$vehiculosfacturados['importe']."</td>";
        echo "</tr>";
        


        $totalFacturado = $totalFacturado + $vehiculosfacturados['importe'];
        $cantidadAutos = $cantidadAutos + 1;
        
      
    }
    echo "</table>";
 ;
    echo "<h5> TOTAL FACTURADO: $".$totalFacturado."</h5>";
    
  

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
$data .= '<strong>Vehiculo:</strong>' . $patente .'<br>';
$data .= '<strong>Hora de ingreso:</strong>' . date("d-m-y H:i",$ingreso) .'<br>';
$data .= '<strong>Hora de salida:</strong>' . date("d-m-y H:i",$salida) .'<br>';
$data .= '<strong>Cobrar:</strong> $' . $cobrar .'<br>';

//escribir pdf
$mpdf->WriteHTML($data);

//salida a navegador
$mpdf->Output('TicketParking.pdf', 'D');
?>