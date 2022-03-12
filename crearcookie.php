<?php
    echo "<h1><u>Crear Cookie</u></h1>";
    if ( isset($_REQUEST['submit']) ) {
        $username = empty($_POST['username']) ? 'xxx' : $_POST['username'];
        $name = empty($_POST['name']) ? 'desconocido' : $_POST['name'];

        setcookie('username', $username, time() + (86400 * 1), "/"); // 86400 = 1 day
        setcookie('name', $name, time() + (86400 * 1), "/"); // 86400 = 1 day
        
        echo "<p>La cookie se ha creado exitosamente</p>";
        echo "<p>El nombre de usuario es: <b>{$_COOKIE['username']}</b></p>";
        echo "<p>El nombre completo es: <b>{$_COOKIE['name']}</b></p>";
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
        <input type="submit" value="Crear cookie" name="submit" />
    </form>
</div>