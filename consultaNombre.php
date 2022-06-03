<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Base de Datos introphp | Consulta Por Nombre</title>
    <link rel="stylesheet" href="css/estilos.css">
  </head>
  <body>
    <header>
      <div class="contenedor">
        <div id="marca">
          <h1><span class="resaltado">Base de Datos</span> introphp</h1>
        </div>
        <nav>
          <ul>
          
          </ul>
        </nav>
      </div>
    </header>

    <section id="main">
      <div class="contenedor">
        <article id="main-col">
          <h1>Consultas De Contactos Por Nombre</h1>
          <?php
          if (!isset($_GET['boton'])) {
            echo "
              <form action='consultaNombre.php' method='GET'>
                nombre: <input type='text' name='nombre'/>
                <input type='submit' name='boton' value='Buscar'/>
              </form>
            ";
          }
          else {
            $servidor='localhost';
            $usuario='root';
            $clave="";
            $bd ='gym';

            $conexion = mysqli_connect($servidor, $usuario, $clave, $bd);

            $nombre = $_GET['nombre']; 
        
            $consulta = "SELECT * FROM clientes WHERE nombre='$nombre'";
            $resultado = $conexion->query($consulta);
            $numerofilas = mysqli_num_rows($resultado);
            if ($numerofilas==0) {
              echo "<p>No he encontrado ese contacto: $nombre </p>";
            }
            else {
              $fila=mysqli_fetch_array($resultado);
              echo "<h3>Contacto Encontrado</h3>\n";
              echo "<p>El nombre es: ";
              echo $fila['nombre'];
              echo "<p>Su edad es: ";
              echo $fila['edad'];
              echo "<p>Su correo electrónico es: ";
              echo $fila['correo'];
              echo "<p>su altura es: ";
              echo $fila['altura'];
              echo "<p>Su peso: ";
              echo $fila['peso'];
              echo "<p>cuello: ";
              echo $fila['cuello'];
              echo "<p>regimen: ";
              echo $fila['regimen'];
            

              if($fila=mysqli_fetch_array($resultado)) {
                echo "<h4>Hay más contactos que coinciden con el criterio de busqueda</h4>";
              }
            }
          }
          ?> 
        </article>
    </section>

    <footer>
      <p>Todos los derechos reservados.</p>
    </footer>
    <footer>
      <p>Contactanos<a href="#">49810338285</a>. &copy; .</p>
      <a href="index.html">Regresar</a>
    </footer>
  </body>
</html>
