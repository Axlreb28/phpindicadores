<?php
session_start();
$error = '';
$success = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $departamentos = $_POST['departamentos'];  // Array de IDs de departamentos
    $password = $_POST['password'];

    if (empty($first_name) || empty($last_name) || empty($email) || empty($departamentos) || empty($password)) {
        $error = "Por favor, llena todos los campos.";
    } else {
        $conn = new mysqli('localhost', 'root', '', 'tlalpan');

        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        $email_check_query = $conn->prepare("SELECT Email FROM RegistroUsuarios WHERE Email = ?");
        $email_check_query->bind_param("s", $email);
        $email_check_query->execute();
        $email_check_result = $email_check_query->get_result();

        if ($email_check_result->num_rows > 0) {
            $error = "El correo electrónico ya está registrado.";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $insert_query = $conn->prepare("INSERT INTO RegistroUsuarios (Nombre, Apellidos, Email, Contraseña) VALUES (?, ?, ?, ?)");
            $insert_query->bind_param("ssss", $first_name, $last_name, $email, $hashed_password);
            $insert_query->execute();
            $user_id = $insert_query->insert_id;

            foreach ($departamentos as $departamento_id) {
                $departamento_query = $conn->prepare("INSERT INTO UsuarioDepartamentos (UsuarioID, DepartamentoID) VALUES (?, ?)");
                $departamento_query->bind_param("ii", $user_id, $departamento_id);
                $departamento_query->execute();
            }

            $success = "Registro exitoso, ahora puedes iniciar sesión.";
            header("Location: login.php");
            exit();
        }

        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" type="image/png" href="/static/logo.png">
    <link rel="stylesheet" href="static/register.css">
</head>
<body>

    <!-- Contenido principal del Registro -->
    <div class="container mt-5">
        <h2>Registro</h2>
        <form method="POST" action="register.php">
            <div class="form-group">
                <label for="first_name">Nombre:</label>
                <input type="text" class="form-control" name="first_name" id="first_name" required>
            </div>
            <div class="form-group">
                <label for="last_name">Apellidos:</label>
                <input type="text" class="form-control" name="last_name" id="last_name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="departamentos">Departamentos:</label>
                <div class="checkbox-list">
                    <?php
                    $conn = new mysqli('localhost', 'root', '', 'indicadorestlalpan');
                    $departamento_result = $conn->query("SELECT ID, Departamento FROM Departamentos");
                    while ($row = $departamento_result->fetch_assoc()) {
                        echo "<div class='form-check'>
                                <input class='form-check-input' type='checkbox' name='departamentos[]' value='" . $row['ID'] . "' id='departamento" . $row['ID'] . "'>
                                <label class='form-check-label' for='departamento" . $row['ID'] . "'>" . $row['Departamento'] . "</label>
                              </div>";
                    }
                    $conn->close();
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Registrarse</button>
        </form>

        <?php if ($error): ?>
            <div class="alert alert-danger mt-3"><?php echo $error; ?></div>
        <?php endif; ?>

        <?php if ($success): ?>
            <div class="alert alert-success mt-3"><?php echo $success; ?></div>
        <?php endif; ?>

        <div id="formFooter">
            <a class="underlineHover btn btn-secondary" href="login.php">Iniciar Sesión</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

