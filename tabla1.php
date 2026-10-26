<HTML>
<HEAD>
   <TITLE>Actividad 1 - Creación dinámica de una tabla</TITLE>
</HEAD>
<BODY>

<?PHP
print ("<TABLE BORDER='1'>\n");

// Primera fila de la tabla (50-60)
print ("<TR>\n");
print ("<TD BGCOLOR='#6699FF'>&nbsp;</TD>\n");
for ($j=50; $j<=60; $j++)
{
   print ("<TD BGCOLOR='#CC99FF'>$j</TD>\n");
}
print ("</TR>\n");

// Bucle para las filas (divisores del 1 al 10)
for ($i=1; $i<=10; $i++)
{
   // Cambiamos el color según si la fila es par o impar usando if-else
   if ($i % 2 == 0)
      $color = "#FFCC99"; // Color naranja claro para filas pares
   else
      $color = "#FFFF99"; // Color amarillo claro para filas impares

   print ("<TR>\n");
   print ("<TD BGCOLOR='#CC99FF'>$i</TD>\n");

   // Bucle anidado para comprobar divisores del 50 al 60
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