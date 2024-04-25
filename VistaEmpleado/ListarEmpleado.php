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
        <h1>LISTA DE EMPLEADOS</h1>
        <div class="btnAgregar">
            <a href="agregarEmpleado.php" class="btnAgregar">
                <input type="button" value="AGREGAR EMPLEADO" name="btnAgregar">
            </a>
        </div>
        <table border="1">
            <thead>
                <tr>
                    <th>DNI</th>
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                    <th>GENERO</th>
                    <th>TELEFONO</th>
                    <th>PUESTO</th>
                    <th>ESTADO</th>
                    <th>AREA</th>
                    <th>OPERACION</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = $conn->prepare('SELECT * FROM TB_EMPLEADO');
                $stmt->execute();
                $resultados = $stmt->fetchAll(PDO::FETCH_OBJ);
                if (!empty($resultados)) {
                    foreach ($resultados as $result) {
                        echo "<tr>
                            <td>".$result->DniEmpleado."</td>
                            <td>".$result->Nombre."</td>
                            <td>".$result->Apellido."</td>
                            <td>".$result->Genero."</td>
                            <td>".$result->Telefono."</td>
                            <td>".$result->Puesto."</td>
                            <td>".$result->Estado."</td>
                            <td>".$result->IdArea."</td>
                            <td>
                                <a href='editarempleado.php?vdni=$result->DniEmpleado' class='btnEditar'>EDITAR</a>
                                <a href='eliminarempleado.php?vdni=$result->DniEmpleado' class='btnEliminar'>ELIMINAR</a>
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