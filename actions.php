<?php

/*
* @desc Ajax call hunter
*/
if(isset($_POST['action']) && !empty($_POST['action'])) {
	$configs = require_once('config.php');
    $action = $_POST['action'];
    switch($action) {
        case 'insert' : insertComment();break;
        case 'show' : getComments();break;
    }
}

/*
* @desc Create db connection
* @return connection or die with error message
*/
function connection(){
	global $configs;
	$servername = $configs["host"];
	$username 	= $configs["username"];
	$password 	= $configs["password"];
	$dbname 	= $configs["db_name"];

	try {
	    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	    // set the PDO error mode to exception
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    return $conn;
	}
	catch(PDOException $e) {
	    die("Connection failed: " . $e->getMessage());
	}
}

/*
* @desc Show all comments on home page
* @return html
*/
function getComments(){
	require_once('comments.php');die;
}

/*
* @desc Save new comment in DB
* @return html or error array(status,error message)
*/
function insertComment(){
	$conn = connection();
	$error = false;
    if( isset($_POST['data']) && !empty($_POST['data']) ){
    	$checker = validateData($_POST['data']);
    	if (empty($checker)) {
    		$name 		= $_POST['data']['username']; 
    		$email 		= $_POST['data']['email']; 
    		$message 	= $_POST['data']['message']; 
    		try {
				$sql = "INSERT INTO comments (name,email,comment)
	    		VALUES ('{$name}', '{$email}', '{$message}')";
	    		$conn->exec($sql);
    		}
			catch(PDOException $e)
    		{
    			$error = true;
    		}
    	}
    	else {
    		$error = true;
    	}
    }
    else{
		$error == true;    	
    } 

    if ($error == false) {
    	$conn = null;
	    getComments();
	}
	else{
		$conn = null;
		if (empty($_POST['data'])) {
			echo json_encode(array('status'=>'faild','error'=>'Все поля обязательны для заполнения'));
		}
		elseif (!empty($checker)) {
			echo json_encode(array('status'=>'faild','error'=>$checker));
		}
		else{
			echo json_encode(array('status'=>'faild','error'=>$e->getMessage()));	
		}
	    
	}

	
}

/*
* @desc Form validation
* @return error message
*/
function validateData($data){
	$name 		= ($data['username']) ? $data['username'] : ''; 
    $email 		= ($data['email']) ? $data['email'] : ''; 
    $message 	= ($data['message']) ? $data['message'] : ''; 

    $error = array();

    if( empty($name) ){
    	$error[] = 'Пожалуйста напишите свое имя'; 
    	return $error; 
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    	$error[] = 'Пожалуйста введите корректный маил';
    	return $error;
    }
    if (empty($message)) {
    	$error[] = 'Пожалуйста напишите комментарий';
    	return $error;
    }
}


?>