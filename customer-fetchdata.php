<?php
    include('db_conn.php');
    
    $sql = "SELECT * FROM customer ";
    $query = mysqli_query($con, $sql);
    $count_all_rows = mysqli_num_rows($query);

    //SEARCH
    if(isset($_POST['search']['value'])){
        $search_value = $_POST['search']['value'];
        $sql .=" WHERE customerid LIKE '%".$search_value."%' ";
        $sql .= " OR customertype LIKE '%".$search_value."%' ";
        $sql .= " OR customername LIKE '%".$search_value."%' ";
        $sql .= " OR contactperson LIKE '%".$search_value."%' ";
        $sql .= " OR contactnumber LIKE '%".$search_value."%' ";
        $sql .= " OR emailaddress LIKE '%".$search_value."%' ";
        $sql .= " OR address LIKE '%".$search_value."%' ";
        $sql .= " OR shippingaddress LIKE '%".$search_value."%' ";
        $sql .= " OR remarks LIKE '%".$search_value."%' ";
    }

    //ORDER
    if(isset($_POST['order'])) {
       // $column = $_POST['order'][0]['column'];
        //$order = $_POST['order'][0]['dir'];
        //$sql .= " ORDER BY '".$column."' ".$order;
        $sql .= ' ORDER BY '.$_POST['order'][0]['column'].' '.$_POST['order'][0]['dir'];'';
    } else {
        $sql .= " ORDER BY id ASC";
    }

    //LENGTH
    if($_POST['length'] != -1) {
        $start = $_POST['start'];
        $length = $_POST['length'];
        $sql .= " LIMIT ".$start.", ".$length;
    }

    //DATA IN TABLE
    $data = array();

    $run_query = mysqli_query($con, $sql);
    $filtered_rows = mysqli_num_rows($run_query);
    while($row = mysqli_fetch_assoc($run_query)) {
        $subarray = array();
        $subarray[] = $row['id'];
        $subarray[] = $row['customerid'];
        $subarray[] = $row['customertype'];
        $subarray[] = $row['customername'];
        $subarray[] = $row['contactperson'];
        $subarray[] = $row['contactnumber'];
        $subarray[] = $row['emailaddress'];
        $subarray[] = $row['address'];
        $subarray[] = $row['shippingaddress'];
        $subarray[] = $row['remarks'];
        $subarray[] = '<a href="javascript:void();" data-id="'.$row['id'].'" class="btn btn-sm btn-primary editBtn">EDIT</a> 
            <a href="javascript:void();" data-id="'.$row['id'].'" class="btn btn-sm btn-danger deleteBtn">DELETE</a>';
        $data[] = $subarray;
    }

    $output = array(
        'data'=>$data,
        'draw'=>intval($_POST['draw']),
        'recordsTotal'=>$count_all_rows,
        'recordsFiltered'=>$filtered_rows,
    );
    echo json_encode($output);
?>