<?php
include_once("tateti.php");

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github */
// Valicenti, Sergio. FAI-3535. TUDW. sergio.valicenti@est.fi.uncoma.edu.ar. Sergio Valicenti.
// Rojo, Jerónimo. FAI-3675. TUDW. jeronimo.rojo@est.fi.uncoma.edu.ar. jeronimo-coder

/* ... COMPLETAR ... */





/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/
/** Visualizar el menu de opciones
 * @param int $eleccion
 * @return int
 */

function seleccionarOpcion()
{
    echo "1) Jugar tateti\n";
    echo "2) Mostrar un juego\n";
    echo "3) Mostrar el primer juego ganador\n";
    echo "4) Mostrar porcentaje de juegos ganados\n";
    echo "5) Mostrar resumen de Jugador\n";
    echo "6) Mostrar listado de juegos Ordenado por jugador O\n";
    echo "7) Salir \n";
    echo "Que opcion desea ingresar?: \n";

    //Establecemos el rango de opciones validas que hay en el menu
    $opcionValida1 = 1;
    $opcionValida2 = 7;
    $eleccion = solicitarNumeroEntre($opcionValida1, $opcionValida2);
    return $eleccion;
}

/** Inicializa una estructura de datos con ejemplos de juegos
 * @return array
 */

function cargarLosJuegos()
{
    $juegos = [];
    $juegos[0] = [
        "jugadorCruz" => "JERO",
        "jugadorCirculo" => "ROBERTO",
        "puntosCruz" => 5,
        "puntosCirculo" => 0
    ];
    $juegos[1] = [
        "jugadorCruz" => "MATIAS",
        "jugadorCirculo" => "NAZA",
        "puntosCruz" => 1,
        "puntosCirculo" => 1
    ];
    $juegos[2] = [
        "jugadorCruz" => "NAZA",
        "jugadorCirculo" => "ROMINA",
        "puntosCruz" => 6,
        "puntosCirculo" => 0
    ];
    $juegos[3] = [
        "jugadorCruz" => "JERO",
        "jugadorCirculo" => "SOFIA",
        "puntosCruz" => 0,
        "puntosCirculo" => 5
    ];
    $juegos[4] = [
        "jugadorCruz" => "AGUSTIN",
        "jugadorCirculo" => "ROBERTO",
        "puntosCruz" => 1,
        "puntosCirculo" => 1
    ];
    $juegos[5] = [
        "jugadorCruz" => "MATIAS",
        "jugadorCirculo" => "ROMINA",
        "puntosCruz" => 0,
        "puntosCirculo" => 5
    ];
    $juegos[6] = [
        "jugadorCruz" => "ROBERTO",
        "jugadorCirculo" => "SOFIA",
        "puntosCruz" => 1,
        "puntosCirculo" => 1
    ];
    $juegos[7] = [
        "jugadorCruz" => "AGUSTIN",
        "jugadorCirculo" => "FACUNDO",
        "puntosCruz" => 1,
        "puntosCirculo" => 1
    ];
    $juegos[8] = [
        "jugadorCruz" => "FELIPE",
        "jugadorCirculo" => "MARCELO",
        "puntosCruz" => 5,
        "puntosCirculo" => 0
    ];
    $juegos[9] = [
        "jugadorCruz" => "FLOR",
        "jugadorCirculo" => "CARLOS",
        "puntosCruz" => 0,
        "puntosCirculo" => 5
    ];
    $juegos = [];

$jg1 = ["jugadorCruz" => "AMARILIS", "jugadorCirculo" => "MILOS",    "puntosCruz" => 1, "puntosCirculo" => 1];
$jg2 = ["jugadorCruz" => "ZENDA",    "jugadorCirculo" => "AMARILIS", "puntosCruz" => 3, "puntosCirculo" => 0];
$jg3 = ["jugadorCruz" => "ZENDA",    "jugadorCirculo" => "MILOS",    "puntosCruz" => 0, "puntosCirculo" => 4];
$jg4 = ["jugadorCruz" => "CALIXTO",  "jugadorCirculo" => "TRUMAN",   "puntosCruz" => 1, "puntosCirculo" => 1];
$jg5 = ["jugadorCruz" => "AMARILIS", "jugadorCirculo" => "MILOS",    "puntosCruz" => 5, "puntosCirculo" => 0];
$jg6 = ["jugadorCruz" => "FEDORA",   "jugadorCirculo" => "CALIXTO",  "puntosCruz" => 0, "puntosCirculo" => 3];
$jg7 = ["jugadorCruz" => "TRUMAN",   "jugadorCirculo" => "AMARILIS", "puntosCruz" => 4, "puntosCirculo" => 0];
$jg8 = ["jugadorCruz" => "CALIXTO",  "jugadorCirculo" => "TRUMAN",   "puntosCruz" => 1, "puntosCirculo" => 1];
$jg9 = ["jugadorCruz" => "TRUMAN",   "jugadorCirculo" => "FEDORA",   "puntosCruz" => 2, "puntosCirculo" => 0];
$jg10= ["jugadorCruz" => "MILOS",    "jugadorCirculo" => "ZENDA",   "puntosCruz" => 1, "puntosCirculo" => 1];

array_push($juegos, $jg1, $jg2, $jg3, $jg4, $jg5, $jg6, $jg7, $jg8, $jg9, $jg10);

    return ($juegos);
}

/** Muestra los datos de un juego elegido
 * @param array $juegosColeccion
 * @param int $num
 * 
 */

function mostrarJuego($juegosColeccion, $num)
{
    echo "**************************\n";
    if ($juegosColeccion[$num]["puntosCruz"] > $juegosColeccion[$num]["puntosCirculo"]) {
        $estadoJuego = "Gano X";
    } elseif ($juegosColeccion[$num]["puntosCruz"] == $juegosColeccion[$num]["puntosCirculo"]) {
        $estadoJuego = "Empate";
    } else {
        $estadoJuego = "Ganó O";
    }
    echo "Juego TATETI: " . $num . "(" . $estadoJuego . ")";
    echo "\nJugador X: " . $juegosColeccion[$num]["jugadorCruz"] . " obtuvo " . $juegosColeccion[$num]["puntosCruz"] . " puntos";
    echo "\nJugador O: " . $juegosColeccion[$num]["jugadorCirculo"] . " obtuvo " . $juegosColeccion[$num]["puntosCirculo"] . " puntos\n";
    echo "**************************\n";
}

/** Se ingresa un nuevo juego en la coleccion
 * @param array $coleccion
 * @param array $juegoNuevo
 * @return array
 */

function agregarJuego($coleccion, $juegoNuevo)
{
    $n = count($coleccion);
    $coleccion[$n] = $juegoNuevo;
    return $coleccion;
}

/** Muestra el indice del primer juego ganado por el jugador elegido
 * @param array $coleccionJuegos 
 * @param string $nombreJug
 * @return int
 */

function mostrarPrimerGanado($coleccionJuegos, $nombreJug)
{
    $n = count($coleccionJuegos);
    $i = 0;
    $indice = -1;
    while ($i < $n && !($indice == $i)) {
        if ($coleccionJuegos[$i]["jugadorCruz"] == $nombreJug) {
            if ($coleccionJuegos[$i]["puntosCruz"] > $coleccionJuegos[$i]["puntosCirculo"]) {
                $indice = $i;
            }
        } elseif ($coleccionJuegos[$i]["jugadorCirculo"] == $nombreJug) {
            if ($coleccionJuegos[$i]["puntosCirculo"] > $coleccionJuegos[$i]["puntosCruz"]) {
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

function resumenDeJug($juegosCol, $nombreJugador)
{
    $resumenJug = [];
    $puntos = 0;
    $juegosGanados = 0;
    $juegosEmpates = 0;
    $juegosPerdidos = 0;
    $n = count($juegosCol);
    for ($i = 0; $i < $n; $i++) {
        if ($nombreJugador == $juegosCol[$i]["jugadorCruz"]) {
            if ($juegosCol[$i]["puntosCruz"] > $juegosCol[$i]["puntosCirculo"]) {
                $puntos += $juegosCol[$i]["puntosCruz"];
                $juegosGanados += 1;
            } elseif ($juegosCol[$i]["puntosCruz"] == $juegosCol[$i]["puntosCirculo"]) {
                $juegosEmpates += 1;
                $puntos += $juegosCol[$i]["puntosCruz"];
            } else {
                $juegosPerdidos += 1;
            }
        } elseif ($nombreJugador == $juegosCol[$i]["jugadorCirculo"]) {
            if ($juegosCol[$i]["puntosCirculo"] > $juegosCol[$i]["puntosCruz"]) {
                $puntos += $juegosCol[$i]["puntosCirculo"];
                $juegosGanados += 1;
            } elseif ($juegosCol[$i]["puntosCirculo"] == $juegosCol[$i]["puntosCruz"]) {
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

/** Funcion que solicita al usuario un simbolo X o O, retorna el simbolo elegido
 * @return string 
 */

function eleccionSimbolo()
{
    echo "Ingrese un simbolo (X o O): ";
    $simbolo = trim(fgets(STDIN));
    while (!($simbolo == "x" || $simbolo == "X") && !($simbolo == "o" || $simbolo == "O")) {
        echo "Ingrese un simbolo valido: ";
        $simbolo = trim(fgets(STDIN));
    }
    $simbolo = strtoupper($simbolo);
    return $simbolo;
}

/** Funcion que nos retorna la cantidad de juegos ganados
 * @param array $estructuraJuegos
 * @return int
 */

function contarJuegosGanados($estructuraJuegos)
{
    $n = count($estructuraJuegos);
    $juegosGanados = 0;
    for ($i = 0; $i < $n; $i++) {
        if ($estructuraJuegos[$i]["puntosCruz"] > $estructuraJuegos[$i]["puntosCirculo"]) {
            $juegosGanados += 1;
        } elseif ($estructuraJuegos[$i]["puntosCirculo"] > $estructuraJuegos[$i]["puntosCruz"]) {
            $juegosGanados += 1;
        }
    }
    return $juegosGanados;
}

/** Funcion que retorna la cantida de juegos ganados por un simbolo
 * @param array $arrayJuegos
 * @param string $simboloElegido
 * @return int
 */

function juegosGanadosPorSimbolo($arrayJuegos, $simboloElegido)
{
    while (!($simboloElegido == "x" || $simboloElegido == "X") && !($simboloElegido == "o" || $simboloElegido == "O")) {
        echo "Ingrese un simbolo valido: ";
        $simboloElegido = trim(fgets(STDIN));
    }
    $simboloElegido = strtoupper($simboloElegido);
    $n = count($arrayJuegos);
    $ganadosPorSimbolo = 0;
    if ($simboloElegido == "X") {
        for ($i = 0; $i < $n; $i++) {
            if ($arrayJuegos[$i]["puntosCruz"] > $arrayJuegos[$i]["puntosCirculo"]) {
                $ganadosPorSimbolo += 1;
            }
        }
    } elseif ($simboloElegido == "O") {
        for ($i = 0; $i < $n; $i++) {
            if ($arrayJuegos[$i]["puntosCirculo"] > $arrayJuegos[$i]["puntosCruz"]) {
                $ganadosPorSimbolo += 1;
            }
        }
    }
    return $ganadosPorSimbolo;
}

/** Funcion que nos devuelve la coleccion de juegos ordenada por el nombre del
 * jugador cuyo simbolo es O
 * @param array $coleccion
 */

function ordenarPorNombreJugO($coleccion)
{
    // uso la funcion predefinida uasort para mantener asociado el indice junto a su valor
    // Uso la funcion predefinada print_r para ordenar alfabeticamente
    uasort($coleccion, 'cmp');
    print_r($coleccion);
}

/** Funcion para realizar comparaciones
 * @param array $a
 * @param array $b
 * @return int
 */

function cmp($a, $b)
{
    $resultado = 0;
    if ($a['jugadorCirculo'] > $b['jugadorCirculo']) {
        $resultado = 1;
    } elseif ($a['jugadorCirculo'] < $b['jugadorCirculo']) {
        $resultado = -1;
    }
    return ($resultado);
}

/** Funcion para saber si el jugador ingresado existe
 * @param string $nomJug
 * @param array $validarJug
 * @return bool
 */

function existeJugador($nomJug, $validarJug)
{
    $j = 0;
    $siExiste = false;
    do {
        if ($validarJug[$j]['jugadorCruz'] == $nomJug) {
            $siExiste = true;
        } elseif ($validarJug[$j]['jugadorCirculo'] == $nomJug) {
            $siExiste = true;
        }
        $j++;
    } while ($j < count($validarJug) && !$siExiste);
    return ($siExiste);
}

/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:

/* array $jugarTateti, $agregar, $cargarJuegos, $resumenJug, $ordenarPorO
   int $primerJuegoGanado, $iniciarMenu, $numero, $totalJuegosGanados, $ganadosPorSim
   string $nombre, $elegirJuego, $eleccionSim
   float $porcentajeGanados
*/

//Inicialización de variables:


//Proceso:


$cargarJuegos = cargarLosJuegos();



do {

    $iniciarMenu = seleccionarOpcion();
    //$iniciarMenu = ;

    switch ($iniciarMenu) {
        case 1:
            $jugarTateti = jugar();
            imprimirResultado($jugarTateti);
            $agregar = agregarJuego($cargarJuegos, $jugarTateti);
            $cargarJuegos = $agregar;
            break;
        case 2:
            $minimo = 0;
            $maximo = count($cargarJuegos) - 1;
            echo "Ingrese un número de juego entre $minimo y $maximo: \n";
            $numero = trim(fgets(STDIN));
            while (!is_int($numero) && !($numero >= $minimo && $numero <= $maximo)) {
                echo "Numero invalido. Ingrese un número de juego entre $minimo y $maximo: \n";
                $numero = trim(fgets(STDIN));
            }
            $elegirJuego = mostrarJuego($cargarJuegos, $numero);

            break;
        case 3:
            echo "Ingrese el nombre del jugador: ";
            $nombre = trim(fgets(STDIN));
            $nombre = strtoupper($nombre);
            $exiteJugador = existeJugador($nombre, $cargarJuegos);
            if($exiteJugador){
                $primerJuegoGanado = mostrarPrimerGanado($cargarJuegos, $nombre);
                if ($primerJuegoGanado >= 1) {
                $mostrarElJuego = mostrarJuego($cargarJuegos, $primerJuegoGanado);
            } else {
                echo "El jugador " . $nombre . " no ganó ningún juego";
            }
        } else {
            echo "No se encuentran registro de este jugador.\n";
        }
            break;
        case 4:
            $eleccionSim = eleccionSimbolo();
            $totalJuegosGanados = contarJuegosGanados($cargarJuegos);
            $ganadosPorSim = juegosGanadosPorSimbolo($cargarJuegos, $eleccionSim);
            $porcentajeGanados = round((($ganadosPorSim * 100) / $totalJuegosGanados), 2);
            echo "El simbolo " . $eleccionSim . " ganó el " . $porcentajeGanados .
                "% de los juegos ganados";
            break;
        case 5:
            echo "Ingrese el nombre del jugador: ";
            $nombre = trim(fgets(STDIN));
            while (!ctype_alpha($nombre)) {
                echo "Por favor ingrese un caracter valido. \n";
                $nombre = trim((fgets(STDIN)));
            }
            $nombre = strtoupper($nombre);
            $existe = existeJugador($nombre, $cargarJuegos);
            if ($existe) {
                $resumenJug = resumenDeJug($cargarJuegos, $nombre);
                echo "**************************\n";
                echo "Jugador: " . $nombre . "\n";
                echo "Ganó: " . $resumenJug["juegosGanados"] . "\n";
                echo "Perdió: " . $resumenJug["juegosPerdidos"] . "\n";
                echo "Empató: " . $resumenJug["juegosEmpatados"] . "\n";
                echo "Total de puntos acumulados: " . $resumenJug["puntosAcumulados"] . "\n";
                echo "**************************\n";
            } else {
                echo "No se ha encontrado ningun registro de este jugador.\n";
            }
            break;
        case 6:
            $ordenarPorO = ordenarPorNombreJugO($cargarJuegos);
            break;
    }
} while ($iniciarMenu != 7);