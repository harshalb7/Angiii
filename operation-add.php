<?php
    include('db_conn.php');

    $operationname = $_POST['operationname'];
    $cost = $_POST['cost'];

    $sql = "INSERT INTO `operation` (`operationname`,`cost`)
            VALUES ('$operationname','$cost')";
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