<?php

	 $estado = "";
      if( !$conn = mysqli_connect("localhost", "root" , "180596", "mercado_libre", "3306") ){		  

         $estado = "Error al conectarse al servidor MySql, revisar parámetros";
      }
      else{
         $estado = "Conexion realizada al servidor";
      }
      $recordSet = mysqli_query($conn, "select * from ARTICULO order by ART_DESCRIPCION;");
?>

<html>
<body bgcolor="white"><br><br>
	 <div align="center"><img src="imagenes/mercadolibre.jpg" width="30%" height="25%"></div>
<form id="frmConexion" name="frmConexion" method="POST">

<center>
  <br><br>


	<table width="80%" border="0">
	  <tr>
		  <td bgcolor="#12228B" align="middle"><font face="arial" size="3" color="white"><b>CLAVE ARTICULO</b></font></td>
		  <td bgcolor="#12228B" align="middle"><font face="arial" size="3" color="white"><b>DESCRIPCION</b></font></td>
		  <td bgcolor="#12228B" align="center"><font face="arial" size="3" color="white"><b>IMAGEN</b></font></td>
		  <td bgcolor="#12228B" align="middle"><font face="arial" size="3" color="white"><b>URL</b></font></td>  
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
				echo "<tr bgcolor='#FDE813'>";
			}	
			else
			{
				echo "<tr bgcolor='#FFFFFF'>";
			}
			
		  $cont =1;
		  $cont1 = 0;
		  //////////////////////////////////////////////
		  $cont2=1;
		  $cont3=0;
		  foreach ($registro as $columna) {
		  	if($cont2 == '4'){
		  		$url[$cont3] = $columna;
		  		echo " $url[$cont3]";
		  		$cont3 = $cont3 + 1;
		  	}
		  	$cont2 = $cont2+1;
		  }
		  ////////////////////////////////////////////
		  $cont3=0;
			foreach ($registro as $columna){
				$cont1 =$cont1 +1;
				if($cont1 =='2')
				{
					$title = $columna;
					echo"<td><font face='arial' size='2'><b>$columna</b></font></td>";
				
				}else if($cont==3){

				echo "<td align='center'><a href=http://$url[$cont3]  target='_blank'><img src='$columna' title='$title' width='130' height='100'></td>";
				$cont3++;
				
			}else
				echo "<td> $columna </td>";
					
				}
      		
      		$cont++;	
		}		
	  
   
	  //cerrar conexiones y curso de datos
	  mysqli_free_result($recordSet);
	  mysqli_close($conn);
?>
	</table>
	<br><br>
</center>
</form>
</body>
</html>
