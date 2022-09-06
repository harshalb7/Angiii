<?php
    include('db_conn.php');

    $employeeid = $_POST['employeeid'];
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $contactnumber = $_POST['contactnumber'];
    $emailaddress = $_POST['emailaddress'];
    $address = $_POST['address'];
    $birthdate = $_POST['birthdate'];
    $hireddate = $_POST['hireddate'];
    $workingstatus = $_POST['workingstatus'];

    $sql = "INSERT INTO `employee` (`employeeid`,`lastname`,`firstname`,`middlename`,`contactnumber`,`emailaddress`,`address`,`birthdate`,`hireddate`,`workingstatus`)
            VALUES ('$employeeid','$lastname','$firstname','$middlename','$contactnumber','$emailaddress','$address','$birthdate', '$hireddate','$workingstatus')";
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
    //REF: piecerate\maintenance-employee-add.php
    /*if($query){
        $query = "SELECT employeeid FROM employee ORDER BY employeeid DESC";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_array($result);
            $lastid = $row['employeeid'];

            if(empty($lastid)) {
                $num = "NW-E-0001";
            } else {
                $idd = str_replace("NW-C-","", $lastid);
                $id = str_pad($idd + 1, E, 0, STR_PAD_LEFT);
                $num = 'NW-E-'.$id;
            }
            header("Location: maintenance-employee.php");
    }*/
?>