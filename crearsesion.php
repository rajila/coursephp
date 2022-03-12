<?php
    echo "<h1><u>Crear Sesion</u></h1>";
    if ( isset($_REQUEST['submit']) ) {
        $username = empty($_POST['username']) ? 'xxx' : $_POST['username'];
        $name = empty($_POST['name']) ? 'desconocido' : $_POST['name'];
        
        session_start(); // Inicia sesion
        $_SESSION['username'] = $username;
        $_SESSION['name'] = $name;
        
        echo "<p>La session se ha creado exitosamente</p>";
        echo "<p>El nombre de usuario es: <b>{$_SESSION['username']}</b></p>";
        echo "<p>El nombre completo es: <b>{$_SESSION['name']}</b></p>";
    }
?>

<div>
    <!-- action vacio: envia al mismo archivo php-->
    <form method="post" action="">
        <div>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required />
        </div>
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required />
        </div>
        <input type="submit" value="Crear Sesion" name="submit" />
    </form>
</div>