<?php
session_start();
include "db.php";

$response = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name     = $_POST['Name'] ?? '';
    $email    = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($name === ""   $email === ""   $password === "") {
        $response['success'] = false;
        $response['message'] = "Champs manquants";
        echo json_encode($response);
        exit();
    }

    $hash = password_hash($password, PASSWORD_DEFAULT);

  
    $check = $conn->prepare("SELECT id FROM users WHERE email=?");
    $check->bind_param("s", $email);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        $response['success'] = false;
        $response['message'] = "Email déjà utilisé";
        echo json_encode($response);
        exit();
    }

    
    $stmt = $conn->prepare("INSERT INTO users (Name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $hash);

    if ($stmt->execute()) {

        
        $_SESSION['user_name']  = $name;
        $_SESSION['user_email'] = $email;

        $response['success'] = true;
        echo json_encode($response);
        exit();
    }

    $response['success'] = false;
    $response['message'] = "Erreur serveur";
    echo json_encode($response);
}
    
