<?php
    require_once("conexionDB.php");

    if ( isset($_REQUEST['submit']) ) {
        $id = $_POST['idcliente'];

        $query = "DELETE FROM cliente WHERE idcliente = '$id'";

        $result = mysqli_query($connectionDB, $query);

        if ( !$result ) {
            echo "Error: " . $query . "<br>" . mysqli_error($connectionDB);
            // die("Query Failed.");
        }
    }

    $query = "SELECT idcliente, nombres, correo, username FROM cliente"; 

    $result = mysqli_query($connectionDB, $query); // $connectionDB is the connection, $query is the query

    if (!$result) {  // If the query was successful
        die("Query Failed."); // If not successful, it will show the error
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
        <h1>Listado de clientes</h1>
        <hr/>
        <a href="newcliente.php" class="btn btn-primary">Agregar cliente</a>
        <hr />
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombres</th>
                    <th>Correo</th>
                    <th>Username</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if (mysqli_num_rows($result) > 0) { // If the query was successful and there are rows
                        while ($row = mysqli_fetch_array($result)) { // While there are rows
                            echo "<tr>";
                            echo "<td>" . $row["idcliente"] . "</td>";
                            echo "<td>" . $row["nombres"] . "</td>";
                            echo "<td>" . $row["correo"] . "</td>";
                            echo "<td>" . $row["username"] . "</td>";
                            echo "<td class='text-end'>
                                    <a class='btn btn-warning' href='./editcliente.php?id=". $row["idcliente"] ."' title='Editar'>Editar</a>
                                    <button data-id='". $row["idcliente"] ."' data-name='". $row["nombres"] ."' type='button' onclick='preShowModal(this)' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#exampleModal'>
                                        Eliminar
                                    </button>
                                </td>";
                            echo "</tr>";
                        }
                    }
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
                    <input type="hidden" name="idcliente" id="idcliente" value="0" />
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