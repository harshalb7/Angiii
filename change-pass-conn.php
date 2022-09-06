<?php 
session_start();
$sname="localhost";
$username="root";
$password="";
$db_name="nworks";

$conn=mysqli_connect($sname, $username,$password,$db_name);

if(!$conn){
    echo "connection failed!";
}

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {

    include "db_conn.php";

if (isset($_POST['username']) && isset($_POST['newpass'])
    && isset($_POST['confirm_newpass'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$usernm = validate($_POST['username']);
	$npass = validate($_POST['newpass']);
	$c_newpass = validate($_POST['confirm_newpass']);
    
    if(empty($usernm)){
      header("Location: admin-changepassword.php?error= Username required");
	  exit();
    }else if(empty($npass)){
      header("Location: admin-changepassword.php?error=New Password is required");
	  exit();
    }else if($npass !== $c_newpass){
      header("Location: admin-changepassword.php?error=The confirmation password  does not match");
	  exit();
    }else {
    	// hashing the password
    	$npass = md5($npass);


        $sql = "SELECT password
                FROM user WHERE 
                username='$usernm'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) === 1){
        	
        	$sql_2 = "UPDATE user
        	          SET password='$npass'
        	          WHERE username='$usernm'";
        	mysqli_query($conn, $sql_2);
        	header("Location: admin-changepassword.php?success=Your password has been changed successfully");
	        exit();
        }else {
        	header("Location: admin-changepassword.php?error=Incorrect username or password");
	        exit();
        }

    }

}else{
	header("Location: admin-changepassword.php");
	exit();
}

}else{
     header("Location: admin-dashboard.php");
     exit();
}