<?php
//db connection

$consulta = mysqli_connect('mysql:host=remotemysql.com;dbname=RV6OjRGtny;charset=utf8', 'RV6OjRGtny', 'a7BUsFJ0gQ',);

$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
  $consulta =$objetoAccesoDato->RetornarConsulta("select patente  , horaingreso, horasalida,importe  from vehiculosfacturados");
  $consulta->execute();     
  $datos= $consulta->fetchAll(PDO::FETCH_ASSOC);
var_dump($consulta)
?>
<html>
	<head>
		<title>Invoice generator</title>
	</head>
	<body>
		select patente:
		<form method='get' action='invoice-db.php'>
			<select name='patente'>
				<?php
					//show invoices list as options
					$query = mysqli_query($consulta,"select * from vehiculosfacturados");
					while($patente = mysqli_fetch_array($query)){
						echo "<option value='".$patente['patente']."'>".$patente['patente']."</option>";
					}
				?>
			</select>
			<input type='submit' value='Generate'>
		</form>
	</body>
</html>
