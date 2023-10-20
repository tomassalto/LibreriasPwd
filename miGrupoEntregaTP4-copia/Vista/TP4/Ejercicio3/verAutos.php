
    <?php
    // include_once ("../../Estructura/cabecera.php");
    //  include_once("../../util/funciones.php");
    include_once ("../../../includes/configuracion.php");
    include_once (ROOT_PATH.'Control/TP4/ControlAuto.php');
    include_once (ROOT_PATH.'Control/TP4/ControlPersona.php');
    include_once (STRUCTURE_PATH."head.php");
    ?>
    <main class="p-5 text-center bg-light">
      <h2>Lista de Autos:</h2>
      <?php
        $auto = new ControlAuto();
        $autos = $auto->listarAutos();
        if (count($autos) > 0) {
          ?>
          <div class="row justify-content-md-center align-items-center gx-3 gy-3 p-5">
          <?php
            foreach ($autos as $auto) {
              ?>     
                <div class=" col-lg-3 col-sm-6 col-12" >
                    <div class="card shadow" >
                      <div class="card-header">
                        <h4 class="card-title text-center"><?php echo $auto->getPatente(); ?></h4>
                      </div>
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                          <div class="row">
                            <div class="col-8">
                              <h6 class="card-title text-uppercase text-start"><?php echo $auto->getMarca(); ?></h6>
                            </div>
                            <div class="col-4">
                              <h6 class="card-title text-uppercase text-end"><?php echo $auto->getModelo(); ?></h6>
                            </div>
                          </div>
                        </li>
                          <li class="list-group-item text-center"><h6> <?php echo $auto->getObjDuenio()->getApellido().", ".$auto->getObjDuenio()->getNombre(); ?> </h6></li>
                      </div>  
                    </div>
                    </ul>
                
                <?php  
            } //fin foreach
            ?>
            </div>
          <?php
        } else {
          echo "<br> No se encontraron registros.";
      }
        ?>
</main>
<?php include (STRUCTURE_PATH."footer.php"); ?>

