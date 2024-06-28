<?php
//crear constantes para que no puedan ser modificadas
define('USER', 'root');
define('PASSWORD', '');
define('HOST', 'localhost');
define('DATABASE', 'world');
// example $dsn = 'mysql:host=DBHOST;port=DBPORT;dbname=DBNAME';

try {
    //PDO::ATTR_PERSISTENT => true la conexion no se cierra y se almacena en cache para ser reutilizada
    $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD, array(PDO::ATTR_PERSISTENT => true));
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}
?>