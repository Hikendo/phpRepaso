<?php
   session_start();
   //la variable no se puede acceder por que la anulamos anteriormente
   echo 'El contenido de $_SESSION[\'svar\'] es ' .
      $_SESSION['svar'] . '<br>';
      //terminamos la sesion, cuidado por que si no se anulan las variables, sesion destroy no eliminara las variables asociadas
   session_destroy();
?>
<a href="sesiones.php">Inicio</a>