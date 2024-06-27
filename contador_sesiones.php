<?php
   // Iniciamos la sesión en el inicio del script
   // creamos una nueva o recuperamos valores de una ya existente
   session_start();
?>
<HTML>
   <HEAD><TITLE>Saludos</TITLE></HEAD>

   <BODY>
   <H2>Bienvenidos a nuestra página de pruebas de sesiones</H2>
   <?php
      // Si no existe la variable 'visitas', la creamos
      if ( !isset ($_SESSION['visitas']) ) {
         echo "Hola, parece que acabas de llegar. ¡Bienvenido!<BR>";
         // Inicializamos la variable de sesión 'visitas' a 1
         $_SESSION['visitas'] = 1;
      }
      // Si ya existe la variable 'visitas', actualizamos su valor
      else {
         // Recogemos el valor previo que tiene y lo incrementamos
         $visitas = $_SESSION['visitas'] + 1;
         echo '¿Ya estas de vuelta? ';
         echo 'Con esta van ' . $visitas . ' veces<BR>';
         // Actualizamos el valor de la variable de sesión
         $_SESSION['visitas'] = $visitas;
      }
      // Comprobamos si las cookies están activas o no
      $session_id = SID;
      if ( isset ($session_id) && $session_id) {
         $href = $_SERVER['PHP_SELF'] . '?'.
         $session_id;
      }
      else {
         $href = $_SERVER['PHP_SELF'];
      }
     ?>
     <BR>
     <A HREF="<?php echo $href;?>">Vuelve cuando quieras</A>
  </BODY>
</HTML>