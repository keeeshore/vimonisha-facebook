<?php

	session_start();
	//$access_token = $_SESSION['access_token'];	
	$access_token = 'EAAG6qlC4FlIBAGBC6Q1XxNYSIZBB54RBiWxcHQIP0xnIHvQcekcCdxt95dCvvpWb0UKtcvZCTgINLSnvVZAaL3BwMCG1IZCJSQFYL1wnkj4pbviGBsi2YOZA7enr2bsF29WG0HcMTPcc1ZB8zrlqTtP7R4sgmPZAzwZD';	
	$fields = $_GET['fields'];
	$vid = $_GET['id'];
	$debugPassword = $_GET['debug'];
	
	if ($vid == '') {
		$vid = 'VimonishaExhibitions';
	}
	$url = 'https://graph.facebook.com/v2.4/'.$vid.'?access_token='.$_SESSION['access_token'].'&fields='.$fields.'&format=json&method=get&pretty=0&suppress_http_code=1';
	if ($debugPassword === "kishore") {
		echo $url;
	} else {
		header('Content-Type: application/json;charset=utf-8');
		if ($access_token !== "") {
			$payload = file_get_contents($url);
			echo $payload;
		} else {
			$data = array( 'access_token' => $_SESSION['access_token'], 'success' => false, 'url' => $url );
			echo json_encode($data);
		}
	}
	
	
	
	

?>