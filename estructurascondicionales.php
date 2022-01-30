<?php
    echo "<h1><u>Estructuras condicionales</u></h1>";

    $operadores = array(1 => '+', 2 => '-', 3 => '*', 4 => '/', 5 => '%');
    $operador = $operadores[rand(1, 5)];
    $numero1 = rand(1, 10);
    $numero2 = rand(1, 10);

    echo "<b>Switch</b>";
    echo "<br />";
    # Switch
    switch ($operador) {
        case '+':
            echo "Suma: " . $numero1 . " " . $operador . " " . $numero2 . " = " . ($numero1 + $numero2);
            break;
        case '-':
            echo "Resta: " . $numero1 . " " . $operador . " " . $numero2 . " = " . ($numero1 - $numero2);
            break;
        case '*':
            echo "Multiplicación: " . $numero1 . " " . $operador . " " . $numero2 . " = " . ($numero1 * $numero2);
            break;
        case '/':
            echo "División: " . $numero1 . " " . $operador . " " . $numero2 . " = " . ($numero1 / $numero2);
            break;
        case '%':
            echo "Módulo: " . $numero1 . " " . $operador . " " . $numero2 . " = " . ($numero1 % $numero2);
            break;
        default:
            echo "Operador no válido";
            break;
    }

    # if elseif else
    echo "<br />";
    echo "<br />";
    echo "<b>if elseif else</b>";
    echo "<br />";
    if ($numero1 > $numero2) {
        echo "El número " . $numero1 . " es mayor que " . $numero2;
    } else if ($numero1 < $numero2) {
        echo "El número " . $numero1 . " es menor que " . $numero2;
    } else {
        echo "Los números son iguales";
    }
?>