<?php
// procesar_formulario.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dimension_programa = $_POST['dimension_programa'] ?? '';
    $name1 = $_POST['name1'] ?? '';
    $actividad = $_POST['actividad'] ?? '';
    $observacion = $_POST['observacion'] ?? '';
    $colec = $_POST['colec'] ?? '';
    $tperson = $_POST['tperson'] ?? '';
    $nombre = $_POST['nombre'] ?? '';
    $apellido = $_POST['apellido'] ?? '';
    $sexo = $_POST['sexo'] ?? '';
    $telefono = $_POST['telefono'] ?? '';
    $fecha_nacimiento = $_POST['fecha_nacimiento'] ?? '';
    $colonia = $_POST['colonia'] ?? '';
    $ubicacion = $_POST['ubicacion'] ?? '';
    $direccion = $_POST['direccion'] ?? '';

    // Aquí podrías guardar los datos en la base de datos
    // Ejemplo:
    // require 'database.php';
    // $db = new mysqli('host', 'usuario', 'contraseña', 'nombre_base_datos');
    // $query = $db->prepare("INSERT INTO tabla (...) VALUES (...)");
    // $query->bind_param('...', $dimension_programa, $name1, ...);
    // $query->execute();
    
    // Redirigir de nuevo al formulario o a una página de éxito
    header('Location: formapoyo.php?status=success');
    exit;
}
?>
