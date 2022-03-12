<?php
    session_start(); // Inicia sesion
    echo "<h1><u>Eliminar Sesion</u></h1>";

    $usernameS = isset($_SESSION['username']) ? $_SESSION['username'] : 'No existe';
    $nameS = isset($_SESSION['name']) ? $_SESSION['name']:'No existe';

?>
<hr />
<h3><u>Valores actuales sesion</u></h3>

<?php
    echo "<p>El nombre de usuario es: <b>{$usernameS}</b></p>";
    echo "<p>El nombre completo es: <b>{$nameS}</b></p>";
    echo "<hr />";
?>

<?php
    if ( isset($_REQUEST['submit']) ) { // Verifica si existe el submit
        // remove all session variables
        session_unset();
        session_destroy(); // Destruye la sesion
        echo "<p>La session se ha eliminado exitosamente</p>";
    }
?>

<div>
    <!-- action vacio: envia al mismo archivo php-->
    <form method="post" action="">
        <input type="submit" value="Eliminar Sesion" name="submit" />
    </form>
</div>