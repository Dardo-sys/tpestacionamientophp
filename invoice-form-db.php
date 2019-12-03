<?php
//db connection
include 'accesoadatos.php';
$con = mysqli_connect('mysql:host=remotemysql.com;dbname=RV6OjRGtny;charset=utf8', 'RV6OjRGtny', 'a7BUsFJ0gQ',);

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
