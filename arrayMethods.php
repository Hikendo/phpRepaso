<?php
//Funcion para generar el cubo de un elemento numerico
function cube($n) {
    return $n * $n * $n;
}

$a = [1, 2, 3, 4, 5];

//"cube" es la funcion y $a el argumento que se le pasa a la funcion
$b = array_map("cube", $a);
print_r($b);



?>
<?php
function impar($var) {
    return $var & 1;
}

function par($var) {
    return !($var & 1);
}

$numeros = [1, 2, 3, 4, 5];
$impares = array_filter($numeros, "impar");
$pares = array_filter($numeros, "par");

print_r($impares);
print_r($pares);
?>
<?php
function suma($carry, $item) {
    $carry += $item;
    return $carry;
}

$a = [1, 2, 3, 4, 5];
$resultado = array_reduce($a, "suma");

echo "La suma de los elementos del array es: $resultado";
?>
<?php
$numeros = [5, 2, 8, 1, 3];
sort($numeros);

echo "Orden ascendente: ";
print_r($numeros);
?>
<?php
$frutas = ["manzana", "naranja", "plátano", "limón"];
rsort($frutas);

echo "Orden descendente: ";
print_r($frutas);
?>
<?php
$lenguajes = ["go", "javascript", "php", "c#"];
$longitud = count($lenguajes);

echo "La longitud del array es: $longitud";
?>
<?php
$vacío = [];
if (count($vacío) === 0) {
    echo "El array está vacío";
} else {
    echo "El array no está vacío";
}
?>
<?php
$cadena = "¡Hola, mundo!";
$longitud = strlen($cadena);

echo "La longitud de la cadena es: $longitud";
?>

<?php
$cadena = "¡Hola, mundo!";
$subcadena = substr($cadena, 0, 5); // Obtiene los primeros 5 caracteres

echo "Subcadena: $subcadena";
?>
<?php
$frase = "Me gusta programar en PHP.";
$nuevaFrase = str_replace("PHP", "Python", $frase);

echo "Nueva frase: $nuevaFrase";
?>
