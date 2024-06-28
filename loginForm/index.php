<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header('Location: login.php');
    exit;
} else {
    
        $userNmae= $_SESSION['user_name'];

        echo "<h1>Hola $userNmae</h1> ";
        echo 'la sesion durara 10 segundos por que es una prueba ';
        echo date('h:i:s') . "\n";

       
        $segundos=10;
        echo '<br>cerrando sesion ';

        session_unset();
        session_destroy();
        header("Refresh:" . $segundos);

    // Show users the page! 
}
?>