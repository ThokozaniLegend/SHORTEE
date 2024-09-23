<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $long_url = $data['long_url'];
    $user_id = $data['user_id'];  // Assume user_id is passed in the request

    // Function to generate a unique short code
    function generateShortCode($length = 6) {
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    }

    // Generate a unique short code
    $short_code = generateShortCode();

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO URLs (user_id, long_url, short_code) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $user_id, $long_url, $short_code);

    if ($stmt->execute()) {
        echo json_encode(["short_url" => "http://yourdomain.com/" . $short_code]);
    } else {
        echo json_encode(["error" => $stmt->error]);
    }

    $stmt->close();
}

$conn->close();
