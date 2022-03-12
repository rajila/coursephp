<?php
    require_once('Validacion.php');

    echo "<h1><u>Recuperar parametros por POST</u></h1>";
    
    if ( isset($_REQUEST['submit']) ) {
        $nombre = empty($_POST['nombre']) ? '' : $_POST['nombre'];
        $edad = empty($_POST['edad']) ? null : $_POST['edad'];
        $correo = empty($_POST['correo']) ? '' : $_POST['correo'];
        $fullname = empty($_POST['fullname']) ? '' : $_POST['fullname'];
        $casado = empty($_POST['casado']) ? '' : $_POST['casado'];
        $fullnamepareja = empty($_POST['fullnamepareja']) ? '' : $_POST['fullnamepareja'];

        if ( trim($nombre) === '') echo "<p>El nombre no puede estar vacio</p>";
        else echo "<p>El nombre es: $nombre</p>";

        if ( filter_var($edad, FILTER_VALIDATE_INT) ) echo "<p>La edad es: $edad</p>";
        else echo "<p>La edad no puede estar vacia</p>";

        if ( filter_var($correo, FILTER_VALIDATE_EMAIL) ) echo "<p>El correo es: $correo</p>";
        else echo "<p>El correo no puede estar vacio</p>";

        if ( filter_var($fullname, FILTER_CALLBACK, array('options' => 'Validacion::validateFullName')) ) echo "<p>El fullname es: $fullname</p>";
        else echo "<p>El fullname esta incorrecto</p>";

        if ( trim($casado) === '') echo "<p>El campo CASADO no puede estar vacio</p>";
        else echo "<p>El casado es: $casado</p>";

        if ( filter_var($fullnamepareja, FILTER_CALLBACK, array('options' => Validacion::validatePareja($casado))) ) echo "<p>El fullnamepareja (OK) es: $fullnamepareja</p>";
        else echo "<p>El fullname esta incorrecto</p>";
    }
?>

<div>
    <!-- action vacio: envia al mismo archivo php-->
    <form method="post" action="">
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" required />
        </div>
        <div>
            <label for="fullname">Full Name:</label>
            <input type="text" name="fullname" id="fullname" required placeholder="Apellidos, Nombres" />
        </div>
        <div>
            <label for="edad">Edad:</label>
            <input type="number" name="edad" id="edad" required />
        </div>
        <div>
            <label for="Correo">Correo:</label>
            <input type="email" name="correo" id="correo" required />
        </div>
        <div>
            <label for="Correo">Casado:</label>
            <select name="casado" required>
                <option value="">Seleccionar</option>
                <option value="SI">Si</option>
                <option value="NO">No</option>
            </select>
        </div>
        <div>
            <label for="fullnamepareja">Full Name Pareja:</label>
            <input type="text" name="fullnamepareja" id="fullnamepareja" placeholder="Apellidos, Nombres" />
        </div>
        <input type="submit" value="Enviar" name="submit" />
    </form>
</div>