<?php 
    echo "<h1><u>Variables y Constantes</u></h1>";
    # definición de variables
    $edad = 45; # variable de tipo entero
    $nombre = "Juan"; # variable de tipo cadena
    $estatura = 1.70; # variable de tipo decimal
    $soltero = true; # variable de tipo booleano

    $frutas = array("Manzana", "Pera", "Naranja"); # variable de tipo array
    $frutas[] = "Sandia"; # agregar un elemento al final al array

    $poblacion = array(
        "Spain" => 3987,
        "Ecuador" => 45564,
        "Brasil" => 450934
    ); # variable de tipo array asociativo (clave => valor)
    $poblacion["Argentina"] = 47896; # agregar un elemento al final al array asociativo
    $poblacion[] = 17098; # agregar un elemento al final al array asociativo. El indice inicia desde 0
    $poblacion["Chile"] = 8796; # agregar un elemento al final al array asociativo
    $poblacion[] = 77; # agregar un elemento al final al array asociativo. El indice automaticamente se incrementa en 1 del ultimo elemento del array con clave de tipo entero.
    $poblacion[3] = 567; # agregar un elemento al final al array asociativo. Por pruebas asignamos un indice a mano de valor 3
    $poblacion[] = 988; # agregar un elemento al final al array asociativo. El indice automaticamente se incrementa en 1 del ultimo elemento del array con clave de tipo entero.
    
    define("PI", 3.14); # variable de tipo constante
    define("VELOCIDAD_LUZ", 3E8); # variable de tipo constante

    # Imprimir variables y constantes
    echo "<b>Edad: </b>" . $edad . "<br>";
    var_dump($edad);
    echo "<br><br>";

    echo "<b>Nombre: </b>" . $nombre . "<br>";
    var_dump($nombre);
    echo "<br><br>";

    echo "<b>Estatura: </b>" . $estatura . "<br>";
    var_dump($estatura);
    echo "<br><br>";

    print "<b>Soltero: </b>" . $soltero . "<br>";
    var_dump($soltero);
    echo "<br><br>";

    print "<b>Frutas: </b> <br>";
    var_dump($frutas);
    echo "<br><br>";

    print "<b>Poblacion: </b> <br>";
    var_dump($poblacion);
    echo "<br><br>";

    print "<b>PI: </b>" . PI . "<br>";
    var_dump(PI);
    echo "<br><br>";

    print "<b>VELOCIDAD LUZ: </b>" . VELOCIDAD_LUZ . "<br>";
    var_dump(VELOCIDAD_LUZ);
    echo "<br><br>";
?>