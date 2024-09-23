<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $short_code = $_GET['short_code'];

    $stmt = $conn->prepare("
        SELECT COUNT(*) as click_count, GROUP_CONCAT(ip_address) as ips
        FROM Analytics
        JOIN URLs ON URLs.url_id = Analytics.url_id
        WHERE URLs.short_code = ?");
    $stmt->bind_param("s", $short_code);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode([
            "click_count" => $row['click_count'],
            "ips" => explode(",", $row['ips'])  // Simplified geo-data, can use external API for detailed info
        ]);
    } else {
        echo json_encode(["error" => "No analytics data found for this short URL"]);
    }

    $stmt->close();
}

$conn->close();
