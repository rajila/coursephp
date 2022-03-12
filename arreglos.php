<?php
    echo "<h1><u>Arreglos indexados</u></h1>";
    
    # definición de variable arreglo
    $fruit = array("apple", "orange", "banana");
    $modelCars = [];

    # Imprimir variable arreglo
    print "<b>Fruit: </b> <br>";
    print_r($fruit);
    echo "<br><br>";

    print "<b>ModelCars: </b> <br>";
    print_r($modelCars);
    echo "<br><br>";

    # Agregar un elemento al arreglo
    array_push($fruit, "grape"); // agrega un elemento al final del arreglo. Devuelve el nuevo tamaño del arreglo
    array_unshift($fruit, "pear"); // agrega un elemento al inicio del arreglo. Devuelve el nuevo tamaño del arreglo
    $modelCars[] = "Ferrari"; // agrega un elemento al final del arreglo.

     # Imprimir variable arreglo
     print "<b>Fruit: </b> <br>";
     print_r($fruit);
     echo "<br><br>";
 
     print "<b>ModelCars: </b> <br>";
     print_r($modelCars);
     echo "<br><br>";

    # Eliminar un elemento del arreglo
    array_pop($fruit); // elimina el ultimo elemento del arreglo. Devuelve el elemento eliminado
    array_shift($fruit); // elimina el primer elemento del arreglo. Devuelve el elemento eliminado
    unset($modelCars[0]); // elimina el elemento del arreglo.
    
    # Imprimir variable arreglo
    print "<b>Fruit: </b> <br>";
    print_r($fruit);
    echo "<br><br>";
 
    print "<b>ModelCars: </b> <br>";
    print_r($modelCars);
    echo "<br><br>";

    echo "<h1><u>Arreglos asociativos</u></h1>";
    
    # definición de variable arreglo
    $fruit = array("apple" => "A", "orange" => "O", "banana" => "B");
    $modelCars = [];

    # Imprimir variable arreglo
    print "<b>Fruit: </b> <br>";
    print_r($fruit);
    echo "<br><br>";

    print "<b>ModelCars: </b> <br>";
    print_r($modelCars);
    echo "<br><br>";

    # Agregar un elemento al arreglo
    $fruit["grape"] = "G"; // agrega un elemento al arreglo.
    $modelCars[0] = "Ferrari"; // agrega un elemento al final del arreglo.

     # Imprimir variable arreglo
     print "<b>Fruit: </b> <br>";
     print_r($fruit);
     echo "<br><br>";
 
     print "<b>ModelCars: </b> <br>";
     print_r($modelCars);
     echo "<br><br>";

    # Eliminar un elemento del arreglo
    array_pop($fruit); // elimina el ultimo elemento del arreglo. Devuelve el elemento eliminado
    array_shift($fruit); // elimina el primer elemento del arreglo. Devuelve el elemento eliminado
    unset($modelCars[0]); // elimina el elemento del arreglo.
    
    # Imprimir variable arreglo
    print "<b>Fruit: </b> <br>";
    print_r($fruit);
    echo "<br><br>";
 
    print "<b>ModelCars: </b> <br>";
    print_r($modelCars);
    echo "<br><br>";

    echo "<h1><u>Arreglos multidimensionales</u></h1>";
    $asistencias = array(
        "classI" => array('Ronald', 'Juan', 'Pedro', 'Carlos', 'Jorge'),
        "classII" => array('Juan', 'Pedro', 'Carlos'),
        "classIII" => array('Charlotte', 'Isabella')
    );

    print "<b>Asistencias: </b> <br>";
    print_r($asistencias);
    echo "<br><br>";
    print_r($asistencias["classI"][0]);
    echo "<br><br>";

    echo "<h1><u>Odenar arreglos asociativos</u></h1>";
    $peso = array(
        "Carlos" => "70",
        "Pedro" => "65",
        "Juan" => "75",
        "Jorge" => "80",
        "Ronald" => "85"
    );
    print "<b>Peso: </b> <br>";
    print_r($peso);
    echo "<br><br>";
    sort($peso); // ordena el arreglo y devuelve el arreglo ordenado de tipo indexado
    print "<b>Peso ordenado: </b> <br>";
    print_r($peso);
?>