<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db_connect.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: welcome.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Handle URL shortening
$short_url = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['long_url'])) {
    $long_url = $_POST['long_url'];

    function generateShortCode($length = 6) {
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    }

    $short_code = generateShortCode();
    $stmt = $conn->prepare("INSERT INTO URLs (user_id, long_url, short_code) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $user_id, $long_url, $short_code);

    if ($stmt->execute()) {
        $short_url = "http://localhost/url-shortener/" . $short_code;
    }

    $stmt->close();
}

// Fetch user's URLs and their analytics
$stmt = $conn->prepare("
    SELECT URLs.long_url, URLs.short_code, 
           COUNT(Analytics.url_id) as click_count
    FROM URLs 
    LEFT JOIN Analytics ON URLs.url_id = Analytics.url_id
    WHERE URLs.user_id = ?
    GROUP BY URLs.url_id
");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$urls = [];
while ($row = $result->fetch_assoc()) {
    $urls[] = $row;
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHORTEE URL Shortener</title>
    <link rel="stylesheet" href="style.css">
    <script>
    function copyToClipboard(url) {
        navigator.clipboard.writeText(url).then(() => {
            alert("URL copied to clipboard!");
        }).catch(err => {
            console.error('Failed to copy: ', err);
        });
    }

    // Function to fetch click counts using AJAX
    function fetchClickCount(shortCode, elementId) {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', 'fetch_click_count.php?short_code=' + shortCode, true);
        xhr.onload = function () {
            if (xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                document.getElementById(elementId).innerText = response.click_count;
            }
        };
        xhr.send();
    }

    // Call fetchClickCount for each row when the page loads
    window.onload = function () {
        document.querySelectorAll('.click-count').forEach(element => {
            const shortCode = element.getAttribute('data-short-code');
            fetchClickCount(shortCode, element.id);
        });
    };
    </script>
</head>
<body>
    <!-- Logo centered at the top -->
    <div class="logo-container">
        <img id="logo" class="logo" src="images/logo 3.png" alt="Shortee Logo">
    </div>

    <!-- Main content inside container -->
    <div class="container">
        <h1>Hello, <?php echo htmlspecialchars($_SESSION['username']); ?>! Shorten Your URL</h1>

        <form action="index.php" method="post">
            <input type="text" name="long_url" placeholder="Enter URL to shorten" required>
            <button type="submit">Shorten</button>
        </form>

        <!-- Display the shortened URL with a "Copy" button -->
        <?php if ($short_url): ?>
            <p>
                Shortened URL: <a href="<?php echo $short_url; ?>"><?php echo $short_url; ?></a>
                <button onclick="copyToClipboard('<?php echo $short_url; ?>')">Copy</button>
            </p>
        <?php endif; ?>

        <!-- Display URLs and their analytics in a table -->
        <?php if (!empty($urls)): ?>
            <h2>Your Shortened URLs</h2>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Original URL</th>
                            <th>Short Code</th>
                            <th>Click Count</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($urls as $url): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($url['long_url']); ?></td>
                                <td><?php echo htmlspecialchars($url['short_code']); ?></td>
                                <td id="click-count-<?php echo htmlspecialchars($url['short_code']); ?>" class="click-count" data-short-code="<?php echo htmlspecialchars($url['short_code']); ?>">Loading...</td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>

        <p><a href="logout.php">Logout</a></p>
    </div>
</body>
</html>
