<?php
session_start();
header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

$index  = $data['index'] ?? null;
$action = $data['action'] ?? null;
$field  = $data['field'] ?? null;
$value  = $data['value'] ?? null;

if (!isset($_SESSION['cart'][$index])) {
    echo json_encode(['success' => false, 'message' => 'Produit introuvable dans le panier']);
    exit;
}

switch($action){
    case 'update':
        if($field !== null){
            if($field === 'quantity' || $field === 'age'){
                $_SESSION['cart'][$index][$field] = is_numeric($value) ? (int)$value : 0;
            } elseif($field === 'size'){
                $_SESSION['cart'][$index][$field] = trim($value);
            }
        }
        break;
    case 'add':
        $_SESSION['cart'][$index]['quantity'] = ($_SESSION['cart'][$index]['quantity'] ?? 0) + 1;
        break;
    case 'remove':
        $_SESSION['cart'][$index]['quantity'] = ($_SESSION['cart'][$index]['quantity'] ?? 1) - 1;
        if($_SESSION['cart'][$index]['quantity'] <= 0) unset($_SESSION['cart'][$index]);
        break;
    default:
        echo json_encode(['success'=>false,'message'=>'Action non reconnue']);
        exit;
}

$item = &$_SESSION['cart'][$index];
$item['age']      = isset($item['age']) ? (int)$item['age'] : 0;
$item['size']     = $item['size'] ?? '';
$item['quantity'] = isset($item['quantity']) ? (int)$item['quantity'] : 1;

echo json_encode(['success'=>true, 'cart'=>$_SESSION['cart']]);
