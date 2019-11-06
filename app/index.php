<?php
$url = 'http://localhost:8090';

$message = $_POST['message'] ?? null;
$bot = $_POST['bot'] ?? 'bot1';
$bot_name = $_POST['bot_name'] ?? 'Люся';
$user_name = $_POST['user_name'] ?? null;

$hash = $_GET['hash'] ?? md5(sprintf('%s:%s:%s', $bot, $bot_name, $user_name));

if (empty($_GET['start'])) {
    echo '<form action="/?start=1" method="post">your name: <input type="text" name="user_name"><br><input type="submit" value="enter"></form>';
    die;
}

if (isset($_GET['start']) && $_GET['start'] == 1) {
    $ch = curl_init();
    $url .= '/start?' . http_build_query(['bot' => $bot, 'bot_name' => $bot_name, 'user_name' => $user_name, 'hash' => $hash]);

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT_MS, 300);
    curl_setopt($ch, CURLOPT_TIMEOUT, 2);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'X-Hash: ' . $hash,
    ));
    $result = curl_exec($ch);

    header('Location: /?start=2&hash=' . $hash);
}

echo '<form id="form" action="' . $_SERVER['REQUEST_URI'] . '" method="post"><textarea id="message" name="message" style="width:500px;height:200px" onkeypress="onSend();"></textarea><br><input type="submit" value="send"></form>';
echo '<script>
document.getElementById("message").focus();
function onSend() {
    var key = window.event.keyCode;
    if (key === 13) {
        document.getElementById("form").submit();
        return false;
    }
    else {
        return true;
    }
}
</script>';

$hisotryFile = sprintf('chat_%s:%s.txt', $hash, $bot);

if (!empty($message)) {
    file_put_contents($hisotryFile, sprintf("%s: %s\n", 'Вы', $message), FILE_APPEND);

    $message = str_replace($user_name, '{user_name}', $message);

    $ch = curl_init();
    $url .= '/talk?' . http_build_query(['msg' => $message]);

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT_MS, 300);
    curl_setopt($ch, CURLOPT_TIMEOUT, 2);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'X-Hash: ' . $hash,
    ));
    $result = curl_exec($ch);

    $response = json_decode($result, true);
    if (!empty($response['error'])) {
        file_put_contents($hisotryFile, sprintf("error: %s\n", $response['message']), FILE_APPEND);
    } elseif (!empty($response['text'])) {
        if ($response['confidence'] > 0.5) {
            file_put_contents($hisotryFile, sprintf("%s: %s [%f]\n", $bot_name, $response['text'], $response['confidence']), FILE_APPEND);
        } elseif ($response['confidence'] > 0.05) {
            file_put_contents($hisotryFile, sprintf("<span style='color:#ddd;padding-left:100px;'>%s: %s [%f]</span>\n", $bot_name, $response['text'], $response['confidence']), FILE_APPEND);
        } else {
            file_put_contents($hisotryFile, sprintf("<span style='color:#b00;padding-left:100px;'>%s [%f]</span>\n", 'Нет подходящего ответа в train базе', $response['confidence']), FILE_APPEND);
        }
    }
}

$history = file_get_contents($hisotryFile);
echo '<pre>' . $history . '</pre>';