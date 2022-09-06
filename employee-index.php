<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="index-body.css">
        <title>Employee Login</title>
    </head>
    <body>
        <form action="employee-login.php" method="POST">
            <h2>EMPLOYEE</h2>
            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error'];?></p>
            <?php }?>
            <label>Employee ID</label>
            <input type="text" name="username" placeholder="Employee ID">

            <label>Password</label>
            <input type="password" name="password" placeholder="Password">
            
            <button type="submit">Login</button>
        </form>
    </body>
</html>