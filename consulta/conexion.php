<?php 
   // Parametros a configurar para la conexion de la base de datos 
   $host = "localhost";    // sera el valor de nuestra BD 
   $basededatos = "placas_mancomunidad";    // sera el valor de nuestra BD 
   $usuariodb = "root";    // sera el valor de nuestra BD 
   $clavedb = "20160502*MovidelNor.EP";    // sera el valor de nuestra BD 

   //Lista de Tablas
   $tabla_db1 = "tab_placas";       // tabla de usuarios
   

   //error_reporting(0); //No me muestra errores
   
   $conexion = new mysqli($host,$usuariodb,$clavedb,$basededatos);


   if ($conexion->connect_errno) {
       echo "Nuestro sitio experimenta fallos....";
       exit();
   }

?>
