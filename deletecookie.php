<?php
    echo "<h1><u>Delete Cookie</u></h1>";

    $usernameC = isset($_COOKIE['username']) ? $_COOKIE['username'] : 'No existe';
    $nameC = isset($_COOKIE['name']) ? $_COOKIE['name']:'No existe';

?>
<hr />
<h3><u>Valores actuales cookie</u></h3>

<?php
    echo "<p>El nombre de usuario es: <b>{$usernameC}</b></p>";
    echo "<p>El nombre completo es: <b>{$nameC}</b></p>";
    echo "<hr />";
?>

<?php
    if ( isset($_REQUEST['submit']) ) { // Verifica si existe el submit
        setcookie("username", "", time() - 3600); // Elimina la cookie
        setcookie("name", "", time() - 3600); // Elimina la cookie
        echo "<p>La cookie se ha eliminado exitosamente</p>";
    }
?>

<div>
    <!-- action vacio: envia al mismo archivo php-->
    <form method="post" action="">
        <input type="submit" value="Eliminar cookie" name="submit" />
    </form>
</div>