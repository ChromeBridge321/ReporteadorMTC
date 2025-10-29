<?php
require_once __DIR__ . '/../../cors/cors.php';
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/../../config/conexion.php';

// Consulta segura
$sql = "select IdPozo, NombrePozo from [t_Instalacion.Pozos]";

// Ejecutar con parámetros
$stmt = sqlsrv_query($conn, $sql, []);

if ($stmt === false) {
    http_response_code(500);
    echo json_encode([
        'error'   => true,
        'message' => 'Error en la consulta',
        'details' => sqlsrv_errors(),
    ]);
    exit;
}
$pozos   = [];
$isFirst = true;

// Iniciar el array JSON manualmente
echo '[';

while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    if ($row) { // Verificar que el registro no sea nulo o vacío
        $pozos[] = $row;

        // Codificar a JSON
        $jsonRow = json_encode($row, JSON_UNESCAPED_UNICODE);

        // Solo imprimir si json_encode tuvo éxito
        if ($jsonRow && $jsonRow !== 'null' && $jsonRow !== 'false') {
            // Agregar coma antes de cada elemento excepto el primero
            if (! $isFirst) {
                echo ',';
            }
            $isFirst = false;

            // Imprimir cada objeto JSON
            echo $jsonRow;
        }
    }
}

// Cerrar el array JSON
echo ']';
