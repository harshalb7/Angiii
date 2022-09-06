<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="index-body.css">
        <title>Admin Login</title>
    </head>
    <body>
        <form action="admin-login.php" method="POST">
            <h2>ADMIN</h2>
            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error'];?></p>
            <?php }?>
            <label>Username</label>
            <input type="text" name="username" placeholder="Username">

            <label>Password</label>
            <input type="password" name="password" placeholder="Password">
            
            <button type="submit">Login</button>
        </form>
    </body>
</html>