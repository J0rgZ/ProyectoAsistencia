<!DOCTYPE html>
<?php
    require '../conexion.php'; // Asegúrate de que la ruta al archivo de conexión sea correcta.
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de AREAS</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin: 20px 0;
        }

        .container {
            text-align: center;
        }

        .btnAgregar {
            margin-bottom: 10px;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 0 auto;
            background-color: white;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .btnEditar, .btnEliminar {
            text-decoration: none;
            padding: 5px 10px;
            margin-right: 5px;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
        }

        .btnEliminar {
            background-color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>LISTA DE AREAS</h1>
        <div class="btnAgregar">
            <a href="agregarArea.php" class="btnAgregar">
                <input type="button" value="AGREGAR AREA" name="btnAgregar">
            </a>
        </div>
        <table border="1">
            <thead>
                <tr>
                    <th>ID AREA</th>
                    <th>HORARIO</th>
                    <th>AREA</th>
                    <th>DESCRIPCION</th>
                    <th>OPERACION</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = $conn->prepare('SELECT * FROM TB_AREA');
                $stmt->execute();
                $resultados = $stmt->fetchAll(PDO::FETCH_OBJ);
                if (!empty($resultados)) {
                    foreach ($resultados as $result) {
                        echo "<tr>
                            <td>".$result->IdArea."</td>
                            <td>".$result->IdHorario."</td>
                            <td>".$result->NombreArea."</td>
                            <td>".$result->Descripcion."</td>
                            <td>
                                <a href='EditarArea.php?vidarea=$result->IdArea' class='btnEditar'>EDITAR</a>
                                <a href='EliminarArea.php?vidarea=$result->IdArea' class='btnEliminar'>ELIMINAR</a>
                            </td>
                            </tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>