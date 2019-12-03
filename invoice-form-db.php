<?php
//db connection
$con = mysqli_connect('mysql:host=remotemysql.com;dbname=RV6OjRGtny;charset=utf8', 'RV6OjRGtny', 'a7BUsFJ0gQ',);
mysqli_select_db($con,'RV6OjRGtny');
/* devuelve el nombre de la base de datos actualmente seleccionada */
if ($result = $mysqli->query("SELECT DATABASE()")) {
    $row = $result->fetch_row();
    printf("Default database is %s.\n", $row[0]);
    $result->close();
}
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
