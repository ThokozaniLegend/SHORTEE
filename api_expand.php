<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $short_code = $_GET['short_code'];

    $stmt = $conn->prepare("SELECT long_url FROM URLs WHERE short_code = ?");
    $stmt->bind_param("s", $short_code);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode(["long_url" => $row['long_url']]);
    } else {
        echo json_encode(["error" => "Short URL not found"]);
    }

    $stmt->close();
}

$conn->close();
