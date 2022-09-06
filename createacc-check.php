<?php 
session_start();
$sname="localhost";
$username="root";
$password="";
$db_name="nworks";

$conn=mysqli_connect($sname, $username,$password,$db_name);

if(!$conn){
    echo"connection failed!";
}


if (isset($_POST['username']) && isset($_POST['role']) && isset($_POST['password'])
    && isset($_POST['name']) && isset($_POST['confirmpass'] )) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

    $role = validate($_POST['role']);
    $name = validate($_POST['name']);
	$username = validate($_POST['username']);
	$pass = validate($_POST['password']);
	$confirmpass = validate($_POST['confirmpass']);
	
    

	$user_data = 'username='. $username. '&name='. $name;

    if (empty($role)) {
		header("Location: admin-createaccount.php?error=User Name is required&$user_data");
	    exit();
	}
    else if(empty($name)){
        header("Location: admin-createaccount.php?error=Name is required&$user_data");
	    exit();
	}
	else if (empty($username)) {
		header("Location: admin-createaccount.php?error=User Name is required&$user_data");
	    exit();
	}else if(empty($pass)){
        header("Location: admin-createaccount.php?error=Password is required&$user_data");
	    exit();
	}
	else if(empty($confirmpass)){
        header("Location: admin-createaccount.php?error=Re Password is required&$user_data");
	    exit();
	}

	else if($pass !== $confirmpass){
        header("Location: admin-createaccount.php?error=The confirmation password  does not match&$user_data");
	    exit();
	}
    

	else{

		// hashing the password
        $pass = md5($pass);

	    $sql = "SELECT * FROM user WHERE username='$username' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: admin-createaccount.php?error=The username is taken try another&$user_data");
	        exit();
		}else {
           $sql2 = "INSERT INTO user(username, password, name, role) VALUES('$username', '$pass', '$name','$role')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: admin-createaccount.php?success=Your account has been created successfully");
	         exit();
           }else {
	           	header("Location: admin-createaccount.php?error=unknown error occurred&$user_data");
		        exit();
           }
		}
	}
	
}else{
	header("Location: admin-createaccount.php");
	exit();
}