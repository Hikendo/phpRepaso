<?php
//iniciamos la sesion
   session_start();
   //leemos el contenido de la variable sesion 
   echo 'El contenido de $_SESSION[\'svar\'] es ' .
      $_SESSION['svar'] . '<br>';
    //anulamos el acceso a svar de las variables de sesion
   unset ($_SESSION['svar']);
?>
<a href="pagina3.php">Siguiente</a>