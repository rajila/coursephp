<?php
    session_start(); // Inicia sesion
    echo "<h1><u>Editar Sesion</u></h1>";

    $usernameS = isset($_SESSION['username']) ? $_SESSION['username'] : null;
    $nameS = isset($_SESSION['name']) ? $_SESSION['name'] : null;
?>
<hr />
<h3><u>Valores actuales sesion</u></h3>

<?php
    echo "<p>El nombre de usuario es: <b>".(($usernameS)?$usernameS:'No existe')."</b></p>";
    echo "<p>El nombre completo es: <b>".(($nameS)?$nameS:'No existe')."</b></p>";
    echo "<hr />";
?>

<?php
    if ( isset($_REQUEST['submit']) ) { // Verifica si existe el submit
        $username = empty($_POST['username']) ? 'xxx' : $_POST['username'];
        $name = empty($_POST['name']) ? 'desconocido' : $_POST['name'];
        
        
        $_SESSION['username'] = $username;
        $_SESSION['name'] = $name;
        
        echo "<p>La session se ha editado exitosamente</p>";
        echo "<p>El nombre de usuario es: <b>{$_SESSION['username']}</b></p>";
        echo "<p>El nombre completo es: <b>{$_SESSION['name']}</b></p>";
    }
?>

<div>
    <!-- action vacio: envia al mismo archivo php-->
    <form method="post" action="">
        <div>
            <label for="username">Username:</label>
            <input type="text" value="<?php echo isset($username)? $username:$usernameS?>" name="username" id="username" required />
        </div>
        <div>
            <label for="name">Name:</label>
            <input type="text" value="<?php echo isset($name)? $name:$nameS?>" name="name" id="name" required />
        </div>
        <input type="submit" value="Edit Sesion" name="submit" />
    </form>
</div>