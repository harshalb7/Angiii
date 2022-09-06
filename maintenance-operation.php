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
        <title>Maintenance Operation</title>
        <!--SIDEBAR ICON-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <!--JQUERY-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
        <!--BOOTSRAP-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <!--DATA TABLES CSS-->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.12.1/datatables.min.css"/>
        
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
                <h2 class="text-center">OPERATION</h2>
                <div class="container-fluid">
                    <div class="row">
                        <div class="container">
                            <!--ADD BUTTON-->
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="">
                                    <!--ADD OPERATION BUTTON-->
                                    <button type="button" class="btn btn-primary addbutton" data-bs-toggle="modal" data-bs-target="#addOperationModal">
                                        ADD OPERATION</button>
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
                                                    <th>OPERATION NAME</th>
                                                    <th>OPERATION COST</th>
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
        <!--BOOTSTRAP-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

        <!--TABLE - EMPLOYEE DETAILS-->
        <!-- CONCERN:
            SORT NOT WORKING
                SORTABLE COLUMNS: OPERATION NAME AND PRICE
            PAGING DOES NOT WORK 
            
            DISPLAY PESO CURRENCY IN COST COLUMN-->
        <script type="text/javascript">
            $(document).ready(function () {
                $('#datatable').DataTable({
                    'serverSide':true,
                    'processing':true,
                    //'pagingType':'full_numbers',
                    'paging':false, //previous and next not working
                    'lengthMenu': [[25, 50, 100, -1], [25, 50, 100, "All"]],
                    'scrollY':350,
                    'scrollCollapse':true,
                    'order':[], //[2,'asc'] or [2,'desc'] //sorting doesnt work right
                    'ajax':{
                        'url':'operation-fetchdata.php',
                        'type':'post',
                    },
                    'fnCreatedRow':function(nRow,aData,iDataIndex)
                    {
                        $(nRow).attr('id',aData[0]);
                    },
                    'columnDefs':[{ //sort not working
                        'target':[0,1,2,3], //column that cant be sort
                        'orderable':false,
                    }]
                });
            });
        </script>

        <script type="text/javascript">
            //ADD OPERATION SCRIPT
            /* CONCERN:
                DO NOT ADD IF OPERATION NAME ALREADY EXIST IN THE DATABASE
            */
            $(document).on('submit','#saveOperationForm',function(event){
                event.preventDefault();
                var operationname = $('#operationname').val();
                var cost = $('#cost').val();
                
                if(operationname !='' && cost !=''){
                    $.ajax({
                        url:"operation-add.php",
                        data:{operationname:operationname,cost:cost},
                        type:'post',
                        success:function(data){
                            var json = JSON.parse(data);
                            status = json.status;
                            if(confirm('Are you sure you want to save this Operation?')){
                                if(status=='success'){
                                    table = $('#datatable').DataTable ();
                                    table.draw();
                                    alert('Operation has been succesfully added.');
                                    $('#operationname').val();
                                    $('#cost').val();
                                    $('#addOperationModal').modal('hide');
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

            //EDIT BUTTON OPERATION SCRIPT
            $(document).on('click','.editBtn', function(event){
                var id = $(this).data('id');
                var trid = $(this).closest('tr').attr('id');
                $.ajax({
                    url:"operation-getsingleuser.php", //get_single_user
                    data:{id:id},
                    type:"post",
                    success:function(data){
                        var json = JSON.parse(data);
                        $('#id').val(json.id);
                        $('#trid').val(trid);
                        $('#_operationname').val(json.operationname);
                        $('#_cost').val(json.cost);
                        $('#editOperationModal').modal('show');
                    }
                });
            });

            //SAVING CHANGES - EDIT OPERATION
            $(document).on('submit','#editOperationForm',function(){
                event.preventDefault();
                var id = $('#id').val();
                var trid = $('#trid').val();
                var operationname = $('#_operationname').val();
                var cost = $('#_cost').val();
                if(operationname !='' && cost !=''){
                    $.ajax({ //Uncaught SyntaxError: Unexpected token ')'
                        url:"operation-update.php",
                        data:{id:id,operationname:operationname,cost:cost},
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
                                    row.row("[id='" + trid + "']").data([id, operationname, cost, button]);
                                    alert('Changes have been successfully saved');
                                    $('#editOperationModal').modal('hide');
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
                if(confirm('Are you sure you want to delete this Operation?')){
                    var id = $(this).data('id');
                    $.ajax({
                        url:"operation-delete.php",
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

        <!--ADD OPERATION MODAL-->
        <div class="modal fade amodal" id="addOperationModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="AddEmployee"> <!--aria-hidden="true"-->
            <!--data-bs-backdrop="static" - disable click outside of bootstrap model area to close modal
            data-bs-keyboard="false" - prevent close on ESC button-->
            <!--ADD VALIDATION FOR CLOSING THE MODAL, CANCEL BUTTON, AND SAVING THE INPUTS
            ADD VALIDATION FOR EACH REQUIRED INPUTS-->
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="AddOperation">ADD OPERATION</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!--INPUTS-->
                    <div class="modal-body">
                        <form id="saveOperationForm" action="javascript:void();" method="POST" class="needs-validation" novalidate>
                            <div class="mb-2 row">
                                <label for="operationname" class="row-sm-4 row-form-label">OPERATION NAME <span class="required">*</span></label>
                                <div class="row-sm-8">
                                    <input type="text" class="form-control" name="operationname" id="operationname" required/>
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label for="cost" class="row-sm-4 row-form-label">COST <span class="required">*</span></label>
                                <div class="input-group row-sm-8">
                                    <span class="input-group-text">₱</span>
                                    <input type="text" class="form-control cost" name="cost" id="cost" required/>
                                </div>
                            </div>
                        
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary cancel" data-bs-dismiss="modal">CANCEL</button>
                                <button type="submit" class="btn btn-primary">SAVE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!--EDIT OPERATION MODAL-->
        <div class="modal fade emodal" id="editOperationModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="AddEmployee">  <!--aria-hidden="true"-->
            <!--data-bs-backdrop="static" - disable click outside of bootstrap model area to close modal
            data-bs-keyboard="false" - prevent close on ESC button-->
            <!--ADD VALIDATION FOR CLOSING THE MODAL, CANCEL BUTTON, AND SAVING THE INPUTS
            ADD VALIDATION FOR EACH REQUIRED INPUTS-->
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="EditOperation">EDIT OPERATION DETAILS</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!--INPUTS-->
                    <div class="modal-body">
                        <input type="hidden" id="id" name="id" value="">
                        <input type="hidden" id="trid" name="trid" value="">
                        <form id="editOperationForm" action="javascript:void();" method="POST" class="needs-validation" novalidate>
                            <div class="mb-2 row">
                                <label for="_operationname" class="row-sm-4 row-form-label">OPERATION NAME <span  class="required">*</span></label>
                                <div class="row-sm-8">
                                    <input type="text" class="form-control" name="_operationname" id="_operationname" required/>
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label for="_cost" class="row-sm-4 row-form-label">COST <span class="required">*</span></label>
                                <div class="input-group row-sm-8">
                                <span class="input-group-text">₱</span>
                                    <input type="text" class="form-control ecost" name="_cost" id="_cost" required/>
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
            $('#addOperationModal').on('hidden.bs.modal', function () {
                $(this).find('#saveOperationForm').trigger('reset');
            });
            //CLEAR INPUTS WHEN CANCEL BUTTON IS CLICK - MODAL
            $('#addOperationModal').on('hidden.bs.modal', function () {
                $(this).find('.cancel').trigger('reset');
            });

            //OPERATION NAME VALIDATION
            /* CONCERN:
                ALPHANUMERIC
                SPECIAL CHARACTER: . , / & ( ) - * */

            //COST VALIDATION - ADD
            $('.cost').keypress(function(event) {
                var $this = $(this);
                if ((event.which != 46 || $this.val().indexOf('.') != -1) &&
                ((event.which < 48 || event.which > 57) &&
                (event.which != 0 && event.which != 8))) {
                    event.preventDefault();
                }

                var text = $(this).val();
                if ((event.which == 46) && (text.indexOf('.') == -1)) {
                    setTimeout(function() {
                        if ($this.val().substring($this.val().indexOf('.')).length > 3) {
                            $this.val($this.val().substring(0, $this.val().indexOf('.') + 3));
                        }
                    }, 1);
                }

                if ((text.indexOf('.') != -1) &&
                    (text.substring(text.indexOf('.')).length > 2) &&
                    (event.which != 0 && event.which != 8) &&
                    ($(this)[0].selectionStart >= text.length - 2)) {
                        event.preventDefault();
                }      
            });

            $('.cost').bind("paste", function(e) {
            var text = e.originalEvent.clipboardData.getData('Text');
            if ($.isNumeric(text)) {
                if ((text.substring(text.indexOf('.')).length > 3) && (text.indexOf('.') > -1)) {
                    e.preventDefault();
                    $(this).val(text.substring(0, text.indexOf('.') + 3));
                }
            } else {
                    e.preventDefault();
                }
            });

            //COST VALIDATION - EDIT
            $('.ecost').keypress(function(event) {
                var $this = $(this);
                if ((event.which != 46 || $this.val().indexOf('.') != -1) &&
                ((event.which < 48 || event.which > 57) &&
                (event.which != 0 && event.which != 8))) {
                    event.preventDefault();
                }

                var text = $(this).val();
                if ((event.which == 46) && (text.indexOf('.') == -1)) {
                    setTimeout(function() {
                        if ($this.val().substring($this.val().indexOf('.')).length > 3) {
                            $this.val($this.val().substring(0, $this.val().indexOf('.') + 3));
                        }
                    }, 1);
                }

                if ((text.indexOf('.') != -1) &&
                    (text.substring(text.indexOf('.')).length > 2) &&
                    (event.which != 0 && event.which != 8) &&
                    ($(this)[0].selectionStart >= text.length - 2)) {
                        event.preventDefault();
                }      
            });

            $('.ecost').bind("paste", function(e) {
            var text = e.originalEvent.clipboardData.getData('Text');
            if ($.isNumeric(text)) {
                if ((text.substring(text.indexOf('.')).length > 3) && (text.indexOf('.') > -1)) {
                    e.preventDefault();
                    $(this).val(text.substring(0, text.indexOf('.') + 3));
                }
            } else {
                    e.preventDefault();
                }
            });
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