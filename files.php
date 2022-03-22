<?php
    require_once("conexionDB.php");

    $allFiles = array();
    $iterator = new FilesystemIterator("./files");
    foreach($iterator as $entry) $allFiles[] = explode('.' , $entry->getFilename())[0];

    $usernameDisponibles = array();
    $bodySelect = '<option value="">Seleccione</option>';

    $query = "SELECT username FROM cliente"; 
    $result = mysqli_query($connectionDB, $query); // $connectionDB is the connection, $query is the query
    
    if ($result) {  // If the query was successful
        while ($row = mysqli_fetch_assoc($result)) {
            if ( !in_array($row['username'], $allFiles) ) {
                $bodySelect .= '<option value="'.$row['username'].'">'.$row['username'].'</option>';
                $usernameDisponibles[] = $row['username'];
            }
        }
    } else die("Query Failed.");

    // Create a new file
    if ( isset($_REQUEST['submit']) && isset($_POST['action']) && $_POST['action'] === "add" ) {
        $username = isset($_POST['username'])? $_POST['username'] : "";
        if ( in_array($username, $usernameDisponibles) ) {
            $file = fopen("./files/$username.txt", "w");
            fwrite($file, "Welcome $username!!" . PHP_EOL);
            fclose($file);
        }
        header("Location: files.php");
    } else if ( isset($_REQUEST['submit']) && isset($_POST['action']) && $_POST['action'] === "delete" ) { // Delete a file
        $username = isset($_POST['username'])? $_POST['username'] : "";
        if ( file_exists(__DIR__."./files/$username") ) { // Verify if the file exists
            unlink("./files/$username");
        }
        header("Location: files.php");
    }

    mysqli_close($connectionDB); // Close connection
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        let idClienteDelete = null;

        function preShowModal (event) {
            idClienteDelete = event.getAttribute("data-id");
            let spanNameCliente = document.getElementById("name-cliente-modal");
            spanNameCliente.innerHTML = event.getAttribute("data-name");
            let inputId = document.getElementById("idcliente");
            inputId.value = idClienteDelete;
        }

        function resetId () {
            idClienteDelete = null;
            let inputId = document.getElementById("idcliente");
            inputId.value = 0;
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Listado de archivos</h1>
        <hr/>
        <div>
            <form class="row g-3" action="" method="post">
                <input type="hidden" name="action" id="action" value="add" />
                <div class="col-auto">
                    <label for="username" class="col-form-label fw-bold">Nombre archivo</label>
                </div>
                <div class="col-2">
                    <select name="username" class="form-select" aria-label="Default select example">
                        <?php echo $bodySelect; ?>
                    </select>
                </div>
                <div class="col-auto">
                    <button type="submit" name="submit" class="btn btn-primary mb-3">Crear archivo</button>
                </div>
            </form>
        </div>
        <hr />
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Archivo</th>
                    <th>Contenido</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($iterator as $entry) { // While there are rows
                        $fp = fopen($entry->getPathname(), "r");
                        $contents = ($entry->getSize())?fread($fp, $entry->getSize()):'';
                        fclose($fp);
                        
                        echo "<tr>";
                        echo "<td>" . $entry->getFilename() . "</td>";
                        echo "<td>" . $contents . "</td>";
                        echo "<td class='text-end'>
                                <button data-id='".$entry->getFilename()."' data-name='".$entry->getFilename()."' type='button' onclick='preShowModal(this)' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#exampleModal'>
                                    Eliminar
                                </button>
                            </td>";
                        echo "</tr>";
                    }
                    
                    if ( count($allFiles) === 0 ) echo "<tr><td colspan='3' class='text-center'>No hay archivos!!</td></tr>";
                ?>
            </tbody>
        </table>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar cliente</h5>
                <button type="button" onclick='resetId()' class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Está seguro que desea eliminar al cliente: <b><span id="name-cliente-modal">xxxx</span></b>?
            </div>
            <div class="modal-footer">
                <form action="" method="post">
                    <input type="hidden" name="username" id="idcliente" value="0" />
                    <input type="hidden" name="action" id="action" value="delete" />
                    <button type="button" onclick='resetId()' class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <!-- <button type="submit" class="btn btn-primary">Ok</button> -->
                    <input class="btn btn-primary" type="submit" value="OK" name="submit" />
                </form>
            </div>
            </div>
        </div>
    </div>
</body>
</html>