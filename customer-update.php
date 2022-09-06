<?php
    include('db_conn.php');

    $id = $_POST['id'];
    $customerid = $_POST['customerid'];
    $customertype = $_POST['customertype'];
    $customername = $_POST['customername'];
    $contactperson = $_POST['contactperson'];
    $contactnumber = $_POST['contactnumber'];
    $emailaddress = $_POST['emailaddress'];
    $address = $_POST['address'];
    $shippingaddress = $_POST['shippingaddress'];
    $remarks = $_POST['remarks'];

    $sql = "UPDATE `customer` SET `customerid`='$customerid', `customertype`='$customertype', `customername`='$customername', `contactperson`='$contactperson', `contactnumber`='$contactnumber', `emailaddress`='$emailaddress', `address`='$address',`shippingaddress`='$shippingaddress', `remarks`='$remarks'  WHERE id='$id'";
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