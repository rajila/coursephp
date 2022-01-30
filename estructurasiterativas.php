<?php
    echo "<h1><u>Estructuras iterativas</u></h1>";

    $enteros = range(1, 10); // Crea un array con los números del 1 al 10
    
    echo "<b>FOR</b>";
    echo "<br />";
    for ($index = 0; $index < count($enteros); $index++) {
        echo "$index => $enteros[$index] <br />";
    }

    echo "<br />";
    echo "<br />";
    echo "<b>WHILE</b>";
    echo "<br />";
    $contador = 0;
    while ($contador < count($enteros)) {
        echo "$contador => " . $enteros[$contador++] . "<br />";
    }

    echo "<br />";
    echo "<br />";
    echo "<b>DO WHILE</b>";
    echo "<br />";
    $contador = 0;
    do {
        echo "$contador => " . $enteros[$contador++] . "<br />";
    } while ($contador < count($enteros));

    echo "<br />";
    echo "<br />";
    echo "<b>FOR EACH</b>";
    echo "<br />";
    foreach ($enteros as $valor) {
        echo "$valor <br />";
    }

    echo "<br />";
    $notas = array('Ronald' => 9, 'Juan' => 7, 'Pedro' => 8, 'Luis' => 6);
    foreach ($notas as $alumno => $nota) {
        echo "<b>$alumno</b> tiene una nota de $nota <br />";
    }
?>