<HTML>
<HEAD>
   <TITLE>Función recupera</TITLE>
</HEAD>
<BODY>
<?PHP
// Función recupera para obtener los valores del formulario
function recupera ($nombre)
{
   $valor = $_REQUEST[$nombre];
   return $valor;
}
?>
</BODY>
</HTML>