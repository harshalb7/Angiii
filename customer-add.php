<?php
    include('db_conn.php');

    $customerid = $_POST['customerid'];
    $customertype = $_POST['customertype'];
    $customername = $_POST['customername'];
    $contactperson = $_POST['contactperson'];
    $contactnumber = $_POST['contactnumber'];
    $emailaddress = $_POST['emailaddress'];
    $address = $_POST['address'];
    $shippingaddress = $_POST['shippingaddress'];
    $remarks = $_POST['remarks'];
    

    $sql = "INSERT INTO `customer`(`customerid`, `customertype`, `customername`, `contactperson`, `contactnumber`, `emailaddress`, `address`, `shippingaddress`, `remarks`)
            VALUES ('$customerid','$customertype','$customername','$contactperson','$contactnumber','$emailaddress','$address','$shippingaddress','$remarks')";
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
        $query = "SELECT customerid FROM customer ORDER BY customerid DESC";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_array($result);
            $lastid = $row['customerid'];

            if(empty($lastid)) {
                $num = "NW-C-0001";
            } else {
                $idd = str_replace("NW-C-","", $lastid);
                $id = str_pad($idd + 1, 4, 0, STR_PAD_LEFT);
                $num = 'NW-C-'.$id;
            }
            header("Location: maintenance-customer.php");
    }*/
?>