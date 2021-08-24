<?php
	// Account details
	$apiKey = urlencode('omVQqMD9jUw-WDfGwL1uHDkEtQDhAAhsbMyLUU9BPe');
	
	// Message details
	//$numbers = array(917010375918, 917010375918);

	$sender = urlencode('TXTLCL');
	$message = rawurlencode('your child reached safely!!');
 
	//$numbers = implode(',', $numbers);
 	$numbers='917010375918';
	// Prepare data for POST request
	$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
 
	// Send the POST request with cURL
	$ch = curl_init('https://api.textlocal.in/send/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	
	// Process your response here
	echo $response;
?>
