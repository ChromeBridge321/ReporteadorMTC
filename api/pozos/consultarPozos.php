<?php
require_once __DIR__ . '/../../cors/cors.php';
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/../../config/conexion.php';

// Valores (pueden venir de input del usuario)
$filtros    = ['dis', '´dis', 'des', 'disp', 'p', 'di', 'dip', 'd', ''];
$nombrePozo = " and NombrePozo = ? "; // Ejemplo de filtro
                                      // Consulta segura
$sql = "
	select IdPozo, NombrePozo from [t_Instalacion.Pozos] where NombrePozo not like '%OCUPADO%' ";

for ($i = 0; $i < count($filtros); $i++) {
    $sql = $sql . $nombrePozo;
}

$sql .= " order by NombrePozo asc ";

// Parámetros
$params = ['dis', '´dis', 'des', 'disp', 'p', 'di', 'dip', 'd', ''];

// Ejecutar con parámetros
$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    http_response_code(500);
    echo json_encode(["error" => sqlsrv_errors()]);
    exit;
}

$historicos = [];
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    $historicos[] = $row;
}

echo json_encode($historicos);
