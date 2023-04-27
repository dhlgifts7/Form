<?php
// Replace YOUR_BOT_TOKEN and YOUR_CHAT_ID with your own values
define('BOT_TOKEN', '5933507567:AAFq-EuAK3HDcSrZXZHOMVF4YH4RNWItOzA');
define('CHAT_ID', '1001509665673');

// Get the form data
$name = $_POST['name'];
$phone = $_POST['phone'];

// Construct the message to send to your Telegram account
$text = "New form submission:\n\nName: $name\nPhone: $phone";

// Send the message using the Telegram bot API
$telegram_url = "https://api.telegram.org/bot" . BOT_TOKEN . "/sendMessage";
$telegram_params = [
    'chat_id' => CHAT_ID,
    'text' => $text
];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $telegram_url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $telegram_params);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close($ch);

// Redirect the user to a thank-you page
header('Location: thank-you.html');
exit();
?>
