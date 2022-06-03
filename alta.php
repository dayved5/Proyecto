<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Base de Datos introphp | ALTA DE UN Cliente</title>
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
          <h1>ALTA DE CONTACTOS</h1>
            <?php
            if (!isset($_GET['id'])){
            ?>
            <form method="GET" action="alta.php">
              id: <input type="text" name="id"><br>
              nombre: <input type="text" name="nom"><br>
              edad: <input type="text" name="ed"><br>
              correo: <input type="text" name="co"><br>
              altura: <input type="text" name="al"><br>
              peso: <input type="text" name="peso"><br>
              cuello: <input type="text" name="cuello"><br>
              regimen: <input type="text" name="regimen"><br>
              <input type="submit" value="Enviar">
          </form>
          <?php
          } else {
            $id = $_GET['id'];
            $nombre = $_GET['nom'];
            $edad = $_GET['ed'];
            $correo = $_GET['co'];
            $altura = $_GET['al'];
            $peso = $_GET['peso'];
            $cuello = $_GET['cuello'];
            $regimen = $_GET['regimen'];

            $servidor='localhost';
            $usuario='root';
            $clave='';
            $bd ='gym';

            $conexion = mysqli_connect($servidor, $usuario, $clave, $bd); 
            $consulta = "INSERT INTO clientes (id,nombre,edad,correo,altura,peso,cuello,regimen) VALUES ('$id','$nombre','$edad','$correo','$altura','$peso','$cuello','$regimen');";

            $resultado = $conexion->query($consulta);
            if($resultado) {
              echo "Alta exitosa";
              echo "<script>
          self.location= 'index.html'
        </script>";
            }
            else {
              echo "No se realizo el alta";

            }
          } 
          ?>
        </article>
    </section>
    
    <footer>
      <p><a href="#"></a>. &copy; Contactanos.</p>
    </footer>
  </body>
</html>
