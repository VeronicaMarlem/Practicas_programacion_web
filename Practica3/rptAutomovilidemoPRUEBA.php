<?php

	 $estado = "";

      // Se tienen todos los parametros para conectarse ...WORKBENCH Y XAMPP
      if( !$conn = mysqli_connect("localhost", "root" , "180596", "verificentro", "3306") ){		  
    //if( !$conn = mysqli_connect("localhost", "root" , "", "verificentro", "3307") ){	  
         $estado = "Error al conectarse al servidor MySql, revisar parámetros";
      }
      else{
         $estado = "Conexion realizada al servidor";
      }
      // --> Ejecutar una consulta
      $recordSet = mysqli_query($conn, "SELECT AUT_CVE_AUTOMOVIL, AUT_MARCA, AUT_MODELO, AUT_NUMERO_DE_SERIE, AUT_PLACA,
              AUT_SERIE_MOTOR, AUT_TIPO_COMBUSTIBLE, CONCAT(cliente.CLI_CVE_CLIENTE, '-',CLI_NOMBRE, '-', CLI_APELLIDO_PATERNO,
              '(', CLI_CORREO_ELECTRONICO, ')') CVE_CLIENTE, AUT_IMAGEN FROM automovil, cliente WHERE cliente.CLI_CVE_CLIENTE = automovil.CLI_CVE_CLIENTE
              ORDER BY aut_cve_automovil;");

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
          $contador = 0;
          	while ($registro = Mysqli_fetch_row($recordSet)){
              $contador2 = 0;
              if ($contador % 2 == 0){
                  $color = "lightblue";
              }
              else {
                  $color = "navyblue";
              }
              echo '<tr>';
              foreach ($registro as $columna){
                  if ($contador2 == 1 || $contador2 == 7  ){
                       echo '<td bgcolor='.$color.'><b><font color=blue face=arial>'.$columna.'</font></b> </td>';
                  }
                  else {
                      echo '<td bgcolor='.$color.'><font color=blue face=arial>'.$columna.'</font></td>';
                  }
                  $contador2++;
              }
              echo '</tr>';
              $contador++;
          }
          //Cerrar conexiones y cursores de datos
         	mysqli_free_result($recordSet);
			mysqli_close($conn);
          ?>

	</table>
</center>
</form>
</body>
</html>
