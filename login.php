<?php
session_start();
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $error = "Por favor, llena todos los campos.";
    } else {
        $conn = new mysqli('localhost', 'root', '', 'tlalpan');

        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("
            SELECT u.ID AS UsuarioID, u.Contraseña 
            FROM RegistroUsuarios u
            WHERE u.Email = ?
        ");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            $error = "El correo electrónico es incorrecto o no está registrado.";
        } else {
            $row = $result->fetch_assoc();
            $usuario_id = $row['UsuarioID'];
            $hashed_password = $row['Contraseña'];

            if (password_verify($password, $hashed_password)) {
                $_SESSION['usuario'] = $email;
                $_SESSION['usuario_id'] = $usuario_id;

                header("Location: menudepartamento.php");
                exit();
            } else {
                $error = "Contraseña incorrecta.";
            }
        }

        $stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="static/css/login.css">
    <link rel="icon" type="image/png" href="static/img/logo.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="login-page">
        <h1>¡Bienvenid@!</h1>
        <div class="wrapper fadeInDown">
            <div id="formContent">
                <div class="logo">
                    <img src="static/img/logo.png" id="imagen" alt="Logo">
                </div>
                <form method="POST" action="login.php">
                    <div class="form-group">
                        <label for="email">Correo Electrónico:</label>
                        <input type="email" id="email" class="fadeIn second form-control" name="email" placeholder="Correo Electrónico" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña:</label>
                        <input type="password" id="password" class="fadeIn third form-control" name="password" placeholder="Contraseña" required>
                    </div>
                    <input type="submit" class="fadeIn fourth button" value="Iniciar Sesión">
                </form>

                <?php if ($error): ?>
                    <div class="alert mt-3"><?php echo $error; ?></div>
                <?php endif; ?>

                <div id="formFooter">
                    <a class="underlineHover button-secondary" href="register.php">Registrarse</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
