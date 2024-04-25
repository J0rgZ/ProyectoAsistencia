<?php
include 'conexion.php';

$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

session_start();

// Función para generar una pregunta matemática aleatoria
function generateMathCaptcha() {
    $num1 = rand(1, 10);
    $num2 = rand(1, 10);
    $operators = array('+', '-', '*');
    $operator = $operators[rand(0, count($operators) - 1)];

    switch ($operator) {
        case '+':
            $result = $num1 + $num2;
            break;
        case '-':
            $result = $num1 - $num2;
            break;
        case '*':
            $result = $num1 * $num2;
            break;
    }

    $_SESSION['captcha_result'] = $result; // Almacenamos la respuesta en una variable de sesión

    return "$num1 $operator $num2 = ?";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userCaptcha = $_POST['captcha'];
    $correctCaptcha = $_SESSION['captcha_result'];

    // Verificar el captcha
    if (!isset($userCaptcha) || !is_numeric($userCaptcha) || (int)$userCaptcha !== $correctCaptcha) {
        // Respuesta del CAPTCHA incorrecta
        header("Location: index.php?error=captcha");
        exit();
    }

    // Las credenciales del usuario
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    try {
        $stmt = $conn->prepare("SELECT * FROM tb_Usuario WHERE Nombre=:usuario AND Clave=:clave");
        $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
        $stmt->bindParam(':clave', $clave, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // Credenciales correctas
            $_SESSION['usuario'] = $usuario;
            header("Location: VistaEmpleado/index.php");
        } else {
            // Credenciales incorrectas
            header("Location: index.php?error=true");
        }
    } catch (PDOException $ex) {
        echo "Error: " . $ex->getMessage();
    }
}

$conn = null; // Cerrar la conexión
?>