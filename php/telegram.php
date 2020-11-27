<?php


function send_to_telegram($chat_id, $msg) {
	$apiToken  = "...";
	$data = [
		'chat_id' => $chat_id,
		'text' => $msg,
		'parse_mode' => 'markdown',
	];
	file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) );
}
