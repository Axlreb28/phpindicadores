<?php
session_start();
// Ejemplo de código para iniciar sesión DEPARTAMENTOS
$_SESSION['departamento'] = 'NombreDelDepartamento';
?>

<!DOCTYPE html>
<html lang="es">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="../css/menudepartamento.css"> 
</head>

<body>
    <?php include '../includes/navbarh.php'; ?>
    
    <div id="formContent">

        <h2 class="centro"> Programas sociales</h2>
        <div class="menu-grid">
            <a class="menu-item" href="../formulariosGPT/form.php">Cuidar y ser cuidado para el bienestar 2025</a>
            <a class="menu-item" href="../formulariosGPT/formapoyo.php">Apoyo para el bienestar 2025</a>
            <a class="menu-item" href="../formulariosGPT/formtransfor.php">Transformando en Comunidad</a>
            <a class="menu-item" href="../formulariosGPT/formjuven.php">Juventudes en Transformacion</a>
            <a class="menu-item" href="../formulariosGPT/formcuidadoinfancias.php">Fortalecimiento para el cuidado y desarrollo integral de las infancias</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

