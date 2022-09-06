<?php
    include('db_conn.php');

    $id = $_POST['id'];

    $sql = "SELECT * FROM operation WHERE id='$id'";
    $query = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($query);
    echo json_encode($row);
?>