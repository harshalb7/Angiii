<?php

    $con = mysqli_connect("localhost","root","","nworks");

    if (!$con) {
        die('Connection failed!'. mysqli_connect_error());
    }
    //echo "CONNECTED SUCCESSFULLY";
?>