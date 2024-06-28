<html>
<head>
<script>
            document.addEventListener("DOMContentLoaded", function() {

     let segundos = 0;
        const contadorElemento = document.getElementById('contador');
        console.log(contadorElemento);
        function incrementarContador() {
            segundos++;
            console.log(segundos);
            contadorElemento.textContent = segundos;

            if (segundos === 10) {
                clearInterval(intervalo); // Detener el contador cuando llega a 10
            }
        }

        const intervalo = setInterval(incrementarContador, 1000); // Ejecutar cada segundo
    });
        // Esperar 10 segundos (10000 milisegundos) y luego redirigir
        setTimeout(function() {
            window.location.href = 'accessToken.php'; // Cambia la URL a la que deseas redirigir
        }, 10000);
    </script>
    </head>
    <body>
        <p>Redirigiendo en: </p>
    <p id="contador">0</p>

<?php
session_start();
require __DIR__ . '/vendor/autoload.php';
use Firebase\JWT\JWT;

function generateToken($user_id) {
    $key = 'secret_key'; // Clave secreta para firmar el token
    $payload = array(
        'iss' => 'localhost', // Emisor
        'sub' => $user_id, // Sujeto (ID de usuario)
        'iat' => time(), // Tiempo de emisión
        'exp' => time() + (60 * 60 * 24) // Tiempo de expiración (1 día)
    );
    $token = JWT::encode($payload, $key, 'HS256');
    return $token;
}

// Ejemplo de uso:
$user_id = 123; // ID de usuario autenticado
$jwt_token = generateToken($user_id);
$_SESSION['token']=$jwt_token;
echo "Token JWT generado: $jwt_token";

?>
</body>

</html>