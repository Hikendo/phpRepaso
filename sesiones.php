<?php
//podemos obviar llamar a session_start configurando el php.ini con session.auto_start

//Iniciamos la sesion
   session_start();
   //definimos el valor de la sesion con el array superglobal **$_SESSION**
   $_SESSION['svar']='Hola a todos';
//comprobamos que la variable de sesion exista
   if (isset ($_SESSION['svar']) === TRUE) {
   //imprimimos el valor de la sesion
   
   echo 'El contenido de $_SESSION[\'svar\'] es ' .
      $_SESSION['svar'] . '<br>';
   }
?>
<a href="pagina2.php">Siguiente</a>