<?php
require_once 'config.php';
use entities\Order;

header('Content-Type: application/json');
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        $entity = $_REQUEST["entity"];
        $method = $_REQUEST["method"];
        include_once __DIR__ . "/entities/$entity.php";
        $entity = match ($entity) {
            'Order' => new Order($pdo)
        };
        $result = $entity->$method($_REQUEST["id"]);
        echo json_encode($result);
        break;
    default:
        // Invalid method
        http_response_code(405);
        echo json_encode(['error' => 'Method not allowed']);
        break;
}