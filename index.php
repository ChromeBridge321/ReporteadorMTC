<?php
require __DIR__ . '/cors/cors.php';

$request = $_SERVER['REQUEST_URI'];
$method  = $_SERVER['REQUEST_METHOD'];

$request = str_replace("/Reporteador_MTC", "", $request);

if (preg_match("/^\/api\/historicos\/?$/", $request)) {
    switch ($method) {
        case 'GET':
            require __DIR__ . '/api/historicos/historicosValoresTags.php';
            break;
        default:
            http_response_code(405);
            echo json_encode(["message" => "Método no permitido"]);
    }
} elseif (preg_match("/^\/api\/pozos\/?$/", $request)) {
    switch ($method) {
        case 'GET':
            require __DIR__ . '/api/pozos/consultarPozos.php';
            break;
        case 'GET':
            require __DIR__ . '/api/pozos/consultarTodosPozos.php';
            break;
        default:
            http_response_code(405);
            echo json_encode(["message" => "Método no permitido"]);
    }
} else {
    http_response_code(404);
    echo json_encode(["message" => "Ruta no encontrada"]);
}
