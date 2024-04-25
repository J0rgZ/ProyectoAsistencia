<?php
require 'conexion.php';

try {
    date_default_timezone_set('America/Lima'); // Configura la zona horaria de Perú

    $dniEmpleado = $_POST['dni']; // Supongo que el campo del formulario se llama 'dni'
    $fechaAsistencia = date('Y-m-d'); // Obtiene la fecha actual en el formato 'YYYY-MM-DD'
    $horaActual = date('H:i:s'); // Obtiene la hora actual en el formato 'HH:MM:SS'

    // Verifica si ya existe una asistencia para el mismo empleado y la misma fecha
    $stmt = $conn->prepare('SELECT * FROM Tb_Asistencia WHERE DniEmpleado = :dni AND FechaAsistencia = :fecha');
    $stmt->bindParam(':dni', $dniEmpleado);
    $stmt->bindParam(':fecha', $fechaAsistencia);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // Ya existe una asistencia, actualiza la hora de salida
        $re = $conn->prepare('UPDATE Tb_Asistencia SET HoraSalida = :hora WHERE DniEmpleado = :dni AND FechaAsistencia = :fecha');
        $re->bindParam(':dni', $dniEmpleado);
        $re->bindParam(':fecha', $fechaAsistencia);
        $re->bindParam(':hora', $horaActual);
        $re->execute();

        echo "Salida registrada correctamente.";
    } else {
        // No existe una asistencia, registra la entrada
        $re = $conn->prepare('INSERT INTO Tb_Asistencia (DniEmpleado, FechaAsistencia, HoraEntrada) VALUES (:dni, :fecha, :hora)');
        $re->bindParam(':dni', $dniEmpleado);
        $re->bindParam(':fecha', $fechaAsistencia);
        $re->bindParam(':hora', $horaActual);
        $re->execute();

        echo "Entrada registrada correctamente.";
    }
} catch (PDOException $e) {
    echo "Error al procesar la asistencia: " . $e->getMessage();
}
?>