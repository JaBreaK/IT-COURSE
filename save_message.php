<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = $_POST['message'] ?? '';
    if (!empty($message)) {
        file_put_contents('chat.txt', $message . PHP_EOL, FILE_APPEND);
    }
}

?>

