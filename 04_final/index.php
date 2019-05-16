<?php
require_once("db/database_utilities.php");
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Practica 06 | Ejercicio 1</title>
  <link rel="stylesheet" href="./css/foundation.css" />
  <script src="./js/vendor/modernizr.js"></script>
</head>

<body>
  <?php require_once('header.php'); ?>
  <div class="row">
    <div class="large-9 columns">
      <h3>Ejercicio 1</h3>
      <div class="section-container tabs" data-section>
        <section class="section">
          <div class="content" data-slug="panel1">
            <div class="row">
            </div>
            <table>
              <thead>
                <th>Usuarios</th>
                <th>Tipos</th>
                <th>Estatus</th>
                <th>Accesos</th>
                <th>Usuarios Activos</th>
                <th>Usuarios Inactivos</th>
              </thead>

              <tbody>
                <tr>
                  <td><?php echo (contadorUsers())?></td>
                  <td><?php echo (contadorTypes())?></td>
                  <td><?php echo (contadorStatus())?></td>
                  <td><?php echo (contadorAccess())?></td>
                  <td><?php echo (contadorActives())?></td>
                  <td><?php echo (contadorInactives())?></td>
                </tr>
              </tbody>
            </table>
          </div>

          <?php
          #Nombre de tablas.
          $tables = ["estatus", "user", "User_log", "user_type"];
          #Columnas
          $columns = [["id", "nombre"], ["id", "email", "pssw", "estatus_id", "user_type_id"], ["id", "date_logged", "user_id"], ["id", "nombre"]];
          #Número de tablas
          $contador = 0;




          foreach ($tables as $tab) 
          {
            $r = allF($tab);
            echo ("Tabla: " . $tab);
            ?>
            <table>
              <thead>
                
                
                <?php
                #PRIMERA FILA
                for ($i = 0; $i < count($columns[$contador]); $i++) 
                {
                  echo ("<th>" . $columns[$contador][$i] . "</th>");
                }
                $c = $r->rowCount();
                ?>
              </thead>
              <tbody>
                <?php
                # filas y columnas
                for ($i = 0; $i < $c; $i++) 
                {
                  $d = $r->fetch(PDO::FETCH_ASSOC);
                  ?>
                  <tr>
                    <?php
                    for ($j = 0; $j < count($columns[$contador]); $j++) 
                    {
                      echo ("<td>" . $d[$columns[$contador][$j]] . "</td>");
                    }
                    ?>
                  </tr>
                <?php
              }
              ?>
              </tbody>
            </table>
            <?php
            $contador++;
          }
          ?>
        </section>
      </div>
    </div>
  </div>

  <?php require_once('footer.php'); ?>