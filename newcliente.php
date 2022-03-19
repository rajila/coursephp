<?php
    $nombres = null;
    $username = null;
    $correo = null;

    $errores = array();
    $flagValidation = false;

    if ( isset($_REQUEST['submit']) ) {
        require_once('Validacion.php');
        require_once("conexionDB.php");

        $nombres = isset($_POST['nombres']) ? $_POST['nombres'] : '';
        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $correo = isset($_POST['correo']) ? $_POST['correo'] : '';

        $flagValidation = true;

        if ( empty($nombres) ) $errores['nombres'] = 'El nombre es obligatorio';
        else if ( !filter_var($nombres, FILTER_CALLBACK, array('options' => 'Validacion::validateFullName')) ) $errores['nombres'] = 'El nombre es incorrecto. Apellidos, Nombres';

        if ( empty($username) ) $errores['username'] = 'El username es obligatorio';
        else if ( !filter_var($username, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => '/^[a-zA-Z0-9]{5,}$/'))) ) $errores['username'] = 'El username debe tener al menos 5 caracteres alfanumericos';

        if ( empty($correo) ) $errores['correo'] = 'El correo es obligatorio';
        else if ( !filter_var($correo, FILTER_VALIDATE_EMAIL) ) $errores['correo'] = 'El correo es incorrecto';

        $query = "INSERT INTO cliente (nombres, correo, username) VALUES ('$nombres', '$correo', '$username')";

        if ( count($errores) === 0 ) {
            $result = mysqli_query($connectionDB, $query);

            if ( $result ) {
                header('Location: crudcliente.php');
            } else {
                $errores['general'] = 'Error al registrar el usuario. Intente mas tarde.';
            }
        }
    
        mysqli_close($connectionDB); // Close connection
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Nuevo Cliente</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            <h1>Nuevo cliente</h1>
            <hr/>
            <div class="col-sm-4">
                <form class="needs-validation" novalidate method="post" action="">
                    <div class="mb-3">
                        <label class="form-label fw-bold" for="nombres">Nombres</label>
                        <input class="form-control <?php echo ($flagValidation?(isset($errores['nombres'])?'is-invalid':'is-valid'):'') ?>" type="text" value="<?php echo $nombres?>" name="nombres" id="nombres" placeholder="Apellido, Nombres" />
                        <?php 
                            if ( $flagValidation && isset($errores['nombres']) ) {
                        ?>
                            <div class="invalid-feedback">
                                <?php echo $errores['nombres'] ?>
                            </div>
                        <?php
                            }
                        ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold" for="username">Username</label>
                        <input class="form-control <?php echo ($flagValidation?(isset($errores['username'])?'is-invalid':'is-valid'):'') ?>" type="text" value="<?php echo $username?>" name="username" id="username" />
                        <?php 
                            if ( $flagValidation && isset($errores['username']) ) {
                        ?>
                            <div class="invalid-feedback">
                                <?php echo $errores['username'] ?>
                            </div>
                        <?php
                            }
                        ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold" for="correo">Correo</label>
                        <input class="form-control <?php echo ($flagValidation?(isset($errores['correo'])?'is-invalid':'is-valid'):'') ?>" type="email" value="<?php echo $correo?>" name="correo" id="correo" />
                        <?php 
                            if ( $flagValidation && isset($errores['correo']) ) {
                        ?>
                            <div class="invalid-feedback">
                                <?php echo $errores['correo'] ?>
                            </div>
                        <?php
                            }
                        ?>
                    </div>
                    <input class="btn btn-primary" type="submit" value="Guardar" name="submit" />
                </form>
            </div>
        </div>
    </body>
</html>