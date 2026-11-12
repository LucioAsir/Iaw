# Aplicación Web de Gestión de Biblioteca (PHP + MySQL)

Práctica correspondiente a la **Tarea Q5 (Acceso a bases de datos desde PHP)** del módulo **Implantación de Aplicaciones Web (IAW)** — 2º ASIR.

## Descripción del proyecto

Aplicación web desarrollada en PHP nativo sobre entorno LAMP (Debian 12, Apache 2, MariaDB y PHP) que permite autenticar usuarios, dar de alta libros evitando duplicados por ISBN y consultar el catálogo mediante filtrado por puntuación.

## Estructura del repositorio

```text
biblioteca/
├── cabecera.php          # Parámetros de conexión centralizados a MariaDB
├── login.html            # Formulario de acceso de usuarios
├── ComprobarLogin.php    # Validación de credenciales contra la BD (hash MD5)
├── FormLibros.html       # Formulario de alta de nuevos libros
├── crealibro.php         # Inserción de registros con comprobación de ISBN duplicado
└── FormBuscaLibros.php   # Buscador y listado dinámico filtrado por puntuación
