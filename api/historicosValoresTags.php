<?php
require_once __DIR__ . '/../../cors/cors.php';
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/../../config/conexion.php';

// Valores (pueden venir de input del usuario)
$fechaInicio = '2025-10-15 00:00:00.000';
$fechaFin    = '2025-10-16 00:00:00.000';
$idPozo      = 254;

// Consulta segura
$sql = "
    SELECT top 100 VH.[IdPozo],
           VH.[IdEquipo],
           IP.[NombrePozo],
           VH.[IdTag],
           VH.[IdDetalleTag],
           VH.[Fecha],
           VH.[Valor],
           PT.Nombre
    FROM [bd_MTC_PozaRica].[dbo].[t_Historicos.ValoresTags] AS VH
    INNER JOIN [t_Instalacion.Pozos] AS IP ON IP.IdPozo = VH.IdPozo
    INNER JOIN [t_Proceso.Tags] AS PT ON PT.IdTag = VH.IdTag
    WHERE VH.Fecha >= ? AND VH.Fecha < ? AND VH.IdPozo = ?
    ORDER BY VH.Fecha ASC
";

// Parámetros
$params = [$fechaInicio, $fechaFin, $idPozo];

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
