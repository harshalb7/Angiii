<!DOCTYPE html>
<html>
<head>
        <title>Create Account</title>
        <meta charset="utf-8">
        <meta name = "viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" type="text/css" href="accounts-css.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>

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
    <!-- START OF CREATE ACCOUNT CODE -->
            <!--MAIN CONTAINER-->
            <div class="main-container ">

                <div class="card ">
                     <!-- <form action="file sa create acc" method="post"> -->
                     <form action="createacc-check.php" method="post">
                     <h2>Create Account</h2>
                     <?php if(isset($_GET['error'])) {?>
                     <p class="error"> <?php echo $_GET['error']; ?> </p>
                <?php } ?>

                      <?php if (isset($_GET['success'])) { ?>
                      <p class="success"><?php echo $_GET['success']; ?></p>
              <?php } ?>
       
          <div class="col">
               <label for="customertype" class="row-sm-4 row-form-label">ROLE <span class="required" style="color:red">*</span></label>
                     <div class="row-sm-8" select="width: 250px;" option="width: 250px;">

                            <select class="form-select" aria-label="Default select example" name="role" id="role"  required>
                                <option value="" disabled selected>--SELECT ROLE--</option>
                                   <option value="Admin">Admin</option>
                                   <option value="Project Manager">Project Manager</option>
                                   <option value="Employee">Employee</option>
                                   
                            </select>
                            
         
                     </div>
       </div>


    <label style="color:black">NAME <span class="required" style="color:red">*</span></label>
    <?php if (isset($_GET['name'])) { ?>
               <input type="text" 
                      name="name" 
                      placeholder="Name"
                      value="<?php echo $_GET['name']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="name" 
                      placeholder="NAME"><br>
          <?php }?>

    <label style="color:black">USERNAME<span class="required" style="color:red">*</span></label>
          <?php if (isset($_GET['uname'])) { ?>
               <input type="text" 
                      name="username" 
                      placeholder="User Name"
                      value="<?php echo $_GET['username']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="username" 
                      placeholder="USERNAME"><br>
          <?php }?>

    <label style="color:black">PASSWORD<span class="required" style="color:red">*</span></label>
     	<input type="password" 
                 name="password" 
                 placeholder="PASSWORD"><br>

          <label style="color:black">CONFIRM PASSWORD<span class="required" style="color:red">*</span></label>
          <input type="password" 
                 name="confirmpass" 
                 placeholder="CONFIRM PASSWORD"><br>


    <button type="submit">Create</button>
    <a href="admin-changepassword.php" class="ca">Change existing password</a>
    </form>
                    
                </div>
            </div>
        </div>

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