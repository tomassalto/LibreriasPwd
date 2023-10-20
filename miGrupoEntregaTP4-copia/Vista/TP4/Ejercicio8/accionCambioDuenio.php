
<?php
    include_once ("../../../includes/configuracion.php");
    include_once (ROOT_PATH.'Control/TP4/ControlAuto.php');
    include_once (ROOT_PATH.'Control/TP4/ControlPersona.php');
    include_once (STRUCTURE_PATH."head.php");
 
  //  include_once("../../util/funciones.php");
    ?> 
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mb-4" style="margin-top: 10px;">
    <div class="card w-50 mb-4">
    <div class="card-body">
      <h5 class="card-title">Datos:</h5>
      <?php
      $datos=data_submitted();
      $auto=new ControlAuto();
      $persona=new ControlPersona();
      $duenio=$persona->buscarPersona($datos);
      if($duenio)
      {$modificacion= $auto->modificarDuenio($datos);
        echo $modificacion;}
      else{
        echo "No se encontro ninguna persona registrada con ese DNI";
      }
        ?>
        <div class="d-flex justify-content-end align-items-end mt-4 pr-3 pb-3">
            <a href="cambioDuenio.php" class="btn btn-primary">Volver</a>
        </div>
    </div>
  </div>
</main>
    <?php
 include_once (STRUCTURE_PATH."footer.php");      
    ?>

</body>
</html>
