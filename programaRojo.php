<?php
include_once("tateti.php");

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github */
/* ... COMPLETAR ... */





/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/
/** Visualizar el menu de opciones
 * @param int $eleccion
 * @return int
 */

 function seleccionarOpcion () {
     echo "1) Jugar tateti
    2) Mostrar un juego
    3) Mostrar el primer juego ganador
    4) Mostrar porcentaje de juegos ganados
    5) Mostrar resumen de Jugador
    6) Mostrar listado de juegos Ordenado por jugador O
    7) Salir \n";
    echo "Que opcion desea ingresar?: ";
    
    //Establecemos el rango de opciones validas que hay en el menu
    $opcionValida1 = 1;
    $opcionValida2 = 7;
    $eleccion = solicitarNumeroEntre($opcionValida1, $opcionValida2);
    return $eleccion;
 }

 /** Inicializa una estructura de datos con ejemplos de juegos
  * @return array
  */

  function cargarJuegos(){
      $juegos = [];
      $juegos[0] = [
        "jugadorCruz" => "jero",
        "jugadorCirculo" => "roberto",
        "puntosCruz" => 5,
        "puntosCirculo" => 0
    ];
    $juegos[1] = [
        "jugadorCruz" => "matias",
        "jugadorCirculo" => "naza",
        "puntosCruz" => 1,
        "puntosCirculo" => 1
    ];
    $juegos[2] = [
        "jugadorCruz" => "naza",
        "jugadorCirculo" => "romina",
        "puntosCruz" => 6,
        "puntosCirculo" => 0
    ];
        $juegos[3] = [
        "jugadorCruz" => "jero",
        "jugadorCirculo" => "sofia",
        "puntosCruz" => 0,
        "puntosCirculo" => 5
    ];
    $juegos[4] = [
        "jugadorCruz" => "agustin",
        "jugadorCirculo" => "roberto",
        "puntosCruz" => 1,
        "puntosCirculo" => 1
    ];
    $juegos[5] = [
        "jugadorCruz" => "matias",
        "jugadorCirculo" => "romina",
        "puntosCruz" => 0,
        "puntosCirculo" => 5
    ];
    $juegos[6] = [
        "jugadorCruz" => "roberto",
        "jugadorCirculo" => "sofia",
        "puntosCruz" => 1,
        "puntosCirculo" => 1
    ];
    $juegos[7] = [
        "jugadorCruz" => "agustin",
        "jugadorCirculo" => "facundo",
        "puntosCruz" => 1,
        "puntosCirculo" => 1
    ];
    $juegos[8] = [
        "jugadorCruz" => "felipe",
        "jugadorCirculo" => "marcelo",
        "puntosCruz" => 5,
        "puntosCirculo" => 0
    ];
    $juegos[9] = [
        "jugadorCruz" => "flor",
        "jugadorCirculo" => "carlos",
        "puntosCruz" => 0,
        "puntosCirculo" => 5
    ];
    return($juegos);
  }

  /** Muestra los datos de un juego elegido
   * @param int @numJuego
   * 
   */

   function mostrarJuego() {
        echo "Ingrese un número de juego: ";
        $numero = trim(fgets(STDIN));
        $obtenerJuegos = cargarJuego() ;
        $n = count($obtenerJuego);
        $i = 0;
        while (!is_int($numero) && ($numero >= $n)) {
            echo "Ingrese un numero de juego valido: ";
            $numero = trim(fgets(STDIN));
        }
        if($obtenerJuegos[$numero]["puntosCruz"] > $obtenerJuegos[$numero]["puntosCirculo"]){
            $estadoJuego = "Gano X";
        } elseif ($obtenerJuegos[$numero]["puntosCruz"] == $obtenerJuegos[$numero]["puntosCirculo"]) {
            $estadoJuego = "Empate";
        } else {
            $estadoJuego = "Gano O";
        }
        echo "Juego TATETI: ".$numero. "(".$estadoJuego.")";
        echo "\nJugador X: ".$obtenerJuegos[$numero]["jugadorCruz"]." obtuvo ".$obtenerJuegos[$numero]["puntosCruz"]." puntos";
        echo "\nJugador O: ".$obtenerJuegos[$numero]["jugadorCirculo"]." obtuvo ".$obtenerJuegos[$numero]["puntosCirculo"]." puntos";
    }

/** Se ingresa un nuevo juego en la coleccion
 * @param array $coleccion
 * @param array $juegoNuevo
 * @return array
 */

 function agregarJuego($coleccion, $juegoNuevo) {
    $n = count($coleccion);
    $coleccion[$n] = $juegoNuevo;
    /* $n = 10;
    $coleccion[$n] = $juegoNuevo;
    $n += 1; */
    return $coleccion;
 }

 /** Muestra el indice del primer juego ganado por el jugador elegido
  * @param array $coleccionJuegos 
  * @param string $nombreJug
  * @return int
  */

  function mostrarPrimerGanado($coleccionJuegos, $nombreJug) {
    $n = count($coleccionJuegos);
    $i = 0; 
    $indice = -1; 
    while($i < $n && !($indice == $i)){
        if ($coleccionJuegos[$i]["jugadorCruz"] == $nombreJug){
            if($coleccionJuegos[$i]["puntosCruz"] > $coleccionJuegos[$i]["puntosCirculo"]){
                $indice = $i;
            } 
        } elseif($coleccionJuegos[$i]["jugadorCirculo"] == $nombreJug){
            if($coleccionJuegos[$i]["puntosCirculo"] > $coleccionJuegos[$i]["puntosCruz"]){
                $indice = $i;
            } 
        }
        $i += 1;
    }
    return $indice;
  }

 /** Modulo que nos muestra el resumen de juegos de un jugador
  * @param array $juegos
  * @param string $nombreJugador
  */
 
  function resumenDeJug($juegosCol, $nombreJugador) {
      $resumenJug = [];
      $puntos = 0;
      $juegosGanados = 0;
      $juegosEmpates = 0;
      $juegosPerdidos = 0;
      $n = count($juegosCol);
      for($i = 0; $i < $n; $i++){
        if($nombreJugador == $juegosCol[$i]["jugadorCruz"]){
            if($juegosCol[$i]["puntosCruz"] > $juegosCol[$i]["puntosCirculo"]){
                $puntos += $juegosCol[$i]["puntosCruz"];
                $juegosGanados += 1;
            } elseif($juegosCol[$i]["puntosCruz"] == $juegosCol[$i]["puntosCirculo"]){
                $juegosEmpates += 1;
                $puntos += $juegosCol[$i]["puntosCruz"];
            } else{
                $juegosPerdidos += 1;
            }
        } elseif($nombreJugador == $juegosCol[$i]["jugadorCirculo"]){
            if($juegosCol[$i]["puntosCirculo"] > $juegosCol[$i]["puntosCruz"]){
                $puntos += $juegosCol[$i]["puntosCirculo"];
                $juegosGanados += 1;
            } elseif($juegosCol[$i]["puntosCirculo"] == $juegosCol[$i]["puntosCruz"]){
                $juegosEmpates += 1;
                $puntos += $juegosCol[$i]["puntosCirculo"];
            } else {
                $juegosPerdidos += 1;
            }
        }
      }
      $resumenJug["nombre"] = $nombreJugador;
      $resumenJug["juegosGanados"] = $juegosGanados;
      $resumenJug["juegosPerdidos"] = $juegosPerdidos;
      $resumenJug["juegosEmpatados"] = $juegosEmpates;
      $resumenJug["puntosAcumulados"] = $puntos;
      return $resumenJug;
  }

/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:


//Inicialización de variables:


//Proceso:
//echo "Ingrese un numero de juego: ";
//$numero = trim(fgets(STDIN));
//$verJuego = mostrarJuego();
//$juego = jugar();
$cargamosJuegos = cargarJuegos();
print_r ($cargamosJuegos);
echo "Ingrese el nombre del jugador del cual quiere ver el resumen: ";
$jugador = trim(fgets(STDIN));
$resumen = resumenDeJug($cargamosJuegos, $jugador);
print_r($resumen);
//$agregarJuegos = agregarJuego($cargamosJuegos, $juego);
//$cargamosJuegos = $agregarJuegos;
//print_r($agregarJuegos);
//echo "Nombre el jugador para mostrar su primer juego ganado: ";
//$jugador = trim(fgets(STDIN));
//$mostrarJuegoGanado = mostrarPrimerGanado($cargamosJuegos, $jugador);
//echo $mostrarJuegoGanado;
//print_r($juego);
//imprimirResultado($juego);



/*
do {
    $opcion = ...;

    
    switch ($opcion) {
        case 1: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 1

            break;
        case 2: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 2

            break;
        case 3: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 3

            break;
        
            //...
    }
} while ($opcion != X);
*/