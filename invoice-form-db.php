<?php
//db connection
include 'accesoadatos.php';

$objetoAccesoDato= AccesoDatos::dameUnObjetoAcceso();
$con =$objetoAccesoDato->RetornarConsulta("select * from vehiculosfacturados");
$con->execute();
$datos=$con->fetchall(PDO::FETCH_ASSOC);

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
					$query = mysqli_query($con,"select * from vehiculosfacturados");
					while($patente = mysqli_fetch_array($query)){
						echo "<option value='".$patente['patente']."'>".$patente['patente']."</option>";
					}
				?>
			</select>
			<input type='submit' value='Generate'>
		</form>
	</body>
</html>
