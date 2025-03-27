<?php
header('Content-Type: application/json');
$data = json_decode(file_get_contents('php://input'), true);

if (!$data) {
    echo json_encode(['message' => 'Invalid request data']);
    exit;
}

// Sanitize and validate inputs
$firstName = ucfirst(strtolower(preg_replace("/[^a-zA-Z]/", "", $data['firstName'])));
$middleName = ucfirst(strtolower(preg_replace("/[^a-zA-Z]/", "", $data['middleName'])));
$lastName = ucfirst(strtolower(preg_replace("/[^a-zA-Z]/", "", $data['lastName'])));
$email = filter_var($data['email'], FILTER_VALIDATE_EMAIL);
$password = sha1(base64_decode($data['password']));

if (!$email) {
    echo json_encode(['message' => 'Invalid email format']);
    exit;
}

try {
    $pdo = new PDO('mysql:host=localhost;dbname=yourlastnameDB', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Generate unique ID with prefix
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM userTB");
    $stmt->execute();
    $userCount = $stmt->fetchColumn();
    $id = 'USR-' . str_pad($userCount + 1, 6, '0', STR_PAD_LEFT);

    $stmt = $pdo->prepare("INSERT INTO userTB (id, first_name, middle_name, last_name, email, password, created_at, updated_at) 
                           VALUES (?, ?, ?, ?, ?, ?, NOW(), NOW())");
    $stmt->execute([$id, $firstName, $middleName, $lastName, $email, $password]);

    echo json_encode(['message' => 'User registered successfully']);
} catch (PDOException $e) {
    echo json_encode(['message' => 'Error: ' . $e->getMessage()]);
}
?>
