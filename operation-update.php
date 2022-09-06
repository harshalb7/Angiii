<?php
    include('db_conn.php');

    $id = $_POST['id'];
    $operationname = $_POST['operationname'];
    $cost = $_POST['cost'];

    $sql = "UPDATE `operation` SET `operationname`='$operationname', `cost`='$cost' WHERE id='$id'";
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