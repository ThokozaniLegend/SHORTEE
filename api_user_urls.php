<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $user_id = $_GET['user_id'];

    $stmt = $conn->prepare("SELECT short_code, long_url FROM URLs WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $urls = [];
    while ($row = $result->fetch_assoc()) {
        $urls[] = ["short_url" => $row['short_code'], "long_url" => $row['long_url']];
    }

    echo json_encode($urls);

    $stmt->close();
}

$conn->close();
