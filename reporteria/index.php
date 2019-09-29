<html>
<head>
  <title>Reporteria ATM</title>
  
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="tcal.css" />
  <link rel="stylesheet" type="text/css" href="estilos.css" />
  <script type="text/javascript" src="tcal.js"></script> 
  <script src="jquery-3.4.1.min.js" type="text/javascript"></script>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>

 <div class="col-md-4"></div>

<!-- INICIA LA COLUMNA -->


  <div class="col-md-4">

    <center><h1>REPORTE DE MULTAS</h1></center>
    
	<br></br>

    <form method="POST" action="index.php" >
    <table>
      <tr>
        <td class="form-group">
          Fecha Desde: 
        </td>
        <td>
          <input type="text" name="fecha_desde" class="tcal" id="fecha_desde" placeholder="yyyy-mm-dd">
        </td>
      </tr>
      <tr>
        <td>
          Fecha Hasta:
        </td>
        <td> 
          <input type="text" name="fecha_hasta" class="tcal" id="fecha_hasta" placeholder="yyyy-mm-dd">
        </td>
        <td>
          <img class="imagen" src="atm.png"/>
        </td>
      </tr>
      <tr>
        <td>
          Placa:
        </td>
        <td>   
          <input type="text" name="id_vehiculo" class="placa" id="id_vehiculo" placeholder="AAA-1111">
        </td>
      </tr>

    </table>
    <br></br>
    <tabe>
      <tr>
        <center>
          <input type="submit" value="Consultar" class="btn btn-primary" name="btn_consultar">
        </center>
      </tr>
    </tabe>

  </form>
   <?php
  global $resultados;
    include("abrir_conexion.php");
      
      $id    ="";
      $placa ="";
      $fecha    ="";
      $hora    ="";
      


      if(isset($_POST['btn_consultar']))
      {
		$query = "SELECT d.id_dispositivo, d.placa, d.fecha, d.hora, a.ubicacion FROM $tabla_multas d, $tabla_dispositivos a where a.id_dispositivo=d.id_dispositivo";  
        $placa1 = ($_POST['id_vehiculo']);
        $fecha_desde = $_POST['fecha_desde'];
        $fecha_hasta = $_POST['fecha_hasta'];
       
        if ($placa1!=""){
			$query=$query." and placa='$placa1'";
		}		
		if($fecha_desde!=""){
			$query=$query." and fecha>='$fecha_desde'";
		}
		if($fecha_hasta!=""){
			$query=$query." and fecha<='$fecha_hasta'";
		}
		
		$resultados=mysqli_query($conexion,$query) or die(mysql_error());
		
  ?>
        <form>
          <table border="1">
              <tr class="titulo">
                <th>ID DISPOSITIVO</th>
                <th>PLACA</th>
                <th>FECHA</th>
                <th>HORA</th>
				<th>UBICACION</th>
              </tr>
  <?php
        while($consulta = mysqli_fetch_array($resultados))
        {
  ?>
            
              <tr class="registros">
                <td><?php echo $consulta['id_dispositivo']; ?> </td>
                <td><?php echo $consulta['placa']; ?></td>
                <td><?php echo $consulta['fecha']; ?></td>
                <td><?php echo $consulta['hora']; ?></td>
				<td><?php echo $consulta['ubicacion']; ?></td>
              </tr>
            
  <?php         
        }?>
        </table>
        </form>
    <?php  }
    include("cerrar_conexion.php");
  ?>
 
  </div>


<!-- TERMINA LA COLUMNA -->



  <div class="col-md-4"></div>
</div>
</body>
</html>
