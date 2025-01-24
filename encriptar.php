<?php
// Contraseña que deseas encriptar
$password = "123";

// Encriptar la contraseña usando password_hash()
$passwordEncriptada = password_hash($password, PASSWORD_DEFAULT);

// Mostrar el resultado
echo "Contraseña original: " . $password . "<br>";
echo "Contraseña encriptada: " . $passwordEncriptada . "<br>";
?>
