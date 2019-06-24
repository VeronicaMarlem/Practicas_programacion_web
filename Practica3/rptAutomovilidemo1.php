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

  //EXTRACCIÓN DE LAS VARIABLES EVIADAS DEL CLIENTE(JAVASCRIPT) AL SERVIDOR (PHP)
 if(empty($_GET)){
 		$clave = null;
	  	$placa = null;
	  	$cliente = null;
	  	$marca = null;
	  	$modelo = null;
	  	$serie = null;
	  	$seriemotor = null;
	  	$combustible = null;
	  	$ruta = null;
	  	$op = null;
	  
}else{
	  $clave = $_GET["clave"];
	  $placa = $_GET["placa"];
	  $cliente = $_GET["cliente"];
	  $marca = $_GET["marca"];
	  $modelo = $_GET["modelo"];
	  $serie = $_GET["serie"];
	  $seriemotor = $_GET["seriemotor"];
	  $combustible = $_GET["combustible"];
	  $ruta = $_GET["ruta"];
//----------------------------------------
	  $op = $_GET["op"];
//----------------------------------------

	  //COMPROBACIÓN
	  echo "Envio de variables del servidor al cliente: <br>";
	  echo $clave."<br>";
	  echo $placa."<br>";
	  echo $cliente."<br>";
	  echo $marca."<br>";
	  echo $modelo."<br>";
	  echo $serie."<br>";
	  echo $seriemotor."<br>";
	  echo $combustible."<br>";
	  echo $ruta."<br>";

 //VALIDACION DE LA BANDERA
      if ($op == 1) {
      		//EJECUCIÓN PARA SQL INSERTAR
      	mysqli_query($conn, "INSERT INTO AUTOMOVIL VALUES(NULL,'HXH3161','SONIC 2018','CHEVROLET','ERDS323F','SDFS32S',1,1,'imagenes/Car3.jpg');");
      	
      		mysqli_query($conn, "INSERT INTO AUTOMOVIL VALUES(NULL,'".$placa."','".$modelo."','".$marca."','".$serie."','".$seriemotor."',".$combustible.",".$cliente.",'".$ruta."')");
      		echo "<script language='javascript'>alert('Registro de Automovil exitoso.');</script>";
      		echo "<script language='javascript'>document.location.href='rptAutomovilidemo1.php';</script>";
      }
      else if ($op == 2) {

      	$recordSet = mysqli_query($conn,"select * from AUTOMOVIL where AUT_CVE_AUTOMOVIL='".$clave."';");
			while($registro = mysqli_fetch_row($recordSet)){
			$y=0;
				foreach ($registro as $columna) {
					//echo "registro = ".$columna."<br>";
					if($y==0){
						$clave = $columna; 
						$y++;
						//echo "CLAVE = ".$clave."<br>";
					} else if($y==1){
						$placa = $columna; 
						$y++;
						//echo "PLACA = ".$Placa."<br>";
					} else if ($y==2) {
						$modelo = $columna; 
						$y++;
					} else if ($y==3) {
						$marca = $columna; 
						$y++;
					} else if ($y==4) {
						$serie = $columna; 
						$y++;
					} else if ($y==5) {
						$seriemotor = $columna; 
						$y++;
					} else if ($y==6) {
						$combustible = $columna; 
						$y++;
					} else if ($y==7) {
						$cliente = $columna; 
						$y++;
					} else if ($y==8) {
						$ruta = $columna; 
						$y++;
					}
				}
			}

		mysqli_free_result($recordSet);
		echo "<script language='javascript'>alert('Edita el registro que elegiste, al terminar da clic en Actualizar');</script>";
      }
      else if($op == 3){
      		mysqli_query($conn, "DELETE FROM AUTOMOVIL WHERE AUT_CVE_AUTOMOVIL = '".$clave."';");
      		echo "<script language='javascript'>alert('Eliminación de registro de Automovil exitoso.');</script>";
      		echo "<script language='javascript'>document.location.href='rptAutomovilidemo1.php';</script>";
      }
      else if ($op == 4) {
      		mysqli_query($conn, "UPDATE AUTOMOVIL SET AUT_PLACA='".$placa."', AUT_MODELO='".$modelo."', AUT_MARCA='".$marca."', AUT_NUMERO_SERIE='".$serie."', AUT_SERIE_MOTOR='".$seriemotor."', AUT_TIPO_COMBUSTIBLE='".$combustible."',  CLI_CVE_CLIENTE='".$cliente."',AUT_IMAGEN='".$ruta."' WHERE AUT_CVE_AUTOMOVIL='".$clave."';");
      		echo "<script language='javascript'>alert('Actuaización de registro de Automovil exitoso.');</script>";
      		echo "<script language='javascript'>document.location.href='rptAutomovilidemo1.php';</script>";		
      }
  }
      // --> Ejecutar una consulta
      $recordSet = mysqli_query($conn, "select AUT_CVE_AUTOMOVIL, AUT_PLACA, AUT_MODELO, AUT_MARCA, AUT_NUMERO_SERIE,
              							AUT_SERIE_MOTOR, AUT_TIPO_COMBUSTIBLE, CONCAT(CLIENTE.CLI_CVE_CLIENTE, '-',CLI_NOMBRE, '-',CLI_APELLIDO_PATERNO,'(', CLI_CORREO_ELECTRONICO, ')') CVE_CLIENTE, AUT_IMAGEN FROM automovil,cliente WHERE cliente.CLI_CVE_CLIENTE = automovil.CLI_CVE_CLIENTE
              							ORDER BY AUT_CVE_AUTOMOVIL");
?>
<html>
<body bgcolor="white">

<form id="frmConexion" method="_GET">

<center>
  <font face="arial" size="3" color="midnightblue"><b>Reporte de Automoviles Verificados </b></font>
  <br><br>
  <font face="arial" size="2" color="midnightblue">Estado de la conexion: <?php echo $estado; ?></font>
  <br><br>
	<div>
    <table width="40%" border="0" align="center"> 
      <tr>
        <td>
        	<font face="arial" size="2" color="black">
        		<b>Clave:</b>
        	</font>
        </td>
        <td>
        	<input type="text" name="txtclave" value="<?php if($op==2){echo $clave;} ?>">
        </td>
        <td>
        	<font face="arial" size="2" color="black">
        		<b>Cliente:</b>
        	</font>
        </td>
        <td>
        	<input type="text" name="txtcliente" value="<?php if($op==2){echo $cliente;} ?>"></td>
      </tr>
      <tr>
        <td>
        	<font face="arial" size="2" color="black">
        		<b>Placa:</b>
        	</font>
        </td>
        <td>
        	<input type="text" name="txtplaca" value="<?php if($op==2){echo $placa;} ?>">
        </td>
        <td>
        	<font face="arial" size="2" color="black">
        		<b>Marca:</b>
        	</font>
        </td>
        <td>
          <select name="selmarca">
          	<option selected="">Seleccione</option>
            <option <?php if($op==2 && $marca=='NISSAN'){echo 'selected';} ?> >NISSAN</option>
  			<option <?php if($op==2 && $marca=='HYUNDAY'){echo 'selected';} ?> >HYUNDAY</option>
  			<option <?php if($op==2 && $marca=='BMW'){echo 'selected';} ?> >BMW</option>
  			<option <?php if($op==2 && $marca=='CHEVROLET'){echo 'selected';} ?> >CHEVROLET</option>
  			<option <?php if($op==2 && $marca=='FORD'){echo 'selected';} ?> >FORD</option>
  			<option <?php if($op==2 && $marca=='TOYOTA'){echo 'selected';} ?> >TOYOTA</option>
  			<option <?php if($op==2 && $marca=='HONDA'){echo 'selected';} ?> >HONDA</option>
  			<option <?php if($op==2 && $marca=='AUDI'){echo 'selected';} ?> >AUDI</option>
  			<option <?php if($op==2 && $marca=='AUDI'){echo 'selected';} ?> >KIA</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>
        	<font face="arial" size="2" color="black">
        		<b>Modelo:</b>
        	</font>
        </td>
        <td>
        	<input type="text" name="txtmodelo" value="<?php if($op==2){echo $modelo;} ?>">
        </td>
      </tr>
      <tr>
        <td>
        	<font face="arial" size="2" color="black">
        		<b>No. Serie:</b>
        	</font>
        </td>
        <td>
        	<input type="text" name="txtnumserie" value="<?php if($op==2){echo $serie;} ?>">
        </td>
      </tr>
      <tr>
        <td>
        	<font face="arial" size="2" color="black">
        		<b>Serie Motor:</b>
        	</font>
        </td>
        <td>
        	<input type="text" name="txtseriemotor" value="<?php if($op==2){echo $seriemotor;} ?>">
        </td>
      </tr>
       <tr>
        <td>
        	<font face="arial" size="2" color="black">
        		<b>Combustible:</b>
        	</font>
        </td>
        <td>
          <input type="radio" name="rbtComb1" value="1" <?php if($op==2 && $comb=='1'){echo 'Checked';} ?> >1-Magna
          <input type="radio" name="rbtComb1" value="2" <?php if($op==2 && $comb=='2'){echo 'Checked';} ?> >2-Premium
        </td>
      </tr>
       <tr>
        <td>
        	<font face="arial" size="2" color="black">
        		<b>URL Imagen:</b>
        	</font>
        </td>
        <td>
        	<input type="text" name="txtimagen" value="<?php if($op==2){echo $ruta;} ?>">
        </td>
      </tr>
      <tr>
        <td colspan="4" align="center" width="30%">
	    	<br>
	          <img src="imagenes/ok.gif" width="30" height="30" title="Registrar" onclick="insAuto()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	          <img src="imagenes/icon_edit.GIF" width="30" height="30" title="Modificar" onclick="upAuto()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	          <img src="imagenes/icon_delete.gif" width="30" height="30" title="Eliminar" onclick="delAuto()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	          <img src="imagenes/icon_logalum.GIF" width="30" height="30" title="Actualizar" onclick="actAuto()">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        </td>
      </tr>
    </table> 
  </div> 
  <br><br>
	<table width="80%" border="0" align="center">
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
          $c = 0;
          	while ($registro = Mysqli_fetch_row($recordSet)){
              $c=$c+1;
              if ($contador % 2 == 0){
                  $color = "lightblue";
              }
              else {
                  $color = "navyblue";
              }
              echo '<tr>';
              ////////////////////////////////////////////
              $cont2=0;
              $cont3=0;
              foreach ($registro as $columna) {
                if($cont2 == '8'){
                  $imagen = $columna;
                  $cont3 = $cont3 + 1;
                }
                $cont2 = $cont2+1;
              }
              //////////////////////////////////////////// 
              $contador2 = 0;
              foreach ($registro as $columna){
                  if ($contador2 == 1 || $contador2 == 7){
                      $title = $columna;
                       echo '<td bgcolor='.$color.'><b><font color=blue face=arial>'.$columna.'</font></b> </td>';
                  }else if($contador2==8){
                    $imagen = $columna;
                  		echo '<td bgcolor='.$color.'><a href='.$imagen.' target=_blank><img src='.$columna.' title='.$title.' width=120 height=100></td>';
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
         echo "<tr><td align=right colspan=9><br><b><font size=3 color=blue face=arial> Total Inventario: $c </font></b></td></tr>"; 
          ?>

	</table>
</center>
</form>
</body>
</html>

<script language="javascript">
	function insAuto()
	{
		//alert("Inserta un automovil, pero primero valida los datos capturados...");
		//Extraccion de los valores capturados en la pagina web
		var clave = document.getElementsByName("txtclave");
		var placa = document.getElementsByName("txtplaca");
		var modelo = document.getElementsByName("txtmodelo");	
		var marca = document.getElementsByName("selmarca");
		var serie = document.getElementsByName("txtnumserie");	
		var seriemotor = document.getElementsByName("txtseriemotor");
		var combustible = document.getElementsByName("rbtComb1");
		var cliente = document.getElementsByName("txtcliente");
		var ruta = document.getElementsByName("txtimagen");

		alert(clave[0].value);
		alert(placa[0].value);
		alert(modelo[0].value);
		alert(marca[0].value);
		alert(serie[0].value);
		alert(seriemotor[0].value);
		alert(cliente[0].value);
		alert(ruta[0].value);
		alert(combustible[0].value); // <------------------
		alert(combustible[0].checked);*/ // <----------------

		//-------------------------------------------------------------
		//AGREGAR EN EL QUERYSTRING UNA VARIABLE ---> BANDERA
		// op = 1 --> INSERT
		// op = 2 --> UPDATE
		// op = 3 --> DELETE
		if (combustible[0].checked) {
			combustible='1';
		}
		else{
			combustible='2';
		}
		// Construir la cadena de consulta (QUERYSTRING) para evitar al servidor php

		document.location.href = "rptAutomovilidemo1.php?op=1&clave=" + clave[0].value 
									+ "&placa=" + placa[0].value 
									+ "&modelo=" + modelo[0].value									
									+ "&marca=" + marca[0].value									
									+ "&serie=" + serie[0].value
									+ "&seriemotor=" + seriemotor[0].value
									+ "&combustible=" + combustible[0].value
									+ "&cliente=" + cliente[0].value 
									+ "&ruta=" + ruta[0].value;
	}
	function updAuto(){

		var clave = document.getElementById("txtclave");
		if(clave[0].value == ""){
			alert("Teclea una clave para modificar");
		}
		else{
			document.location.href="rptAutomovilidemo1.php?op=2&clave="+clave[0].value+"&placa=null&modelo=null&marca=null&serie=null&seriemotor=null&combustible=null&cliente=null&ruta=null ";
		}
	}
	function actAuto(){
		var clave = document.getElementsByName("txtclave");
		var placa = document.getElementsByName("txtplaca");
		var modelo = document.getElementsByName("txtmodelo");
		var marca = document.getElementsByName("selmarca");
		var serie = document.getElementsByName("txtnumserie");		
		var seriemotor = document.getElementsByName("txtseriemotor");
		var combustible = document.getElementsByName("rbtComb1");
		var cliente = document.getElementsByName("txtcliente");
		var ruta = document.getElementsByName("txtimagen");
		if(combustible[0].checked){
			combustible='1';
		}
		else{
			combustible='2';
		}
		if(clave[0].value == "" || placa[0].value=="" || modelo[0].value=="" || serie[0].value=="" || seriemotor[0].value=="" || cliente[0].value=="" || ruta[0].value=="" ){
			alert("No debes de tener ningun campo vacio \n       modifica y despues actualiza");
		}else {
			document.location.href="rptAutomovilidemo1.php?op=4&clave="+clave[0].value+"&placa="+placa[0].value+"&modelo="+modelo[0].value+"&marca="+marca[0].value+"&serie="+serie[0].value+"&seriemotor="+seriemotor[0].value+"&combustible="+combustible+"&cliente="+cliente[0].value+"&ruta="+ruta[0].value;
		}
	}
	function delAuto(){

		var clave = document.getElementById("txtclave");
		if(clave[0].value == ""){
			alert("Teclea una clave para modificar");
		}
		else{
			document.location.href="rptAutomovilidemo1.php?op=3&clave="+clave[0].value+"&placa=null&modelo=null&marca=null&serie=null&seriemotor=null&combustible=null&cliente=null&ruta=null";
		}
	}
</script>
