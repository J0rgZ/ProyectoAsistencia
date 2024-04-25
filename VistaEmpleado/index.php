<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión de Asistencias</title>
    <style>
        /* Estilos CSS */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        .header {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        .container {
            display: flex;
            flex-grow: 1;
        }

        .sidebar {
            flex: 0 0 200px;
            background-color: #f4f4f4;
            padding: 10px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .content {
            flex-grow: 1;
            padding: 20px;
        }

        .options {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .option-button {
            margin: 0 10px;
            padding: 100px 100px;
            font-size: 18px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .option-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Sistema de Gestión de Asistencias</h1>
    </div>

    <div class="container">
        <div class="sidebar">
            <h2>Opciones Avanzadas</h2>
            <ul>
                <li><a href="ListarEmpleado.php">Listar Empleados</a></li>
                <li><a href="VistaHorario/ListarHorario.php">Listar Horarios</a></li>
                <li><a href="VistaArea/ListarArea.php">Listar Areas</a></li>
                <!-- Agrega más opciones según lo que necesites -->
            </ul>
        </div>

        <div class="content">
            <h2>Menu</h2>
            <div class="options">
                <a href='ListarEmpleado.php'><button class="option-button">Listar Empleados</button></a>
                <a href='../VistaHorario/ListarHorario.php'><button class="option-button">Listar Horarios</button></a>
                <a href='../VistaArea/ListarArea.php'><button class="option-button">Listar Areas</button></a>
                <button class="option-button">Generar Reporte</button>
                <!-- Agrega más botones según lo que necesites -->
            </div>
            <!-- Contenido del centro de la página -->
        </div>
    </div>
</body>
</html>