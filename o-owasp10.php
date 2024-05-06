<?php

// 1. Injection (SQL Injection)
$username = $_GET['username'];
$password = $_GET['password'];
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = mysql_query($sql);

// 2. Broken Authentication
if ($result) {
    // User authenticated
    $_SESSION['authenticated'] = true;
} else {
    // Authentication failed
    $_SESSION['authenticated'] = false;
}

// 3. Sensitive Data Exposure
$credit_card_number = $_POST['credit_card_number'];

// 4. XML External Entities (XXE)
$xml = file_get_contents('php://input');
libxml_disable_entity_loader(false);
$doc = new DOMDocument();
$doc->loadXML($xml);

// 5. Broken Access Control
$user_id = $_GET['user_id'];
if ($_SESSION['user_id'] != $user_id) {
    // Unauthorized access
    header('HTTP/1.0 403 Forbidden');
    exit;
}

// 6. Security Misconfiguration
// No example provided in this script

// 7. Cross-Site Scripting (XSS)
echo "Hello, " . $_GET['name'];

// 8. Insecure Deserialization
$data = unserialize($_COOKIE['user_data']);

// 9. Using Components with Known Vulnerabilities
// No example provided in this script

// 10. Insufficient Logging & Monitoring
$log_message = "User " . $_SESSION['username'] . " accessed sensitive data.";

// Log the message to a file
file_put_contents('logs.txt', $log_message, FILE_APPEND);



?>
