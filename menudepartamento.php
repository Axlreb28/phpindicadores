<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.php");
    exit();
}

$conn = new mysqli('localhost', 'root', '', 'tlalpan');
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$usuario_id = $_SESSION['usuario_id'];
$stmt = $conn->prepare("
    SELECT d.ID, d.Departamento
    FROM Departamentos d
    JOIN UsuarioDepartamentos ud ON d.ID = ud.DepartamentoID
    WHERE ud.UsuarioID = ?
");
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();
$departamentos = [];
while ($row = $result->fetch_assoc()) {
    $departamentos[] = $row;
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/menudepartamentos.css">
</head>

<body>
    <?php include 'includes/navbarh.php'; ?>
    
    <div id="formContent">
        <h2 class="centro">Departamentos</h2>
        <div class="menu-grid">
            <?php foreach ($departamentos as $departamento): ?>
                <a class="menu-item" href="menusformularios/menu<?php echo str_replace(' ', '', $departamento['Departamento']); ?>.php"><?php echo $departamento['Departamento']; ?></a>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
