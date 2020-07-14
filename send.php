<?php

function sendInformasi($to,$data){

	$apiKey='<API KEY>';
	$field= array('to'=>$to,'notification'=>$data);

	$header = array('Authorization:key='.$apiKey,'Content-Type:application/json');

	$url = 'https://fcm.googleapis.com/fcm/send';

	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);

	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($field));

	$result = curl_exec($ch);
	curl_close($ch);

	return json_decode($result,true);

}


$data = array('body' =>'Jangan Lupa Stock Opname ya');
$target = '<TARGET>';


print_r(sendInformasi($target,$data));