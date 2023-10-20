<?php

require_once('C:\xampp\htdocs\Proyecto\vendor\fzaninotto\faker\src\autoload.php');
require_once 'C:\xampp\htdocs\Proyecto\vendor\autoload.php';
// ControlAuto.php
class ControlAuto
{

    public function agregarAuto($datos)
    {
        if (!$exist) {
            $patente = $datos["patente"];
            $marca = $datos["marca"];
            $modelo = $datos["modelo"];
            // Verifica si el dueño existe en la base de tabla persona
            $persona = new ControlPersona();
            $personaEncontrada = $persona->buscarPersona($datos);
            if ($personaEncontrada !== null) {
                // El dueño existe en la base de datos, proceder a crear el registro del auto
                $auto = new Auto();
                $auto->setPatente($patente);
                $auto->setMarca($marca);
                $auto->setModelo($modelo);
                $auto->setObjDuenio($personaEncontrada);
                if ($auto->insertar()) {
                    $retorno = "Auto cargado con exito.";
                } else {
                    $retorno = "No se pudo cargar auto nuevo.";
                }
            } else { // El dueño no existe en la base de datos
                $retorno = 0;
            }
        } else {
            $retorno = "Esa patente ya existe.";
        }
        return $retorno;
    }




    public function modificarAuto($datos)
    {
        $patente = $datos["patente"];
        $marca = $datos["marca"];
        $modelo = $datos["modelo"];
        $nroDniDuenio = $datos["nroDni"];
        $duenio = new Persona();
        $duenio->setNroDni($nroDniDuenio);

        $auto = new Auto();
        $auto->setear($patente, $marca, $modelo, $duenio);

        if ($auto->modificar()) {
            $operacion = "Auto modificado con éxito.";
        } else {
            $operacion = "Error al modificar el auto: " . $auto->getmensajeoperacion();
        }
        return $operacion;
    }


    public function modificarDuenio($datos)
    {
        $nroDniDuenio = $datos["DNI"];

        // Busca el auto por la patente
        $auto = $this->buscarAuto($datos);

        if ($auto) {
            // Modifica al dueño del auto
            $duenio = new Persona();
            $duenio->setNroDni($nroDniDuenio);
            $auto->setObjDuenio($duenio);

            // Realiza la operación de actualización
            if ($auto->modificar()) {
                $operacion = "Dueño del auto modificado con éxito.";
            } else {
                $operacion = "Actualmente ese DNI es el dueño del auto.";
            }
        } else {
            $operacion = "No se encontró un auto con la patente proporcionada.";
        }
        return $operacion;
    }


    public function eliminarAuto($datos)
    {
        $patente = $datos["patente"];
        $auto = new Auto();
        $auto->setPatente($patente);

        if ($auto->eliminar()) {
            $operacion = "Auto eliminado con éxito.";
        } else {
            $operacion = "Error al eliminar el auto: " . $auto->getmensajeoperacion();
        }
        return $operacion;
    }

    public function listarAutos()
    {
        $auto = new Auto();
        return $auto->listar();
    }


    public function buscarAuto($datos)
    {
        $autos = $this->listarAutos();
        $autoIngresado = $datos["patente"];
        $patenteNormalizada = strtolower(str_replace(' ', '', $autoIngresado)); //se convierte a minuscula y se sacan los espacios 
        $autoEncontrado = null;
        foreach ($autos as $auto) {
            $autoPatente = $auto->getPatente();
            $autoNormalizado = strtolower(str_replace(' ', '', $autoPatente)); //se convierte a minuscula y se sacan los espacios 
            if ($patenteNormalizada === $autoNormalizado) { //se compara los datos normalizados para que se encuentre la patente 
                $autoEncontrado = $auto;
                break; // Terminar el bucle cuando se encuentre un auto
            }
        }

        if (!$autoEncontrado) {
            $autoEncontrado = null;
        }

        return $autoEncontrado; //retorna el objAuto
    }


    public function buscarDuenio($datos)
    {
        $autos = $this->listarAutos();
        $dniIngresado = $datos["DNI"];
        $dniEncontrado = "";

        foreach ($autos as $auto) {
            if ($dniIngresado === $auto->getObjDuenio()->getNroDni()) {
                $dniEncontrado .=
                    "Patente: " . $auto->getPatente() . "<br>"
                    . "Marca: " . $auto->getMarca() . "<br>"
                    . "Modelo: " . $auto->getModelo() . "<br>" .
                    "------------------------------------------<br>";
            }
        }

        if ($dniEncontrado === "") {
            $dniEncontrado = "No se encontraron registros de autos.";
        }

        return $dniEncontrado;
    }

    function agregarAutoFaker()
    {


        $faker = (new \Faker\Factory())::create();
        // Genera una patente aleatoria con el formato XXX-000
        $patente = $faker->regexify('[A-Z]{3}-\d{3}');
        // Genera una marca de vehículo aleatoria que coincide con la expresión regular
        $marca = $faker->regexify('(Toyota|Honda|Ford|Chevrolet|Volkswagen|Nissan|Hyundai|Kia|Mazda)');
        // Lista de modelos de vehículos personalizados
        $modelos = ["Sedán", "Camioneta", "SUV", "Deportivo", "Familiar"];
        // Selecciona un modelo aleatorio de la lista
        $modelo = $faker->randomElement($modelos);       
        $auto = new Auto();
        $auto->setearFaker($patente, $marca, $modelo);
       
        if ($auto->insertarFaker()) {
            // $operacion = true;
            return $auto;
        } else {
            // $operacion = false;
            return null;
        }        
    }
}
