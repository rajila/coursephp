<?php
    echo "<h1><u>Recuperar parametros por POST</u></h1>";
    if ( isset($_REQUEST['submit']) ) {
        $numeroI = empty($_POST['numeroi']) ? 0 : $_POST['numeroi'];
        $numeroII = empty($_POST['numeroii']) ? 0 : $_POST['numeroii'];
        $suma = $numeroI + $numeroII;
        echo "<p>La suma: $numeroI + $numeroII = $suma</p>";
    }
?>

<div>
    <!-- action vacio: envia al mismo archivo php-->
    <form method="post" action="">
        <div>
            <label for="numeroi">Numero I:</label>
            <input type="number" name="numeroi" id="numeroi" required />
        </div>
        <div>
            <label for="numeroii">Numero II:</label>
            <input type="number" name="numeroii" id="numeroii" required />
        </div>
        <input type="submit" value="Sumar" name="submit" />
    </form>
</div>