<?php 
require '../config/constants.php'; ?>
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

    </body>
</html>
<?php
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    
    $sql = "SELECT * FROM tbl_admin WHERE username=? AND password=?";
    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
  
    mysqli_stmt_execute($stmt);

    mysqli_stmt_store_result($stmt);

    $count = mysqli_stmt_num_rows($stmt);

    mysqli_stmt_close($stmt);

    if ($count == 1){
        $_SESSION['login'] = '';
        $_SESSION['user'] = $username;
        header('location:index.php');
    }
    else{
        header('location:login.php');
    }
}

?>
