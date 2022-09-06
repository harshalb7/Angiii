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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <title>Dashboard</title>
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
                        <a href="employee-profile.php"><i class="fa-solid fa-display"></i>MY PROFILE</a>
                    </div> 

                    <!---MAINTENANCE-->
                    <div class="item">
                        <a class="sub-btn"><i class="fa-solid fa-screwdriver-wrench"></i>PRODUCTIONS</a> 
                    </div>

                    <div class="item">
                        <a class="sub-btn"><i class="fa-solid fa-screwdriver-wrench"></i>PAYSHEET</a> 
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
                <div class="card">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                </div>
            </div>
        </div>

    </body>
</html>

<?php
    } else {
        header("Location: employee-index.php");
        exit();
    }
?>