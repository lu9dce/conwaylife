<?php

// Tamaño del tablero
$rows = 160;
$cols = 160;

// Tamaño de la imagen
$imageWidth = 800;
$imageHeight = 800;

// Tamaño de los puntos de vida
$cellSize = 5;

// Número total de generaciones
$totalGenerations = 1000;

// Nombre del archivo de imagen
$imageFilename = 'imagen_salida.png';

// Cantidad de células vivas al inicio
$initialLivingCells = 3000;

// Inicializar el tablero
$board = array_fill(0, $rows, array_fill(0, $cols, 0));

// Establecer células iniciales vivas en posiciones aleatorias
for ($i = 0; $i < $initialLivingCells; $i++) {
    $randomRow = rand(0, $rows - 1);
    $randomCol = rand(0, $cols - 1);
    $board[$randomRow][$randomCol] = 1;
}

// Función para aplicar una regla del Juego de la Vida
function applyRules($board) {
    $newBoard = $board;
    
    // Recorrer el tablero
    for ($i = 0; $i < count($board); $i++) {
        for ($j = 0; $j < count($board[$i]); $j++) {
            // Contar las células vecinas vivas
            $neighbors = 0;
            for ($row = $i - 1; $row <= $i + 1; $row++) {
                for ($col = $j - 1; $col <= $j + 1; $col++) {
                    if ($row >= 0 && $row < count($board) &&
                        $col >= 0 && $col < count($board[$i]) &&
                        !($row == $i && $col == $j)) {
                        $neighbors += $board[$row][$col];
                    }
                }
            }

            // Aplicar reglas
            if ($board[$i][$j] == 1) {
                // Célula viva
                if ($neighbors < 2 || $neighbors > 3) {
                    $newBoard[$i][$j] = 0;
                }
            } else {
                // Célula muerta
                if ($neighbors == 3) {
                    $newBoard[$i][$j] = 1;
                }
            }
        }
    }

    return $newBoard;
}

// Crear imágenes y sobrescribir el archivo de imagen
for ($generation = 1; $generation <= $totalGenerations; $generation++) {
    $image = imagecreatetruecolor($imageWidth, $imageHeight);
    $black = imagecolorallocate($image, 10, 10, 10);
    $white = imagecolorallocate($image, 0, 255, 255);

    // Establecer fondo negro
    imagefilledrectangle($image, 0, 0, $imageWidth, $imageHeight, $black);

    // Pintar el tablero en la imagen
    for ($i = 0; $i < $rows; $i++) {
        for ($j = 0; $j < $cols; $j++) {
            if ($board[$i][$j] == 1) {
                // Pintar punto de vida blanco
                imagefilledrectangle($image, $j * $cellSize, $i * $cellSize, ($j + 1) * $cellSize, ($i + 1) * $cellSize, $white);
            }
        }
    }

    // Guardar la imagen
    imagepng($image, $imageFilename);

    // Aplicar reglas para la siguiente generación
    $board = applyRules($board);

    // Esperar medio segundo entre generaciones
    usleep(500000);
}

echo "Se ha creado la imagen y se ha guardado en el archivo: $imageFilename\n";

?>
