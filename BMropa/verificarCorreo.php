<?php
header('Content-Type: application/json');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'conexion.php';

$data = json_decode(file_get_contents('php://input'), true);

if (json_last_error() !== JSON_ERROR_NONE) {
    echo json_encode(['success' => false, 'message' => 'Error al decodificar JSON.']);
    exit;
}

$correo = isset($data['correo']) ? $data['correo'] : '';

if (empty($correo)) {
    echo json_encode(['success' => false, 'message' => 'No se proporcionó un correo.']);
    exit;
}

$conexion = new conexion();
$cn = $conexion->getConexion();

if (!$cn) {
    echo json_encode(['success' => false, 'message' => 'No se pudo conectar a la base de datos.']);
    exit;
}

$query = "SELECT COUNT(*) AS total FROM usuario WHERE correo = ?";
$stmt = $cn->prepare($query);

if ($stmt === false) {
    echo json_encode(['success' => false, 'message' => 'Error al preparar la consulta.']);
    exit;
}

$stmt->bind_param("s", $correo);
$stmt->execute();

$result = $stmt->get_result();
if ($result === false) {
    echo json_encode(['success' => false, 'message' => 'Error al ejecutar la consulta.']);
    exit;
}

$data_result = $result->fetch_assoc();

if ($data_result['total'] > 0) {
    echo json_encode(['success' => true, 'registrado' => true]);
} else {
    echo json_encode(['success' => true, 'registrado' => false]);
}

$stmt->close();
$cn->close();
?>
