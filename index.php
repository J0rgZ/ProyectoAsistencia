<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marcar Asistencia</title>
    <style>
        body {
            font-family: 'calibri';
            text-align: center;
            color: white;
        }
        
        .container {
            background-color: #cceeff;
            border-radius: 10px;
            padding: 20px;
            display: inline-block;
        }

        .clock {
            font-size: 102px;
            margin-top: 10px;
            color: black;
        }

        .date {
            font-size: 54px;
            margin-bottom: 10px;
            color: black; 
        }

        .dni-input {
            font-size: 16px;
            padding: 10px;
            width: 200px;
        }

        .submit-button {
            font-size: 16px;
            padding: 10px 20px;
            background-color: #1f53c5;
            border: none;
            color: white;
            cursor: pointer;
            border-radius: 4px;
        }
        
        .navbar {
            background-color: #1f53c5;
            color: white;
            padding: 30px;
            text-align: center;
            font-size: 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .advanced-options-button {
            background-color: #030100;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
            font-size: 16px;
        }
    </style>
    
</head>
<body>
    <div class="navbar">
        Sistema Control de Asistencia
        <a href='login.php'><button class="advanced-options-button">Iniciar Sesion</button></a>
    </div>
    <div class="container">
        <div class="clock" id="clock">12:00:00</div>
        <div class="date" id="date">Fecha: 18 de Septiembre, 2023</div>
    </div>
    <form action="procesar_asistencia.php" method="post">
        <input type="text" class="dni-input" name="dni" placeholder="DNI del empleado" required>
        <input type="submit" class="submit-button" value="Ingresar">
    </form>
    <script>
        function updateClock() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            const timeString = `${hours}:${minutes}:${seconds}`;
            document.getElementById('clock').innerText = timeString;

            const monthNames = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
            const month = monthNames[now.getMonth()];
            const day = String(now.getDate()).padStart(2, '0');
            const year = now.getFullYear();
            const dateString = `Fecha: ${day} de ${month}, ${year}`;
            document.getElementById('date').innerText = dateString;
        }

        setInterval(updateClock, 1000);
    </script>
    
</body>
</html>