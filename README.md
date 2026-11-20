# Prácticas de Implantación de Aplicaciones Web (IAW) — 2º ASIR

¡Buenas! Este es mi repositorio de prácticas para la asignatura de **Implantación de Aplicaciones Web (IAW)** en 2º de ASIR. Aquí voy subiendo los ejercicios que hacemos sobre servidor LAMP (Debian 12, Apache 2, MariaDB y PHP).

---

## Prácticas de Tablas y Divisores (Raíz del repositorio)

En esta primera tanda de ejercicios estuvimos viendo cómo generar tablas dinámicamente en PHP calculando los divisores de los números que se pasan por formulario, evolucionando desde un archivo único hasta modularizar el código usando funciones e `include`.

### ¿Qué hace cada archivo y cómo se usa?

Para probar cualquiera de estas prácticas, solo tienes que tener levantado Apache y entrar desde el navegador a `http://localhost/~luciomc/<nombre_del_archivo>`:

* `index.php` e `info.php`**: Archivos iniciales de comprobación para ver que Apache y el intérprete de PHP funcionaban bien (`phpinfo()`).

Actividad 1 y 2 — Formularios y funciones en PHP (`tabla1.html`, `tabla1.php`, `tabla2.php`)**:
  * `tabla1.html`**: Es el formulario de entrada donde metes los parámetros (números/filas/columnas) y le das a enviar.
  * `tabla1.php`**: Recibe los datos del formulario anterior y dibuja las dos tablas calculando los divisores mediante bucles en PHP.
  * `tabla2.php`**: Aquí ya empezamos a ordenar un poco el código metiendo la lógica de pintar la tabla y calcular los divisores dentro de una función propia de PHP para no repetir tanto código.

Actividad 3 — Modularización con `include` (`tabla2.html`, `tabla3.php`, `recupera.php`)**:
  * `tabla2.html`**: Hice una copia del formulario original (`tabla1.html`) adaptada para apuntar a los nuevos scripts de esta actividad.
  * `recupera.php`**: Archivo auxiliar que contiene las funciones o la lógica encargada de recoger los datos del formulario y procesar los cálculos.
  * `tabla3.php`**: Es el archivo principal de esta parte; usa `include` para traerse el código de los otros ficheros sin tener que reescribirlo todo en el mismo sitio y pinta el resultado final en pantalla.

---

## Proyecto Biblioteca (`biblioteca/`)

En la carpeta **`biblioteca/`** está la aplicación completa de gestión de libros conectada a **MariaDB** (login con contraseñas en MD5, alta de libros comprobando que no se repita el ISBN y buscador con filtros por puntuación). Tiene su propio `README.md` dentro de la carpeta con los detalles y el script SQL de la base de datos.

---

**Autor:** Lucio Miñano Cubas — 2º ASIR Semipresencial
