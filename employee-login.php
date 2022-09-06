<?php
session_start();
include "db_conn.php";

if (isset($_POST['username']) && isset($_POST['password'])) {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $username = validate($_POST['username']);
    $password = validate($_POST['password']);

    if (empty($username)) {
        header("Location: employee-index.php?error=Username is required");
        exit();
    } elseif (empty($password)) {
        header("Location: employee-index.php?error=Password is required");
        exit();
    } else {
        $password = md5($password);
        $sql = "SELECT * FROM user WHERE username='$username' AND password='$password' AND role='Employee'";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['username'] === $username && $row['password'] === $password) {
                $_SESSION['username'] = $row['username'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                header("Location: employee-profile.php");
                exit();
            } else {
                header("Location: employee-index.php?error=Incorrect Username or Password.");
                exit();
            }
        } else {
            header("Location: employee-index.php?error=Incorrect Username or Password.");
            exit();
            
        }
    } 

} else {
    header("Location: employee-index.php");
    exit();
}
?>