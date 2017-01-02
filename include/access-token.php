<?php	


	session_start();
	if ($_GET['access_token'] !== "") {
		$_SESSION['access_token'] = $_GET['access_token'];
		$data = array( 'access_token' => $_SESSION['access_token'], 'success' => true );
				
		header('Content-Type: application/json;charset=utf-8');
		echo json_encode($data);
	}

?>