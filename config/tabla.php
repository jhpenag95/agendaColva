<section class="mt-5 p-4">
  <div class="container">


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
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                  </svg>
                </button>
                <a href="config/deleteCol.php?id=<?php echo $row['id'] ?>" type="button" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                  </svg></a>
              </td>
              <td><button type="button" class="btn btn-primary btn-actividad mx-4" id="botonOn" onclick="FbotonOn()">Disponible</button><button type="button" class="btn btn-danger" id="reinicarCronometro">Reiniciar</button>
              </td>
              <td id="iniciarCronometro">

              </td>
            </tr>


            <!-- Modal actualizar-->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

          <?php
          }
          ?>
        </tbody>

      </table>
    </div>
    <div class="table-responsive ">
      <table id="example" class="table table-hover text-center" style="width:100%">
        <thead>
          <tr>
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
              <td><?php echo $row['indent'] ?></td>
              <td><?php echo $row['nombreCol'] ?></td>
              <td><?php echo $row['apellidoCol'] ?></td>
              <td><?php echo $row['cargoCol'] ?></td>
              <td>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                  </svg>
                </button>
                <a href="config/deleteCol.php?id=<?php echo $row['id'] ?>" type="button" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                  </svg></a>
              </td>
              <td>
                <button type="button" class="btn btn-primary btn-actividad mx-4" id="botonOn" onclick="FbotonOn()" data-id="<?php echo $row['id']; ?>">Disponible</button>

                <button type="button" class="btn btn-danger" id="reinicarCronometro">Reiniciar</button>
              </td>
              <td id="iniciarCronometro">

              </td>
            </tr>
            <!-- Modal actualizar-->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</section>