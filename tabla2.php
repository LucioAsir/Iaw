<HTML>
<HEAD>
   <TITLE>Actividad 2 - Formulario y recepcción en una función en PHP</TITLE>
   <STYLE>
      TABLE, TD { border: 2px solid green; }
   </STYLE>
</HEAD>
<BODY>

<?PHP
// Función recupera para obtener los valores del formulario
function recupera ($nombre)
{
   $valor = $_REQUEST[$nombre];
   return $valor;
}

// Llamamos a la función recupera para los dos números
$n1 = recupera ("num1");
$n2 = recupera ("num2");

print ("<TABLE BORDER='1'>\n");

// Primera fila de la tabla (50-60)
print ("<TR>\n");
print ("<TD BGCOLOR='#6699FF'>&nbsp;</TD>\n");
for ($j=50; $j<=60; $j++)
{
   print ("<TD BGCOLOR='#CC99FF'><B>$j</B></TD>\n");
}
print ("</TR>\n");

// Bucle para las filas (divisores del n1 al n2)
for ($i=$n1; $i<=$n2; $i++)
{
   // Cambiamos el color según si la fila es par o impar usando if-else
   if ($i % 2 == 0)
      $color = "#FFCC99"; // Color naranja claro para filas pares
   else
      $color = "#FFFF99"; // Color amarillo claro para filas impares

   print ("<TR>\n");
   print ("<TD BGCOLOR='#CC99FF'>$i</TD>\n");

   // Bucle anidado para comprobar divisores
   for ($j=50; $j<=60; $j++)
   {
      if ($j % $i == 0)
         print ("<TD BGCOLOR='$color'>*</TD>\n");
      else
         print ("<TD BGCOLOR='$color'>-</TD>\n");
   }

   print ("</TR>\n");
}

print ("</TABLE>\n");
?>

</BODY>
</HTML>