<?php

$jugadas = [
    "Piedra",
    "Papel",
    "Tijera",
    "Lagarto",
    "Spock"
];

$indiceJugador1 = intval($argv[1]);
$indiceJugador2 = intval($argv[2]);

$reglas = [
    "Tijera" => ["Papel", "Lagarto"], // Tijera corta Papel, Tijera decapita Lagarto
    "Papel" => ["Piedra", "Spock"],   // Papel tapa Piedra, Papel devora Spock
    "Piedra" => ["Lagarto", "Tijera"], // Piedra aplasta Lagarto, Piedra rompe Tijera
    "Lagarto" => ["Spock", "Papel"],  // Lagarto envenena Spock, Lagarto devora Papel
    "Spock" => ["Tijera", "Piedra"]   // Spock rompe Tijera, Spock vaporiza Piedra
];

function determinarGanador($jugador1, $jugador2, $reglas) {
    global $jugadas;

    // Validar que las jugadas sean válidas
    if (!in_array($jugador1, $jugadas) || !in_array($jugador2, $jugadas)) {
        return "Error: Jugada no válida.";
    }

    if ($jugador1 == $jugador2) {
        return "Empate! Ambos eligieron $jugador1.";
    }

    if (in_array($jugador2, $reglas[$jugador1])) {
        return "Jugador 1 gana: $jugador1 vence a $jugador2.";
    } else {
        return "Jugador 2 gana: $jugador2 vence a $jugador1.";
    }
}

$jugador1 = $jugadas[$indiceJugador1];
$jugador2 = $jugadas[$indiceJugador2];

echo "Jugador 1 eligió: $jugador1\n";
echo "Jugador 2 eligió: $jugador2\n";

$resultado = determinarGanador($jugador1, $jugador2, $reglas);
echo $resultado . "\n";