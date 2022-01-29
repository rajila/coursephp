<?php
    echo "<h1><u>Operadores</u></h1>";

    $a = 10;
    $b = 5;

    echo "<b><u>Operadores Aritmeticos</u> (a, b) = (10, 5)</b>";

    echo "<ul>";
    echo "<li><b>Suma (a + b): </b>" . ($a + $b) . "</li>";
    echo "<li><b>Resta (a - b): </b>" . ($a - $b) . "</li>";
    echo "<li><b>Multiplicación (a * b): </b>" . ($a * $b) . "</li>";
    echo "<li><b>División (a / b): </b>" . ($a / $b) . "</li>";
    echo "<li><b>Módulo (a % b): </b>" . ($a % $b) . "</li>";
    echo "<li><b>Potencia (a**b): </b>" . ($a ** $b) . "</li>";
    echo "<li><b>Incremento Prefijo (++a): </b>" . (++$a) . "</li>";
    echo "<li><b>Incremento Postfijo (a++): </b>" . ($a++) . "</li>";
    echo "<li><b>Decremento Prefijo (--a): </b>" . (--$a) . "</li>";
    echo "<li><b>Decremento Postfijo (a--): </b>" . ($a--) . "</li>";
    echo "</ul>";

    $tenEntero = 10;
    $tenDecimal = 10.0;
    $tenText = "10";
    $tenNumber = 10;
    echo "<b><u>Operadores Comparacion</u></b>";
    echo "<ul>";
    echo "<li><b>Igualdad (10 == 10.0): </b>" . (($tenEntero == $tenDecimal)?"true":"false") . "</li>";
    echo "<li><b>Igualdad (10 == '10'): </b>" . (($tenEntero == $tenText)?"true":"false") . "</li>";
    echo "<li><b>Igualdad (10 == 10): </b>" . (($tenEntero == $tenNumber)?"true":"false") . "</li>";
    echo "<li><b>Identidad (10 === 10.0): </b>" . (($tenEntero === $tenDecimal)?"true":"false") . "</li>";
    echo "<li><b>Identidad (10 === '10'): </b>" . (($tenEntero === $tenText)?"true":"false") . "</li>";
    echo "<li><b>Identidad (10 === 10): </b>" . (($tenEntero === $tenNumber)?"true":"false") . "</li>";
    echo "<li><b>Diferencia (10 != 10.0): </b>" . (($tenEntero != $tenDecimal)?"true":"false") . "</li>";
    echo "<li><b>Diferencia (10 != '10'): </b>" . (($tenEntero != $tenText)?"true":"false") . "</li>";
    echo "<li><b>Diferencia (10 != 10): </b>" . (($tenEntero != $tenNumber)?"true":"false") . "</li>";
    echo "<li><b>Diferencia estricta (10 !== 10.0): </b>" . (($tenEntero !== $tenDecimal)?"true":"false") . "</li>";
    echo "<li><b>Diferencia estricta (10 !== '10'): </b>" . (($tenEntero !== $tenText)?"true":"false") . "</li>";
    echo "<li><b>Diferencia estricta (10 !== 10): </b>" . (($tenEntero !== $tenNumber)?"true":"false") . "</li>";
    echo "<li><b>Distinto (10 <> 10.0): </b>" . (($tenEntero <> $tenDecimal)?"true":"false") . "</li>";
    echo "<li><b>Distinto (10 <> '10'): </b>" . (($tenEntero <> $tenText)?"true":"false") . "</li>";
    echo "<li><b>Distinto (10 <> 10): </b>" . (($tenEntero <> $tenNumber)?"true":"false") . "</li>";
    echo "</ul>";
?>