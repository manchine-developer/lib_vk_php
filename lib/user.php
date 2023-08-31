<?php

/*----- Добавить пользователя в чат -----*/
function addchatuser($peer, $user) {
    return api("messages.addChatUser", [
        'chat_id' => $peer,
        'user_id' => $user
    ]);
}
/*----- Исключить пользователя из чата -----*/
function removechatuser($peer, $user) {
    return api("messages.removeChatUser", [
        'chat_id' => $peer,
        'member_id' => $user
    ]);
}
/*----- Получить ссылку для приглашения в беседу -----*/
function getinvitelink($peer, $reset) {
    return api("messages.getInviteLink", [
        'peer_id' => $peer,
        'reset' => $reset
    ]);
}
/*----- Получить числовой ID пользователя -----*/
function parse_vk_link($link)
{
    $link = mb_strtolower($link);
    $link = ltrim($link, '#');
    $link = ltrim($link, 'https://');
    $link = ltrim($link, 'http://');
    $link = str_replace('vk.com/', '', $link);
    if (stripos($link, "|") !== FALSE) {
        $link = explode("|", $link)[1];
        $link = ltrim($link, "|@");
        $link = rtrim($link, "]");
    }
    $link = api("users.get", [
        'user_ids' => $link,
        'fields' => 'id'
    ]);
    return $link;
}