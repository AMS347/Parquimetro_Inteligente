<?php 
	// Parametros a configurar para la conexion de la base de datos 
	$host = "52.67.115.36";    // sera el valor de nuestra BD 
	$basededatos = "sistema_multas";    // sera el valor de nuestra BD 
	$usuariodb = "usuarioMultas";    // sera el valor de nuestra BD 
	$clavedb = "ParQui_12345";    // sera el valor de nuestra BD 

	//Lista de Tablas
	$tabla_multas = "multas"; 	   // tabla de multas
	$tabla_dispositivos = "dispositivos"; // tabla de dispositivos

	//error_reporting(0); //No me muestra errores
	
	$conexion = new mysqli($host,$usuariodb,$clavedb,$basededatos);


	if ($conexion->connect_errno) {
	    echo "Nuestro sitio experimenta fallos....";
	    exit();
	}

?>