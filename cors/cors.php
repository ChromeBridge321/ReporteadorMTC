<?php
$allowed_origin = "http://localhost:4200";

if (isset($_SERVER['HTTP_ORIGIN']) && $_SERVER['HTTP_ORIGIN'] === $allowed_origin) {
    header("Access-Control-Allow-Origin: $allowed_origin");
} else {
    // Durante desarrollo puedes permitir todos
    header("Access-Control-Allow-Origin: *");
}

header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
//header("Access-Control-Allow-Credentials: true");

// Manejar preflight
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}
