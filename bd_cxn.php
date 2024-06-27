<?php 
//Para levantar el debug
//error_reporting(E_ALL);

$server='localhost';
$user='root';
$pass='';
$db= 'world';
//no dejes espacios en la cadena PDO(PHP Data Object)


    try {
        //Conexion a la base de datos
        $cxn= new PDO("mysql:host=$server;dbname=$db", $user, $pass);

            // Configurar el modo de manejo de errores, los modos son:
            //Modo Silencioso -> PDO::ERRMODE_SILENT(por defecto)

            //Modo Advertencia -> PDO::ERRMODE_WARNING

            //Modo Excepción -> PDO::ERRMODE_EXCEPTION

        $cxn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        

    } catch (PDOException $e) {
        // Manejo de la excepción y obtiene el error de la variable
        echo "Se ha producido un error: " . $e->getMessage();
    } 


  //  var_dump($cxn);
  //  var_dump($resultado );

?>
