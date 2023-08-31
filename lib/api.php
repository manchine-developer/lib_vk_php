<?php
/*----- Создание API запроса -----*/
function api ($method, $params, $key=APIKEY) {
    $params['access_token'] = $key;
    $params['v'] = 5.131;
    $query = http_build_query($params);
    $url = "https://api.vk.com/method/" . $method . '?' . $query;
    return file_get_contents($url);
}
/*----- Отправляем код подтверждения -----*/
function confirmation ($code) {
    exit ($code);
}
/*----- Отправляем ответ серверу (ok) -----*/
function OK() {
    set_time_limit(0);
    ini_set('display_errors', 'Off');
    ob_end_clean();

    if (is_callable('fastcgi_finish_request')) {
        echo 'ok';
        session_write_close();
        fastcgi_finish_request();
        return True;
    }
    ignore_user_abort(true);

    ob_start();
    header('Content-Encoding: none');
    header('Content-Length: 2');
    header('Connection: close');
    echo 'ok';
    ob_end_flush();
    flush();
    return True;
}