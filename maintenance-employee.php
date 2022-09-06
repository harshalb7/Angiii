<?php 
    include "db_conn.php";

    $query = "SELECT employeeid FROM employee ORDER BY employeeid DESC";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);
    $lastid = $row['employeeid'];
    if(empty($lastid)) {
        $num = "NW-E-0001";
    } else {
        $idd = str_replace("NW-E-","", $lastid);
        $id = str_pad($idd + 1, 4, 0, STR_PAD_LEFT);
        $num = 'NW-E-'.$id;
    }
?>
<?php
    session_start();

    if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
?>

<!doctype html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name = "viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Maintenance Employee</title>
        <!--SIDEBAR ICON-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <!--JQUERY-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
        <!--BOOTSRAP-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <!--DATA TABLES CSS-->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.12.1/datatables.min.css"/>
        <!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">--> <!-- + FOR MORE INFO IN THE TABLE-->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedcolumns/4.1.0/css/fixedColumns.dataTables.min.css">
        
    </head>
    <body>
        <!--WRAPPER-->
        <div class="wrapper">
            <!--SIDEBAR-->
            <div class="sidebar">
                <!---LOGO-->
                <div class="dashimg">
                    <img src="Logo-White.png" class="logo" alt="logo">
                    
                </div>
                <!--<hr/>-->

                <div class="menu">
                    <!---DASHBOARD HOME -->
                    <div class="item">
                        <a href="admin-dashboard.php"><i class="fa-solid fa-display"></i>DASHBOARD</a>
                    </div>

                    <!---MAINTENANCE-->
                    <div class="item">
                        <a class="sub-btn"><i class="fa-solid fa-screwdriver-wrench"></i>MAINTENANCE<i class="fas fa-angle-right dropdown"></i></a>
                        <div class="sub-menu"> 
                            <a href="maintenance-employee.php" class="sub-item">EMPLOYEE</a>
                            <a href="maintenance-customer.php" class="sub-item">CUSTOMER</a>
                            <a href="maintenance-operation.php" class="sub-item">OPERATION</a>
                            <a href="#" class="sub-item">PROJECT TYPE</a>
                        </div> 
                    </div>

                    <!---PRODUCTION-->
                    <div class="item">
                        <a class="sub-btn"><i class="fa-solid fa-boxes-stacked"></i>PRODUCTION<i class="fas fa-angle-right dropdown"></i></a>
                        <div class="sub-menu">
                            <a href="#" class="sub-item">ADD PROJECT</a>
                            <a href="#" class="sub-item">PRODUCTION STATUS</a>
                            <a href="#" class="sub-item">PROJECT OPERATION LIST</a>
                            <a href="#" class="sub-item">EMPLOYEE OPERATION LIST</a>
                        </div>
                    </div>
                    
                    <!---REPORTS-->
                    <div class="item">
                        <a class="sub-btn"><i class="fa-solid fa-table"></i>REPORTS<i class="fas fa-angle-right dropdown"></i></a>
                        <div class="sub-menu">
                            <a href="#" class="sub-item">EMPLOYEE SUMMARY</a>
                            <a href="#" class="sub-item">PROJECT SUMMARY</a>
                        </div>
                    </div>

                    <!---CREATE ACCOUNT-->
                    <div class="item">
                        <a class="sub-btn"><i class="fa-solid fa-user-plus"></i>ACCOUNTS<i class="fas fa-angle-right dropdown"></i></a>
                        <div class="sub-menu">
                            <a href="admin-createaccount.php" class="sub-item">CREATE ACCOUNT</a>
                            <a href="admin-changepassword.php" class="sub-item">CHANGE PASSWORD</a>
                        </div>
                    </div>

                    <!---SYSTEM MANUAL/HELP -->
                    <div class="item">
                        <a href="#"><i class="fas fa-info-circle"></i>HELP</a>
                    </div>

                    <!---LOG OUT-->
                    <div class="item">
                        <a href="logout.php"><i class="fas fa-power-off"></i>LOG OUT</a>
                    </div>

                </div>
            </div>
            
            <!--MAIN CONTAINER-->
            <div class="main-container">
                <h2 class="text-center">EMPLOYEE</h2>
                <div class="container-fluid">
                    <div class="row">
                        <div class="container">
                            <!--ADD BUTTON-->
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="">
                                    <!--ADD EMPLOYEE BUTTON-->
                                    <button type="button" class="btn btn-primary addbutton" data-bs-toggle="modal" data-bs-target="#addEmployeeModal">
                                        ADD EMPLOYEE</button>
                                </div>
                            </div>
                            <!--TABLE-->
                            <div class="row">
                                <div class="col-md-2"></div>
                                    <div class="table-responsive">
                                        <table id="datatable" class="table table-striped table-hover dt-responsive display nowrap" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>EMPLOYEE NO</th>
                                                    <th>LAST NAME</th>
                                                    <th>FIRST NAME</th>
                                                    <th>MIDDLE NAME</th>
                                                    <th>CONTACT NUMBER</th>
                                                    <th>EMAIL ADDRESS</th>
                                                    <th>ADDRESS</th>
                                                    <th>BIRTHDATE</th>
                                                    <th>HIRED DATE</th>
                                                    <th>END DATE</th>
                                                    <th>WORKING STATUS</th>
                                                    <th>ACTION</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                <div class="col-md-2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
        <!--CONTENT SCRIPTS-->
        <!--JQUERY-->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <!--DATA TABLES - SCRIPT-->
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.12.1/datatables.min.js"></script>
        <!--<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>--> <!-- + FOR MORE INFO IN THE TABLE-->
        <script src="https://cdn.datatables.net/fixedcolumns/4.1.0/js/dataTables.fixedColumns.min.js"></script>
        <!--BOOTSTRAP-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

        <!--TABLE - EMPLOYEE DETAILS-->
        <!-- CONCERN: 
            SORT NOT WORKING
                SORTABLE COLUMNS: EMPLOYEE ID, LAST NAME, FIRST NAME, HIRED DATE
            PAGING DOES NOT WORK -->
        <script type="text/javascript">
            $('#datatable').DataTable({
                'serverSide':true,
                'processing':true,
                'paging':false, //previous and next not working
                'lengthMenu': [[25, 50, 100, -1], [25, 50, 100, "All"]],
                'scrollY':350,
                'scrollX':true,
                'scrollCollapse':true,
                'fixedColumns':{
                    'left':2,
                    'right':1,
                },
                'order':[], //[2,'asc'] or [2,'desc'] //sorting doesnt work right
                'ajax':{
                    'url':'employee-fetchdata.php',
                    'type':'post',
                },
                'fnCreatedRow':function(nRow,aData,iDataIndex)
                {
                    $(nRow).attr('id',aData[0]);
                },
                'columnDefs':[{//sort not working
                    'target':[0,1,2,3,4,5,6,7,8,9,10,11,12], //column that cant be sort
                    'orderable':false,
                }]
            });
        </script>

        <script type="text/javascript">
            //ADD OPERATION SCRIPT
            /* CONCERN:
                DO NOT ACCEPT IF FIRST + LAST NAME IF ALREADY EXIST
            */
            $(document).on('submit','#saveEmployeeForm',function(event){
                event.preventDefault();
                var employeeid = $('#employeeid').val();
                var lastname = $('#lastname').val();
                var firstname = $('#firstname').val();
                var middlename = $('#middlename').val();
                var contactnumber = $('#contactnumber').val();
                var emailaddress = $('#emailaddress').val();
                var address = $('#address').val();
                var birthdate = $('#birthdate').val();
                var hireddate = $('#hireddate').val();
                var workingstatus = $('#workingstatus').val();
                
                if(lastname !='' && firstname !='' && contactnumber !='' && address !='' && birthdate !='' && hireddate !=''  && workingstatus !=''){
                    $.ajax({
                        url:"employee-add.php",
                        data:{employeeid:employeeid,lastname:lastname,firstname:firstname,middlename:middlename,contactnumber:contactnumber,emailaddress:emailaddress,address:address,birthdate:birthdate,hireddate:hireddate,workingstatus:workingstatus},
                        type:'post',
                        success:function(data){
                            var json = JSON.parse(data);
                            status = json.status;
                            if(confirm('Are you sure you want to save this Employee?')){
                                if(status=='success'){
                                    table = $('#datatable').DataTable ();
                                    table.draw();
                                    alert('Employee has been succesfully added.');
                                    $('#employeeid').val();
                                    $('#lastname').val();
                                    $('#firstname').val();
                                    $('#middlename').val();
                                    $('#contactnumber').val();
                                    $('#emailaddress').val();
                                    $('#address').val();
                                    $('#birthdate').val();
                                    $('#hireddate').val();
                                    $('#workingstatus').val();
                                    $('#addEmployeeModal').modal('hide');
                                } else {
                                    alert('failed');
                                }
                            }
                        }
                    });
                } else {
                    alert("Please fill all the required fields.");
                }
            });

            //EDIT BUTTON CUSTOMER SCRIPT
            $(document).on('click','.editBtn', function(event){
                var id = $(this).data('id');
                var trid = $(this).closest('tr').attr('id');
                $.ajax({
                    url:"employee-getsingleuser.php", //get_single_user
                    data:{id:id},
                    type:"post",
                    success:function(data){
                        var json = JSON.parse(data);
                        $('#id').val(json.id);
                        $('#trid').val(trid);
                        $('#_employeeid').val(json.employeeid);
                        $('#_lastname').val(json.lastname);
                        $('#_firstname').val(json.firstname);
                        $('#_middlename').val(json.middlename);
                        $('#_contactnumber').val(json.contactnumber);
                        $('#_emailaddress').val(json.emailaddress);
                        $('#_address').val(json.address);
                        $('#_birthdate').val(json.birthdate);
                        $('#_hireddate').val(json.hireddate);
                        $('#_enddate').val(json.enddate);
                        $('#_workingstatus').val(json.workingstatus);
                        $('#editEmployeeModal').modal('show');
                    }
                });
            });

            //SAVING CHANGES - EDIT CUSTOMER
            $(document).on('submit','#editEmployeeForm',function(){
                event.preventDefault();
                var id = $('#id').val();
                var trid = $('#trid').val();
                var employeeid = $('#_employeeid').val();
                var lastname = $('#_lastname').val();
                var firstname = $('#_firstname').val();
                var middlename = $('#_middlename').val();
                var contactnumber = $('#_contactnumber').val();
                var emailaddress = $('#_emailaddress').val();
                var address = $('#_address').val();
                var birthdate = $('#_birthdate').val();
                var hireddate = $('#_hireddate').val();
                var enddate = $('#_enddate').val();
                var workingstatus = $('#_workingstatus').val();
                if(lastname !='' && firstname !='' && contactnumber !='' && address !='' && birthdate !='' && hireddate !=''  && workingstatus !=''){
                    $.ajax({ //Uncaught SyntaxError: Unexpected token ')'
                        url:"employee-update.php",
                        data:{id:id,employeeid:employeeid,lastname:lastname,firstname:firstname,middlename:middlename,contactnumber:contactnumber,emailaddress:emailaddress,address:address,birthdate:birthdate,hireddate:hireddate,enddate:enddate,workingstatus:workingstatus},
                        type:'post',
                        success:function(data){
                            var json = JSON.parse(data);
                            var status = json.status;
                            //PROMPT FOR SAVING CHANGES
                            if(confirm('Are you sure you want to save changes?')){
                                if(status=='success'){
                                    table = $('#datatable').DataTable();
                                    var button = '<a href="javascript:void();" data-id="' + id + '" class="btn btn-sm btn-primary editBtn">EDIT</a> <a href="javascript:void();" data-id="' + id + '" class="btn btn-sm  btn-danger deleteBtn">DELETE</a>';
                                    var row = table.row("[id='" + trid + "']");
                                    row.row("[id='" + trid + "']").data([id, employeeid, lastname, firstname, middlename, contactnumber, emailaddress, address, birthdate, hireddate, enddate, workingstatus, button]);
                                    alert('Changes have been successfully saved.');
                                    $('#editEmployeeModal').modal('hide');
                                } else {
                                    alert('failed');
                                } 
                            }
                        }
                    });    
                } else {
                    alert("Please fill all the required fields.");
                }
            });

            //DELETE BUTTON
            $(document).on('click','.deleteBtn',function(event){
                if(confirm('Are you sure you want to delete this Employee?')){
                    var id = $(this).data('id');
                    $.ajax({
                        url:"employee-delete.php",
                        data:{id:id},
                        type:"post",
                        success:function(data){
                            var json = JSON.parse(data);
                            var status = json.status;
                            if(status=='success') {
                                $('#' + id).closest('tr').remove();
                            } else {
                                alert('failed');
                            }
                        }
                    });
                }
            }); 
            
        </script>

        <!--ADD CUSTOMER MODAL-->
        <div class="modal fade amodal" id="addEmployeeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="AddCustomer"> <!--aria-hidden="true"-->
            <!--data-bs-backdrop="static" - disable click outside of bootstrap model area to close modal
            data-bs-keyboard="false" - prevent close on ESC button-->
            <!--ADD VALIDATION FOR CLOSING THE MODAL, CANCEL BUTTON, AND SAVING THE INPUTS
            ADD VALIDATION FOR EACH REQUIRED INPUTS-->
            <!-- CONCERN: 
                AFTER SAVING NEW CUSTOMER, WHEN ADDING ANOTHER ONE THE CUSTOMER ID DOES NOT ASCEND-->
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="AddCustomer">ADD EMPLOYEE</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!--INPUTS-->
                    <div class="modal-body">
                        <form id="saveEmployeeForm" action="javascript:void();" method="POST" class="needs-validation" novalidate>
                            <div class="mb-2 row">
                                <label for="employeeid" class="row-sm-4 row-form-label">EMPLOYEE ID</label>
                                <div class="row-sm-8">
                                    <input type="text" class="form-control" name="employeeid" id="employeeid" value="<?php echo $num; ?>" disabled/>
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <div class="col">
                                    <label for="lastname" class="row-sm-4 row-form-label">LAST NAME <span style="color: #b33127;">*</span></label>
                                    <div class="row-sm-8">
                                        <input type="text" class="form-control" name="lastname" id="lastname" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="firstname" class="row-sm-4 row-form-label">FIRST NAME <span style="color: #b33127;">*</span></label>
                                    <div class="row-sm-8">
                                        <input type="text" class="form-control" name="firstname" id="firstname" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="middlename" class="row-sm-4 row-form-label">MIDDLE NAME</label>
                                    <div class="row-sm-8">
                                        <input type="text" class="form-control" name="middlename" id="middlename">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <div class="col">
                                    <label for="contactnumber" class="row-sm-4 row-form-label">CONTACT NUMBER <span class="required">*</span></label>
                                    <div class="row-sm-8">
                                        <input type="text" class="form-control" name="contactnumber" id="contactnumber" required/>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="emailaddress" class="row-sm-4 row-form-label">EMAIL ADDRESS</label>
                                    <div class="row-sm-8">
                                        <input type="text" class="form-control" name="emailaddress" id="emailaddress"/>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <div class="col">
                                    <label for="address" class="row-sm-4 row-form-label">ADDRESS <span class="required">*</span></label>
                                    <div class="row-sm-8">
                                        <input type="text" class="form-control" name="address" id="address" required/>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="birthdate" class="row-sm-4 row-form-label">BIRTHDATE <span class="required">*</span></label>
                                    <div class="row-sm-8">
                                        <input type="date" class="form-control" name="birthdate" id="birthdate" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <div class="col">
                                    <label for="hireddate" class="row-sm-4 row-form-label">HIRED DATE <span class="required">*</span></label>
                                    <div class="row-sm-8">
                                        <input type="date" class="form-control" name="hireddate" id="hireddate" required/>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="enddate" class="row-sm-4 row-form-label">END DATE</label>
                                    <div class="row-sm-8">
                                        <input type="date" class="form-control" name="enddate" id="enddate"/>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="workingstatus" class="row-sm-4 row-form-label">WORKING STATUS <span class="required">*</span></label>
                                    <div class="row-sm-8">
                                        <select class="form-select" aria-label="Default select example" name="workingstatus" id="workingstatus">
                                            <option value="Active" default>Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CANCEL</button>
                                <button type="submit" class="btn btn-primary">SAVE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!--EDIT EMPLOYEE MODAL-->
        <div class="modal fade emodal" id="editEmployeeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="AddCustomer">  <!--aria-hidden="true"-->
            <!--data-bs-backdrop="static" - disable click outside of bootstrap model area to close modal
            data-bs-keyboard="false" - prevent close on ESC button-->
            <!--ADD VALIDATION FOR CLOSING THE MODAL, CANCEL BUTTON, AND SAVING THE INPUTS
            ADD VALIDATION FOR EACH REQUIRED INPUTS-->
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="EditCustomer">EDIT EMPLOYEE DETAILS</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!--INPUTS-->
                    <div class="modal-body">
                        <input type="hidden" id="id" name="id" value="">
                        <input type="hidden" id="trid" name="trid" value="">
                        <form id="editEmployeeForm" action="javascript:void();" method="POST" class="needs-validation" novalidate>
                            <div class="mb-2 row">
                                <label for="_employeeid" class="row-sm-4 row-form-label">EMPLOYEE ID</label>
                                <div class="row-sm-8">
                                    <input type="text" class="form-control" name="_employeeid" id="_employeeid" value="<?php echo $num; ?>" disabled/>
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <div class="col">
                                    <label for="_lastname" class="row-sm-4 row-form-label">LAST NAME <span style="color: #b33127;">*</span></label>
                                    <div class="row-sm-8">
                                        <input type="text" class="form-control" name="_lastname" id="_lastname" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="_firstname" class="row-sm-4 row-form-label">FIRST NAME <span style="color: #b33127;">*</span></label>
                                    <div class="row-sm-8">
                                        <input type="text" class="form-control" name="_firstname" id="_firstname" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="_middlename" class="row-sm-4 row-form-label">MIDDLE NAME</label>
                                    <div class="row-sm-8">
                                        <input type="text" class="form-control" name="_middlename" id="_middlename">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <div class="col">
                                    <label for="_contactnumber" class="row-sm-4 row-form-label">CONTACT NUMBER <span class="required">*</span></label>
                                    <div class="row-sm-8">
                                        <input type="text" class="form-control" name="_contactnumber" id="_contactnumber" required/>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="_emailaddress" class="row-sm-4 row-form-label">EMAIL ADDRESS</label>
                                    <div class="row-sm-8">
                                        <input type="text" class="form-control" name="_emailaddress" id="_emailaddress"/>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <div class="col">
                                    <label for="_address" class="row-sm-4 row-form-label">ADDRESS <span class="required">*</span></label>
                                    <div class="row-sm-8">
                                        <input type="text" class="form-control" name="_address" id="_address" required/>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="_birthdate" class="row-sm-4 row-form-label">BIRTHDATE <span class="required">*</span></label>
                                    <div class="row-sm-8">
                                        <input type="date" class="form-control" name="_birthdate" id="_birthdate" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <div class="col">
                                    <label for="_hireddate" class="row-sm-4 row-form-label">HIRED DATE <span class="required">*</span></label>
                                    <div class="row-sm-8">
                                        <input type="date" class="form-control" name="_hireddate" id="_hireddate" required/>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="_enddate" class="row-sm-4 row-form-label">END DATE</label>
                                    <div class="row-sm-8">
                                        <input type="date" class="form-control" name="_enddate" id="_enddate"/>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="_workingstatus" class="row-sm-4 row-form-label">WORKING STATUS <span class="required">*</span></label>
                                    <div class="row-sm-8">
                                        <select class="form-select" aria-label="Default select example" name="_workingstatus" id="_workingstatus" required>
                                            <option value="Active" default>Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CANCEL</button>
                                <button type="submit" class="btn btn-primary">SAVE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!--INPUT VALIDATION-->
        <script language="Javascript" type="text/javascript">  
            //CLEAR INPUTS WHEN WHEN ADD MODAL IS DISMISS
            $('#addEmployeeModal').on('hidden.bs.modal', function () {
                $(this).find('#saveEmployeeForm').trigger('reset');
            });
            //CLEAR INPUTS WHEN CANCEL BUTTON IS CLICK - MODAL
            $('#addEmployeeModal').on('hidden.bs.modal', function () {
                $(this).find('.cancel').trigger('reset');
            });
            
            //INPUT VALIDATION FOR
            /* CONCERN:
                LAST, FIRST, MIDDLE NAME - LETTERS, SPACE
                CONTACT NUMBER - NUMERIC, MAX 11
                EMAIL ADDRESS - ALLOW ONLY SPECIFIC SPECIAL CHARACTERS THAT IS VALID FOR EMAIL ADD
                            - VALIDATE EMAIL [IF THE EMAIL EXIST]
                ADDRESS - ALLOW ONLY SPECIFIC SPECIAL CHARACTERS THAT IS VALID FOR ADDRESS
            */

        </script>


        <!---JAVASCRIPT(SIDEBAR) SLIDE DOWN SCRIPT-->
		<script type="text/javascript">
			$(document).ready(function(){
			    //for toggle sub menus
                $('.sub-btn').click(function(){
                    $(this).find('.sub-menu').slideUp();
                    $(this).next('.sub-menu').slideToggle();
                    $(this).find('.dropdown').toggleClass('rotate');
                });
            });
		</script>
    </body>
</html>

<?php
    } else {
        header("Location: admin-index.php");
        exit();
    }
?>