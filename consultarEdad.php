<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Base de Datos GYM | Consulta Por Edad</title>
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
            <li><a href="index.php">Inicio</a></li>
            <li><a href="alta.php">Alta</a></li>
            <li class="actual"><a href="Consulta.php">Consulta</a></li>
            <li><a href="Eliminar.php">Eliminar</a></li>
          </ul>
        </nav>
      </div>
    </header>

    <section id="main">
      <div class="contenedor">
        <article id="main-col">
          <h1>Consultas De Clientes Por Edad</h1>
          <?php
          if (!isset($_GET['boton'])) {
            echo "
              <form action='consultarEdad.php' method='GET'>
                edad: <input type='text' name='edad'/>
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

            $edad = $_GET['edad']; 
        
            $consulta = "SELECT * FROM clientes WHERE edad='$edad'";
            $resultado = $conexion->query($consulta);
            $numerofilas = mysqli_num_rows($resultado);
            if ($numerofilas==0) {
              echo "<p>No he encontrado ese contacto: $edad </p>";
            }
            else {
              echo "
                <table>
                <tr>
                <th>nombre</th>
                <th>edad</th>
                <th>correo</th>
                <th>altura</th>
                <th>peso</th>
                <th>cuello</th>
                <th>regimen</th>
                
                </tr>
              ";
              while ($fila=mysqli_fetch_array($resultado)) {
                echo "<tr>";
                echo "<td>".$fila['nombre']."</td>";
                echo "<td>".$fila['edad']."</td>";
                echo "<td>".$fila['correo']."</td>";
                echo "<td>".$fila['altura']."</td>";
                echo "<td>".$fila['peso']."</td>";
                echo "<td>".$fila['cuello']."</td>";
                echo "<td>".$fila['regimen']."</td>";
                
                echo "</tr>";    
              }
              echo "</table>";
            }
          }
          ?> 
        </article>
    </section>

    <footer>
      <p>Contactanos<a href="#">4981033828</a>. &copy; ISC.</p>
      <a href="index.html">Regresar</a>
    </footer>
  </body>
</html>
