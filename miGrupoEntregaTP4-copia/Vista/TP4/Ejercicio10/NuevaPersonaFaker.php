<?php
include_once("../../../includes/configuracion.php");
include_once(ROOT_PATH . 'Control/TP4/ControlAuto.php');
include_once(ROOT_PATH . 'Control/TP4/ControlPersona.php');
include_once(STRUCTURE_PATH . "head.php");
//  include_once("../../util/funciones.php");
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mb-5" style="margin-top: 10px;">
  <div class="card w-50 mb-5">
    <div class="card-body mb-5">
      <h5 class="card-title">Resultados:</h5>
      <?php
      $datos = data_submitted();
      $persona = new ControlPersona();
      $datosPersona = $persona->agregarPersonaFaker();
      ?>
      <div class="row justify-content-md-center align-items-center gx-3 gy-3 p-5">
        <?php
        if ($datosPersona instanceof Persona) {
        ?>
          <div class="card" style="width: 18rem;background-color:#b1f8a3;margin-left:40%;margin-top:2%">
            <div class="card-body">
              <h5 class="card-title" style="text-align: center">Muy bien!</h5>
              <h6 class="card-subtitle mb-2 text-muted"></h6>
              <p class="card-text">Se ha ingresado una nueva persona a la base de datos.<br>
                Nombre: <?php echo $datosPersona->getNombre() ?><br>
                Apellido: <?php echo $datosPersona->getApellido() ?><br>
                Dni: <?php echo $datosPersona->getNroDni() ?><br>
                Direccion: <?php echo $datosPersona->getDomicilio() ?><br>
                Telefono: <?php echo $datosPersona->getTelefono() ?><br>
                Fecha nacimiento: <?php echo $datosPersona->getFechaNac()?><br>                
              <a href="../../../index.php" class="card-link">Ir a la lista de personas</a>
            </div>
          </div>

        <?php
        } else {
          echo "No se registran datos.";
        }
        ?>
      </div>

      <div class="d-flex justify-content-end align-items-end mt-4">
        <a href="../../../index.php" class="btn btn-primary">Volver</a>
      </div>
    </div>
  </div>
</main>
<?php
include_once(STRUCTURE_PATH . "footer.php");
?>

</body>

</html>