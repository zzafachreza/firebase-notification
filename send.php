<?php

function sendInformasi($to,$data){

	$apiKey='AAAAsuJtkt4:APA91bGqZaPT2QaI_qg_1WvHbzvqXRIIykWDoaI0pMH2mMcRtNUNhSgMCyHQuFiS_X-YEzmQkYwfNNjB9GxH-KvIeG_xejdqWlfxLfgO1sjEbXyQIopeuV8LOuiRkMmiDXbm9seMu-HD';
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
$target = 'dQjor317u8I:APA91bHxrzPVZ9zMuX3Q2tPxfvrRGqVuVz1PpyvDyUm97_J7BDa6mXjTZUMuncteO05NmQqU1M8B0kh-GM1cfeh3ccLgLhISM4nl3tEXGAAtb9pcczC5iyCxPIa7LiHhVhABAGu0EB7h';


print_r(sendInformasi($target,$data));