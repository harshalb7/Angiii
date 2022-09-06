<?php
    include('db_conn.php');

    $id = $_POST['id'];
    $employeeid = $_POST['employeeid'];
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $contactnumber = $_POST['contactnumber'];
    $emailaddress = $_POST['emailaddress'];
    $address = $_POST['address'];
    $birthdate = $_POST['birthdate'];
    $hireddate = $_POST['hireddate'];
    $enddate = $_POST['enddate'];
    $workingstatus = $_POST['workingstatus'];

    $sql = "UPDATE `employee` SET `lastname`='$lastname', `firstname`='$firstname', `middlename`='$middlename', `contactnumber`='$contactnumber', `emailaddress`='$emailaddress', `address`='$address', `birthdate`='$birthdate', `hireddate`='$hireddate', `enddate`='$enddate', `workingstatus`='$workingstatus'  WHERE id='$id'";
    $query = mysqli_query($con, $sql);
    if($query==true){
        $data = array(
            'status'=>'success',
        );
        echo json_encode($data);
    } else {
        $data = array(
            'status'=>'failed',
        );
        echo json_encode($data);
    }
?>