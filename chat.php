<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Chat Messages</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="chat-body">
        <ul id="chat-messages">
            <?php
                $file = 'chat.txt';
                if (file_exists($file)) {
                    $messages = file($file, FILE_IGNORE_NEW_LINES);
                    foreach ($messages as $message) {
                        echo "<li class='chat-message'>" . htmlspecialchars($message) . "</li>";
                    }
                }
            ?>
        </ul>
    </div>
</body>
</html>
