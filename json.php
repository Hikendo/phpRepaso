<?php
//obtener el json, este se puede recibir por un post o hacer una peticion get
$people_json = file_get_contents('https://hikendo.github.io/profile/assets/profile.json');
//Comprobamos que se pueda leer
if($people_json===FALSE){
echo 'no se pudo obtener el json';
}
//decodificamos el json
$decoded_json = json_decode($people_json, true);
//imprimimos su resultado

$nombre = $decoded_json['profesionalProfile']['name'];
$email = $decoded_json['profesionalProfile']['data']['email'];
$telefono = $decoded_json['profesionalProfile']['data']['phoneNumber'];
$direccion = $decoded_json['profesionalProfile']['data']['address'];
$linkedin = $decoded_json['profesionalProfile']['data']['linkedin'];
$github = $decoded_json['profesionalProfile']['data']['github'];
$urlPersonal = $decoded_json['profesionalProfile']['data']['url'];
$imagenUrl = $decoded_json['profesionalProfile']['data']['imgUrl'];

// Imprimir los valores
echo "Nombre: $nombre\n<br>";
echo "Email: $email\n<br>";
echo "Teléfono: $telefono\n<br>";
echo "Dirección: $direccion\n<br>";
echo "LinkedIn: $linkedin\n<br>";
echo "GitHub: $github\n<br>";
echo "URL Personal: $urlPersonal\n<br>";
echo "URL de la Imagen: $imagenUrl\n<br>";

echo '<br> codificado en json por json_encode <br>';
//var_dump($decoded_json) ;
$perfilProfesional = [
    'nombre' => $nombre,
    'email' => $email,
    'telefono' => $telefono,
    'direccion' => $direccion,
    'linkedin' => $linkedin,
    'github' => $github,
    'urlPersonal' => $urlPersonal,
    'imagenUrl' => $imagenUrl
]
;

//Podemos acceder a las propiedades de nuestro json decodificado usando las key value de nuestro array associativo generado 
//foreach($decoded_json as $key => $value) {
//    $name = $decoded_json[$key]["name"];
//    $age = $decoded_json[$key]["age"];
//    
//    echo $name.' is '.$age.' years old.';
//}
// Convertir el array a formato JSON
// la bandera JSON_PRETTY_PRINT es usada para añadir espacios en blanco y así dar un formato adecuado a la cadena JSON
$jsonPerfilProfesional = json_encode($perfilProfesional, JSON_PRETTY_PRINT);

//Si tenemos cualquier error podemos ver el mensaje con:
//echo json_last_error_msg();

// Imprimir el JSON
echo $jsonPerfilProfesional;
?>