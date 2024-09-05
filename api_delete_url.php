<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $data = json_decode(file_get_contents('php://input'), true);
    $short_code = $data['short_code'];

    $stmt = $conn->prepare("DELETE FROM URLs WHERE short_code = ?");
    $stmt->bind_param("s", $short_code);

    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["error" => "Failed to delete URL"]);
    }

    $stmt->close();
}

$conn->close();
