<?php
session_start();
require './vendor/autoload.php';

use Firebase\JWT\JWT;
use \Firebase\JWT\Key;

function verifyToken($token) {
    $key = 'secret_key'; // Clave secreta (la misma que usamos para generar el token)
    try {
        
        $decoded = JWT::decode($token,new Key($key, 'HS256'));
        $user_id = $decoded->sub; // ID de usuario extraído del token
        return array('success' => true, 'user_id' => $user_id);
    } catch (Exception $e) {
        return array('success' => false, 'error' => $e->getMessage());
    }
}

// Ejemplo de uso:
$jwt_token = $_SESSION['token']; // Token JWT recibido del cliente
$result = verifyToken($jwt_token);
if ($result['success']) {
    echo "Usuario autenticado con ID: " . $result['user_id'];
} else {
    echo "Error al verificar el token: " . $result['error'];
}
?>