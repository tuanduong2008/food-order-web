<?php require '../config/constants.php'; ?>
<html>
    <head>
        <title>Login - Food Order System</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
        <div class="login">
            <h1 class = "text-center">login</h1>
            <br><br>
            <?php
                if(isset($_SESSION['login'])){
                    echo $_SESSION['login'];
                    unset($_SESSION['login']); 
                }
                if(isset($_SESSION['no-login-message'])){
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']); 
                }  
            ?>
            <br><br>
            <form action = "" method="post" class ="text-center">
                Username: <br>
                <input type="text" name="username" placeholder="Enter Username"><br><br>
                Password: <br>
                <input type="password" name="password" placeholder="Enter Password"><br><br>
                <input type="submit" name="submit" value="Login" class ="btn-primary">
                <br><br>
            </form>
            <p class = "text-center">Create By - <a href="#">Tuấn Dương & Quốc Anh</a></p>
        </div>

    </body>
</html>
<?php
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Use prepared statement to prevent SQL injection
    $sql = "SELECT * FROM tbl_admin WHERE username=? AND password=?";
    $stmt = mysqli_prepare($conn, $sql);

    // Bind the parameters
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);

    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Store the result
    mysqli_stmt_store_result($stmt);

    // Check the number of rows returned
    $count = mysqli_stmt_num_rows($stmt);

    // Close the statement
    mysqli_stmt_close($stmt);

    if ($count == 1){
        $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
        $_SESSION['user'] = $username;
        header('location:'.SITEURL.'admin/');
    }
    else{
        header('location:'.SITEURL.'admin/login.php');
    }
}

?>
