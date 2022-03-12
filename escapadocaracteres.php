<?php
    echo "<h1><u>Escapado de caracteres</u></h1>";
    
    if ( isset($_REQUEST['submit']) ) {
        $nombre = empty($_POST['nombre']) ? '' : $_POST['nombre'];

        echo "<p><b>SIN</b> escapado de caracteres es: $nombre</p>";
        
        echo "<p><b>CON</b> escapado de caracteres es:". htmlspecialchars($nombre) ."</p>";
    }
?>

<div>
    <!-- action vacio: envia al mismo archivo php-->
    <form method="post" action="">
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" required />
        </div>
        <input type="submit" value="Enviar" name="submit" />
    </form>
</div>