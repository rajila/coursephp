<?php
    echo "<h1><u>Editar Cookie</u></h1>";

    $usernameC = isset($_COOKIE['username']) ? $_COOKIE['username'] : null;
    $nameC = isset($_COOKIE['name']) ? $_COOKIE['name'] : null;
?>
<hr />
<h3><u>Valores actuales cookie</u></h3>

<?php
    echo "<p>El nombre de usuario es: <b>".(($usernameC)?$usernameC:'No existe')."</b></p>";
    echo "<p>El nombre completo es: <b>".(($nameC)?$nameC:'No existe')."</b></p>";
    echo "<hr />";
?>

<?php
    if ( isset($_REQUEST['submit']) ) { // Verifica si existe el submit
        $username = empty($_POST['username']) ? 'xxx' : $_POST['username'];
        $name = empty($_POST['name']) ? 'desconocido' : $_POST['name'];

        setcookie('username', $username, time() + (86400 * 1), "/"); // 86400 = 1 day
        setcookie('name', $name, time() + (86400 * 1), "/"); // 86400 = 1 day
        
        echo "<p>La cookie se ha modificado exitosamente</p>";
        echo "<p>El nombre de usuario esssss: <b>".$username."</b></p>";
        echo "<p>El nombre completo es: <b>$name</b></p>";
    }
?>

<div>
    <!-- action vacio: envia al mismo archivo php-->
    <form method="post" action="">
        <div>
            <label for="username">Username:</label>
            <input type="text" value="<?php echo isset($username)? $username:$usernameC?>" name="username" id="username" required />
        </div>
        <div>
            <label for="name">Name:</label>
            <input type="text" value="<?php echo isset($name)? $name:$nameC?>" name="name" id="name" required />
        </div>
        <input type="submit" value="Edit cookie" name="submit" />
    </form>
</div>