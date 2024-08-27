<?php

// ใช้ Token ที่คุณได้จาก BotFather
$token = '6932173666:AAHT3nWJfzMja1xzvxkndYBVtpDsDvoonFg';

// URL ของ Telegram API
$apiURL = "https://api.telegram.org/bot$token/";

// ฟังก์ชันสำหรับส่งข้อความ
function sendMessage($chat_id, $message) {
    global $apiURL;
    $url = $apiURL . "sendMessage?chat_id=" . $chat_id . "&text=" . urlencode($message);
    file_get_contents($url);
}

// รับข้อมูลจาก Telegram Webhook
$update = file_get_contents('php://input');
$update = json_decode($update, TRUE);

if (isset($update['message'])) {
    $chat_id = $update['message']['chat']['id'];
    $message = $update['message']['text'];

    if ($message == '/start') {
        sendMessage($chat_id, "Welcome to MyFirstBot!");
    } else {
        sendMessage($chat_id, "You said: " . $message);
    }
}

?>
