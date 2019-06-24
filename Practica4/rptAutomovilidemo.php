<?php

	 $estado = "";

      // Se tienen todos los parametros para conectarse ...
      if( !$conn = mysqli_connect("localhost", "root" , "180596", "verificentro", "3306") ){		  
    //if( !$conn = mysqli_connect("localhost", "root" , "", "verificentro", "3307") ){	  xampp
         $estado = "Error al conectarse al servidor MySql, revisar parámetros";
      }
      else{
         $estado = "Conexion realizada al servidor";
      }
      // --> Ejecutar una consulta
      $recordSet = mysqli_query($conn, "select AUT_CVE_AUTOMOVIL, AUT_PLACA, AUT_MODELO, AUT_MARCA, AUT_NUMERO_SERIE,
              							AUT_SERIE_MOTOR, AUT_TIPO_COMBUSTIBLE, CONCAT(CLIENTE.CLI_CVE_CLIENTE, '-',CLI_NOMBRE, '-',CLI_APELLIDO_PATERNO,'(', CLI_CORREO_ELECTRONICO, ')') CVE_CLIENTE, AUT_IMAGEN FROM automovil,cliente WHERE cliente.CLI_CVE_CLIENTE = automovil.CLI_CVE_CLIENTE
              							ORDER BY aut_cve_automovil");
?>

<html>
<body bgcolor="white">

<form id="frmConexion" name="frmConexion" method="POST">

<center>
  <font face="arial" size="3" color="midnightblue"><b>Reporte de Automoviles Verificados </b></font>
  <br><br>
  <font face="arial" size="2" color="midnightblue">Estado de la conexion: <?php echo $estado; ?></font>
  <br><br>
	  
	<table width="80%" border="0">
	  <tr>
		  <td bgcolor="blue" align="middle"><font face="arial" size="2" color="white"><b>Clave Automovil</b></font></td>
		  <td bgcolor="blue" align="middle"><font face="arial" size="2" color="white"><b>Placa</b></font></td>
		  <td bgcolor="blue" align="middle"><font face="arial" size="2" color="white"><b>Modelo</b></font></td>
		  <td bgcolor="blue" align="middle"><font face="arial" size="2" color="white"><b>Marca</b></font></td>  
		  <td bgcolor="blue" align="middle"><font face="arial" size="2" color="white"><b>Numero Serie</b></font></td>
		  <td bgcolor="blue" align="middle"><font face="arial" size="2" color="white"><b>Serie Motor</b></font></td>  
		  <td bgcolor="blue" align="middle"><font face="arial" size="2" color="white"><b>Combustible</b></font></td>  
		  <td bgcolor="blue" align="middle"><font face="arial" size="2" color="white"><b>Clave Cliente</b></font></td>  
		  <td bgcolor="blue" align="middle"><font face="arial" size="2" color="white"><b>Imagen</b></font></td>  
	  </tr>
	  
<?php
	   $a=0;
	   $c = 0;
	  while($registro = mysqli_fetch_row($recordSet))  
	  {  
		    $c=$c+1;
			$a=$a+1;
			if	($c % 2 == 0)
			{
				echo "<tr bgcolor='navyblue'>";
			}	
			else
			{
				echo "<tr bgcolor='lightblue'>";
			}
			
		  $cont =1;
		  $cont1 = 0;
		  
			foreach ($registro as $columna){
				$cont1 =$cont1 +1;
				
				if($cont1 ==1 or $cont==7){
					echo"<td><font face='arial size='2' color='blue'><b>$columna</b></font></td>";
				}else if($cont==8){
					echo '<td><a href='.$columna.'target=_blank><img src='.$columna.' title=Muestrario width=130 height=80></td>';
				}else
					echo "<td> $columna </td>";
			}
      		$cont++;			
	  }
   
	  //cerrar conexiones y curso de datos
	  mysqli_free_result($recordSet);
	  mysqli_close($conn);
	  echo "<tr><td align=right colspan=9><br><b><font size=3 color=blue face=arial> Total Inventario: $c </font></b></td></tr>"; 
?>
	</table>
</center>
</form>
</body>
</html>
