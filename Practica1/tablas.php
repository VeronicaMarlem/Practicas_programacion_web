<html>
<head>
	<title>Tabla de multipliccar Dinámica</title>
</head>
<body>
	<?php
	//BLOQUE DE CÓDIGO PHP
	//$_POST  CONTENEDOR DE TODOS LOS DATOS AL HACER SUBMIT
	//$_POST['txtnumero'] 
	//VALIDACIÓN GENERAL DE ACCESO A LA PÁGINA PHP (1ERA VEZ)
	if (empty($_POST)) {
		//ES LA PRIMERA VEZ DE CARGA DE PAGINA PHP
		$limite = null;
		$numero = null;
	}
	else{
		//ES LA SEGUNDA VEZ QUE SE CARGA LA PÁGINA
		$limite = $_POST['txtlimite'];
		$numero = $_POST['txtnumero'];
		echo "limite:".$limite."<br>";
		echo "numero:".$numero;
	}
?>

	<form id="form1" method="POST">
		<br>
		<div align="center">
			<font face="tahoma" size="5" align="center"><b>Tabla de Multiplicar Dinámica</b></font>
		</div>
		<div>
			<br><table width="40%" border="1" align="center">
				<tr>
					<td>
						<font  face="tahoma" size="3"> Captura el número para crear su tabla de multiplicar</font>
					</td>
					<td>
						<input type="text" value="<?php echo $numero;?>" name="txtnumero" id="txtnumero">
					</td>
				</tr>
				<tr>
					<td>
						<font  face="tahoma" size="3">Captura el límite de la tabla</font>
					</td>
					<td>
						<input type="text" value="<?php echo $limite;?>" name="txtlimite" id="txtlimite">
					</td>
				</tr>
				<tr>
					<td>
						<font  face="tahoma" size="3">Tabla de multiplicar</font>
					</td>
					<td align="center">
						<font  face="tahoma" size="3">
							<b>
							<?php
							//VALIDAR LOS VALORES RECIBIDOS
							if($limite > 0 && $numero > 0){
								echo "Datos correctos, la tabla es:<br>";;
								//CONSTRUCCIÓN DE LA TABLA DINAMICA
								$i = 0;
								for ($i=1; $i<=$limite; $i++) { 
									echo $numero." x ".$i." = ".$i*$numero."<br>";
								}
							}else{
								if ($limite != null && $numero != null)
									echo "Los valores capturados no permiten crear la tabla";
							}
							?>
							</b>
						</font>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<input type="submit" value="Generar tabla" id="btngenerar">
					</td>
				</tr>
			</table>
		</div>
	</form>
</body>
</html>