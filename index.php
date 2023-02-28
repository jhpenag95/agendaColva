<?php
include "config/conexion.php";

$sql = "SELECT * FROM colaboradores";
$query = mysqli_query($conexion, $sql);

$row = mysqli_fetch_array($query);

$sqlcolaboradores = ("SELECT * FROM colaboradores");
$queryData   = mysqli_query($conexion, $sqlcolaboradores);
$total_client = mysqli_num_rows($queryData);

?>

<!doctype html>
<html lang="es">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!--Google Fonts-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Changa:wght@200;400;700;800&display=swap" rel="stylesheet">
  <!--My Styles-->
  <link rel="stylesheet" href="css/styles.css">

  <title>Tiempos</title>
</head>

<body>

  <head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  </head>


  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Agenda</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item mt-1">
            <button type="button" class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
              Crear usuario
            </button>
          </li>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link active" href="#">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Servicios</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Acerca de</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contacto</a>
              </li>
            </ul>
          </div>
        </ul>
      </div>
    </div>
  </nav>


  <main>
    <section class="mt-5 p-4">
      <div class="container">
        <h1>Tiempos</h1>

        <div class="table-responsive">
          <table id="miTabla" class="table text-center">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Identidad</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Cargo</th>
                <th scope="col">Accción</th>
                <th scope="col">Estado</th>
                <th scope="col">Tiempo</th>
              </tr>
            </thead>

            <tbody>

              <?php foreach ($conexion->query("SELECT * FROM colaboradores") as $row) { ?>

                <tr>
                  <th scope="row"><?php echo $row['id'] ?></th>
                  <td><?php echo $row['indent'] ?></td>
                  <td><?php echo $row['nombreCol'] ?></td>
                  <td><?php echo $row['apellidoCol'] ?></td>
                  <td><?php echo $row['cargoCol'] ?></td>
                  <td>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row['id'] ?>">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                      </svg>
                    </button>
                    <a href="config/deleteCol.php?id=<?php echo $row['id'] ?>" type="button" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                      </svg></a>
                  </td>
                  <td>
                    <button type="button" class="btn btn-primary btn-actividad" onclick="FbotonOn(this)" data-id="<?= $row['indent'] ?>">Disponible</button>
                    <button type="button" class="btn btn-warning btn-actividad " onclick="Fpuase(this)" data-id="<?= $row['indent'] ?>">Pusar</button>
                    <button type="button" class="btn btn-danger" onclick="reiniciar(this, <?= $row['indent'] ?>)">Reiniciar</button>

                  </td>
                  <td>
                    <span class="form-control" type="text" aria-label="readonly input example" data-id="<?= $row['indent'] ?>" id="iniciarCronometro_<?= $row['indent'] ?>" readonly>
                  </td>

                </tr>
                <!-- Modal actualizar-->
                <div class="modal fade" id="exampleModal<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form action="config/actualizarCol.php" method="post" onsubmit="return validar()">
                          <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                          <div class="form-group">
                            <label for="ident">Identidad:</label>
                            <input type="text" class="form-control mb-2" id="ident" name="ident" value="<?php echo $row['indent'] ?>">
                          </div>
                          <div class="form-group">
                            <label for="name">Nombre:</label>
                            <input type="text" class="form-control mb-2" id="name" name="name" value="<?php echo $row['nombreCol'] ?>">
                          </div>
                          <div class="form-group">
                            <label for="ape">Apellido:</label>
                            <input type="text" class="form-control mb-2" id="ape" name="ape" value="<?php echo $row['apellidoCol'] ?>">
                          </div>
                          <div class="form-group">
                            <label for="cargo">Cargo:</label>
                            <input type="text" class="form-control mb-2" id="cargo" name="cargo" value="<?php echo $row['cargoCol'] ?>">
                          </div>
                          <button type="submit" class="btn btn-primary mb-2">Actualizar</button>
                          <button type="button" class="btn btn-danger mb-2" data-bs-dismiss="modal">Cerrar</button>
                        </form>

                      </div>
                    </div>
                  </div>
                </div>


              <?php  } ?>
            </tbody>

          </table>
        </div>

      </div>
    </section>

    <!-- Modal crear-->
    <div class="modal fade " id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Registrar usuario</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="config/insertarCol.php" method="post" onsubmit="return validar()">
              <div class="form-group">
                <label for="ident">Identidad:</label>
                <input type="text" class="form-control mb-2" id="ident" name="ident" required>
              </div>
              <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" class="form-control mb-2" id="name" name="name" required>
              </div>
              <div class="form-group">
                <label for="ape">Apellido:</label>
                <input type="text" class="form-control mb-2" id="ape" name="ape" required>
              </div>
              <div class="form-group">
                <label for="cargo">Cargo:</label>
                <input type="text" class="form-control mb-2" id="cargo" name="cargo" required>
              </div>
              <button type="submit" class="btn btn-primary mb-2">Registrar</button>
              <button type="button" class="btn btn-danger mb-2" data-bs-dismiss="modal">Close</button>
            </form>
          </div>
        </div>
      </div>
    </div>









    <!-- <footer>
      <svg class="footer-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#283747" fill-opacity="1" d="M0,128L30,149.3C60,171,120,213,180,229.3C240,245,300,235,360,224C420,213,480,203,540,213.3C600,224,660,256,720,261.3C780,267,840,245,900,234.7C960,224,1020,224,1080,202.7C1140,181,1200,139,1260,128C1320,117,1380,139,1410,149.3L1440,160L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z">
        </path>
      </svg>
    </footer> -->
  </main>

  <!--Bootstrap-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


  <!-- Importar jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Importar DataTables -->
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>





  <!--MyScript-->
  <!-- <script src="js/script.js"></script> -->
  <!-- <script src="js/paginacionTabla.js"></script> -->
  <script src="js/cambiarSpnTexto.js"></script>
  <script src="js/validarCamposVacios.js"></script>
  <script src="js/cronometro.js"></script>




  <!--Alertas-->
  <!-- <script src="sweetalert2.all.min.js"></script> -->



</body>







</html>