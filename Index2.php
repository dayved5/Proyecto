<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Base de Datos Spartam GYM </title>
    <link rel="stylesheet" href="css/estilos.css">
  </head>
  <body>
    <header>
      <div class="contenedor">
        <div id="marca">
        	<div class="caja">
          <!--<img src="./img/img1.png">-->
          <h1><span class="resaltado">Sparman</span>Gym</h1>
        </div>
    </div>
        <nav>
          <ul>
           
          </ul>
        </nav>
      </div>
    </header>

    <center>
    <table border="16">
      <thead>
        <tr>
        	<tr bgcolor="orange">
          <th colspan="6">Lista De Contactos Gym</th>
        </tr>
      </thead>
      <tbody>
        <tr>
        	<tr bgcolor="bbbbb">
          <td>id</td>
          <td>nombre</td>
          <td>edad</td>
          <td>correo</td>
          <td>altura</td>
          <td>peso</td>
          <td>diametro del cuello</td>
          <td>regimen alimenticio</td>
        </tr>
        <?php
          $servidor='localhost';
          $usuario='root';
          $clave='';
          $bd='gym';

          $conexion=mysqli_connect($servidor, $usuario, $clave, $bd);

          $query = "SELECT * FROM clientes";
          $resultado = $conexion->query($query);
          while($row = $resultado->fetch_assoc()){
          ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['edad']; ?></td>
            <td><?php echo $row['correo']; ?></td>
            <td><?php echo $row['altura']; ?></td>
            <td><?php echo $row['peso']; ?></td>
            <td><?php echo $row['cuello']; ?></td>
            <td><?php echo $row['regimen']; ?></td>
          </tr>
        <?php
          }
        ?>
      </tbody>
    </table>
  </center>
 
        <p>El mejor lugar para entrenar </p>
        <a href="index.html">Regresar</a>
    <footer>
      <p>Todos los derechos reservados</p>
    </footer>
  </body>
</html>

