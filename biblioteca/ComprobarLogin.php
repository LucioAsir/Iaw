<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include ("cabecera.php");

// 1. Conexión con el servidor MySQL
$conn = mysqli_connect($servidor, $userBD, $passwdBD);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// 2. Selección de la base de datos
mysqli_select_db($conn, $nomBD);

// 3. Crear la consulta con sprintf y md5
$consulta = sprintf('SELECT * FROM usuarios WHERE nombre="%s" AND clave="%s"', $_POST["nombre"], md5($_POST["clave"]));

// 4. Ejecutar la consulta y comprobar resultados
$result = mysqli_query($conn, $consulta);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo "Bienvenido/a " . $row["nombre"] . " (Autenticación correcta)";
} else {
    echo "Usuario o contraseña incorrectos";
}

// 5. Cerrar la conexión
mysqli_close($conn);
?>