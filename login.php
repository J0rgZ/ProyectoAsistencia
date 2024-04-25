<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <style>
        * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
      
      .error-message {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #ff6f61;
        padding: 10px 20px;
        border-radius: 5px;
        color: white;
        font-size: 16px;
        z-index: 9999;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }

      body {
        background-image: url('fondo.jpg');
      }

      .form-register {
        width: 400px;
        background: #24303c;
        padding: 30px;
        margin: auto;
        margin-top: 100px;
        border-radius: 4px;
        font-family: 'calibri';
        color: white;
        box-shadow: 7px 13px 37px #000;
      }

      .form-register h2 {
        font-size: 22px;
        margin-bottom: 20px;
      }

      .controls {
        width: 100%;
        background: #24303c;
        padding: 10px;
        border-radius: 4px;
        margin-bottom: 16px;
        border: 1px solid #1f53c5;
        font-family: 'calibri';
        font-size: 18px;
        color: white;
      }

      .form-register p {
        height: 40px;
        text-align: center;
        font-size: 18px;
        line-height: 40px;
        color: red; /* Color rojo para los mensajes de error */
      }

      .form-register a {
        color: white;
        text-decoration: none;
      }

      .form-register a:hover {
        color: white;
        text-decoration: underline;
      }

      .form-register .botons {
        width: 100%;
        background: #1f53c5;
        border: none;
        padding: 12px;
        color: white;
        margin: 16px 0;
        font-size: 16px;
      }

      .error-message {
        text-align: center;
        color: red; /* Color rojo para los mensajes de error */
        margin-bottom: 10px;
      }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        const urlParams = new URLSearchParams(window.location.search);
        const error = urlParams.get('error');
        const errorMessageDiv = document.getElementById('error-message');

        if (error === 'captcha') {
            errorMessageDiv.innerText = 'El captcha es incorrecto. Inténtalo de nuevo.';
            errorMessageDiv.style.display = 'block';
        } else if (error === 'true') {
            errorMessageDiv.innerText = 'Credenciales incorrectas. Inténtalo de nuevo.';
            errorMessageDiv.style.display = 'block';
        }
    });
    </script>   
</head>
<body>
    <div class="form-register">
        <h2>Sistema Control de Asistencia</h2><br>
        
        <?php
        include 'conexion.php';

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
                $_SESSION['captcha_error'] = 'Captcha incorrecto. Inténtalo de nuevo.';
                header("Location: index.php?error=captcha");
                exit();
            }

            $usuario = $_POST['usuario'];
            $clave = $_POST['clave'];

            try {
                $stmt = $conn->prepare("SELECT * FROM Usuario WHERE Nombre=:usuario AND Clave=:clave");
                $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
                $stmt->bindParam(':clave', $clave, PDO::PARAM_STR);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    // Credenciales correctas
                    $_SESSION['usuario'] = $usuario;
                    header("Location: VistaEmpleado/index.php");
                } else {
                    // Credenciales incorrectas
                    $_SESSION['login_error'] = 'Credenciales incorrectas. Inténtalo de nuevo.';
                    header("Location: index.php?error=true");
                }
            } catch (PDOException $ex) {
                echo "Error: " . $ex->getMessage();
            }
        }

        $conn = null; // Cerrar la conexión
        ?>

        <?php
        // Mostrar mensaje de error del CAPTCHA
        if (isset($_SESSION['captcha_error'])) {
            echo '<p class="error-message">' . $_SESSION['captcha_error'] . '</p>';
            unset($_SESSION['captcha_error']); // Limpiar el mensaje después de mostrarlo
        }

        // Mostrar mensaje de error de credenciales
        if (isset($_SESSION['login_error'])) {
            echo '<p class="error-message">' . $_SESSION['login_error'] . '</p>';
            unset($_SESSION['login_error']); // Limpiar el mensaje después de mostrarlo
        }
        ?>

        <form action="procesar_login.php" method="post">
            <input type="text" class="controls" name="usuario" placeholder="Nombre de Usuario" required>
            <input type="password" class="controls" name="clave" placeholder="Contraseña" required>

            <label for="captcha">Captcha: <?php echo generateMathCaptcha(); ?></label>
            <input type="text" class="controls" name="captcha" placeholder="Respuesta del CAPTCHA" required>

            <input type="submit" class="botons" value="Iniciar Sesión">
        </form>
    </div><br><br>
    <div id="error-message" class="error-message" style="display:none;"></div>
</body>
</html>