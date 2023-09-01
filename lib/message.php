<?php

/*----- Отправка сообщения -----*/
function sendmessage($peer, $message, $payload = '') {
    return api("messages.send", array(
        'peer_ids' => $peer,
        'message' => $message,
        'random_id' => rand(-2147483648, 2147483647),
        'payload' => $payload
    ));
}
/*----- Удаление сообщения -----*/
function deletemessage($peer, $id_message) {
    return api("messages.delete", [
        'delete_for_all' => '1',
        'peer_id' => $peer,
        'cmids' => $id_message
    ]);
}
/*----- Изменение сообщения (ЛС) -----*/
function editmessage($peer, $message, $id) {
    return api("messages.edit", [
        'peer_id' => $peer,
        'message' => $message,
        'message_id' => $id
    ]);
}
/*----- Изменение сообщения (БЕСЕДА) -----*/
function editmessagePeer() {
    return api("messages.edit", [
        'peer_id' => $peer,
        'message' => $message,
        'conversation_message_id' => $id
    ]);
}
/*----- Отправка клавиатуры -----*/
function sendkeyboard($peer, $message, $keyboard, $payload = '') {
    return api("messages.send", [
        'peer_ids' => $peer,
        'message' => $message,
        'random_id' => '0',
        'payload' => $payload,
        'keyboard' => $keyboard
    ]);
}
/*----- Закрепить сообщение -----*/
function pinmessage($peer, $id) {
    return api("messages.pin", [
        'peer_id' => $peer,
        'conversation_message_id' => $id
    ]);
}
/*----- Открепить сообщение -----*/
function unpinmessage($peer) {
    return api("messages.unpin", [
        'peer_id' => $peer
    ]);
}