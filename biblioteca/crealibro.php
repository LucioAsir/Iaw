<?php
include ("cabecera.php");

// 1. Mostrar $_POST por pantalla para depuración
echo "<H3>Datos recibidos por POST:</H3>";
echo "<pre>";
print_r($_POST);
echo "</pre>";

// Recogemos las variables del formulario
$nombre = $_POST['nombre'];
$autor = $_POST['autor'];
$isbn = $_POST['isbn'];
$puntuacion = $_POST['puntuacion'];
$genero = $_POST['genero'];

// 2. Conectarnos al servidor MySQL y seleccionar la base de datos
$conn = mysqli_connect($servidor, $userBD, $passwdBD);
if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}
mysqli_select_db($conn, $nomBD);

// 3. Comprobar si ya existe un libro con el mismo ISBN
$consulta_comprobar = sprintf('SELECT * FROM libros WHERE isbn="%s"', $isbn);
$resultado = mysqli_query($conn, $consulta_comprobar);

if (mysqli_num_rows($resultado) > 0) {
    echo "<P STYLE='color: red;'>Error: Ya existe un libro registrado con el ISBN '$isbn'.</P>";
} else {
    // 4. Si no existe, realizamos la inserción con INSERT
    $consulta_insertar = sprintf(
        'INSERT INTO libros (nombre, autor, isbn, puntuacion, genero) VALUES ("%s", "%s", "%s", "%s", "%s")',
        $nombre, $autor, $isbn, $puntuacion, $genero
    );

    if (mysqli_query($conn, $consulta_insertar)) {
        echo "<P STYLE='color: green;'>¡Libro insertado correctamente en la base de datos!</P>";
    } else {
        echo "<P STYLE='color: red;'>Error al insertar el libro: " . mysqli_error($conn) . "</P>";
    }
}

// 5. Cerrar la conexión
mysqli_close($conn);
?>

<BR>
<A HREF="FormLibros.html">Añadir otro libro</A>