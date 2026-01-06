<?php
session_start();
header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$found = false;
foreach ($_SESSION['cart'] as &$item) {
    if ($item['name'] === $data['name']) {
        $item['quantity'] += 1;
        $found = true;
        break;
    }
}

if (!$found) {
    $_SESSION['cart'][] = [
        "name"     => $data['name'],
        "price"    => $data['price'],
        "image"    => $data['image'],
        "quantity" => 1
    ];
}

echo json_encode([
    "success" => true,
    "count" => array_sum(array_column($_SESSION['cart'], 'quantity'))
]);
