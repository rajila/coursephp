<?php
    function factorial($numero) {
        if ($numero == 0) return 1;
        else return $numero * factorial($numero - 1);
    }

    $numero = rand(1, 10); // numero aleatorio entre 1 y 10

    echo "<h1><u>Funciones</u></h1>";
    echo "<b>Factorial de $numero: </b> " . factorial($numero);

?>