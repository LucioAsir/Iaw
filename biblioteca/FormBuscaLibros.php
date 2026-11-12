<HTML>
<HEAD>
   <META CHARSET="UTF-8">
   <TITLE>Mostrar Llibres</TITLE>
   <STYLE>
      /* Contenedor general que engloba toda la página con fondo gris y borde negro */
      .contenedor-principal {
         background-color: #e6e6e6;
         border: 1px solid black;
         padding: 20px;
         width: 95%;
         margin: 10px auto;
      }
      .fila-formulario {
         display: flex;
         align-items: center;
         gap: 15px;
         margin-top: 10px;
         margin-bottom: 15px;
         flex-wrap: wrap;
      }
      /* Tabla limpia sin bordes y alineada */
      TABLE { border-collapse: collapse; width: 100%; margin-top: 10px; }
      TH, TD { padding: 6px 15px 6px 0px; text-align: left; vertical-align: top; }
      TH { font-weight: bold; }
   </STYLE>
</HEAD>
<BODY>

<DIV CLASS="contenedor-principal">

   <H2>Mostrar llibres</H2>

   <?php
   // Preparamos las variables vacías por si aún no se ha pulsado el botón
   $sql = "";
   $result = null;
   $busqueda_realizada = false;

   // Solo ejecutamos la conexión y la consulta cuando se pulsa el botón "Envia"
   if (isset($_POST['enviar'])) {
       $busqueda_realizada = true;
       include ("cabecera.php");

       $conn = mysqli_connect($servidor, $userBD, $passwdBD);
       if (!$conn) {
           die("Error de conexión: " . mysqli_connect_error());
       }
       mysqli_select_db($conn, $nomBD);

       $puntuacion_post = $_POST['puntuacion'] ?? '';

       if (empty($puntuacion_post)) {
           $sql = "SELECT * FROM libros";
       } else {
           $sql = sprintf("SELECT * FROM libros WHERE puntuacion='%s'", mysqli_real_escape_string($conn, $puntuacion_post));
       }

       // Imprimimos la consulta SQL justo entre el título y el formulario
       print("<I>" . htmlspecialchars($sql) . "</I><BR>\n");

       $result = mysqli_query($conn, $sql);
   }
   ?>

   <!-- Formulario que se envía a sí mismo -->
   <FORM ACTION="FormBuscaLibros.php" METHOD="POST">
      <DIV CLASS="fila-formulario">
         <SPAN><LABEL>Nom</LABEL> <INPUT TYPE="text" NAME="nombre" SIZE="15"></SPAN>
         <SPAN><LABEL>Autor</LABEL> <INPUT TYPE="text" NAME="autor" SIZE="15"></SPAN>
         <SPAN><LABEL>ISBN</LABEL> <INPUT TYPE="text" NAME="isbn" SIZE="12"></SPAN>
         <SPAN>
            <LABEL>Puntuació</LABEL> 
            <SELECT NAME="puntuacion">
               <OPTION VALUE=""></OPTION>
               <OPTION VALUE="1">1</OPTION>
               <OPTION VALUE="2">2</OPTION>
               <OPTION VALUE="3">3</OPTION>
               <OPTION VALUE="4">4</OPTION>
               <OPTION VALUE="5">5</OPTION>
            </SELECT>
         </SPAN>
         <SPAN><LABEL>Genere</LABEL> <INPUT TYPE="text" NAME="genero" SIZE="12"></SPAN>
         <SPAN><INPUT TYPE="submit" NAME="enviar" VALUE="Envia"></SPAN>
      </DIV>
   </FORM>

   <?php
   // Si se ha realizado una búsqueda, mostramos la tabla debajo del formulario
   if ($busqueda_realizada) {
       if ($result && mysqli_num_rows($result) > 0) {
           print("<TABLE>\n");
           
           while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
               print("<TR>\n");
               print("<TD WIDTH='30'>" . $fila["id"] . "</TD>\n");
               print("<TD WIDTH='300'>" . $fila["nombre"] . "</TD>\n");
               print("<TD WIDTH='200'>" . $fila["autor"] . "</TD>\n");
               print("<TD WIDTH='150'>" . $fila["isbn"] . "</TD>\n");
               print("<TD WIDTH='80'>" . $fila["puntuacion"] . "</TD>\n");
               print("<TD>" . $fila["genero"] . "</TD>\n");
               print("</TR>\n");
           }

           print("</TABLE>\n");
       } else {
           print("<P>No s'han trobat llibres amb eixe criteri.</P>\n");
       }

       mysqli_close($conn);
   }
   ?>

</DIV>

</BODY>
</HTML>