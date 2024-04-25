<!DOCTYPE html>
<?php
    require '../conexion.php'; // Asegúrate de que la ruta al archivo de conexión sea correcta.
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Empleados</title>
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
        <h1>LISTA DE HORARIO</h1>
        <div class="btnAgregar">
            <a href="agregarHorario.php" class="btnAgregar">
                <input type="button" value="AGREGAR HORARIO" name="btnAgregar">
            </a>
        </div>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>TURNO</th>
                    <th>FECHA INICIO</th>
                    <th>FECHA FIN</th>
                    <th>HORA ENTRADA</th>
                    <th>HORA SALIDA</th>
                    <th>OPERACION</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = $conn->prepare('SELECT * FROM TB_HORARIO');
                $stmt->execute();
                $resultados = $stmt->fetchAll(PDO::FETCH_OBJ);
                if (!empty($resultados)) {
                    foreach ($resultados as $result) {
                        echo "<tr>
                            <td>".$result->IdHorario."</td>
                            <td>".$result->NombreHorario."</td>
                            <td>".$result->FechaInicio."</td>
                            <td>".$result->FechaFin."</td>
                            <td>".$result->HoraEntrada."</td>
                            <td>".$result->HoraSalida."</td>
                            <td>
                                <a href='EditarHorario.php?vhor=$result->IdHorario' class='btnEditar'>EDITAR</a>
                                <a href='EliminarHorario.php?vhor=$result->IdHorario' class='btnEliminar'>ELIMINAR</a>
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