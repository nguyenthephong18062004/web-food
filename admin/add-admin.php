<?php include('partials/menu.php'); ?>

<div class = "main-content">
    <div class = "wrapper">
        <h1>Add Admin</h1>
        <br><br>

        <?php 
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];  // thông báp add thành công
                unset($_SESSION['add']); // xóa thông báo
            }
        
        ?>

        <form action = "" method = "POST">
            <table class = "tbn-30">
                <tr>
                    <td>Full Name: </td>
                    <td><input type = "text" name = "full_name" placeholder = "Enter Your Name"></td>
                </tr>
                <tr>
                    <td>Username: </td>
                    <td><input type = "text" name = "username" placeholder = "Your Username"></td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td><input type = "password" name = "password" placeholder = "Your Password"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class = "btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include('partials/footer.php'); ?>

<?php 
    // Process the value from form and save it in database
    
    // ktr nút đc bấm hay chưa
    
    if(isset($_POST['submit'])){
        $fullname = $_POST['full_name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "INSERT INTO tbl_admin SET
        full_name='$fullname',
        username='$username',
        password='$password'       
        ";
    
    // truy vấn và lưu vào csdl
    $res = mysqli_query($conn, $sql);

    if (!$res) {
        // Handle the error gracefully
        echo "Error: " . mysqli_error($conn);
        // Consider logging the error for further analysis
        error_log("MySQL Error: " . mysqli_error($conn));
        // Optionally, redirect to an error page or display a generic error message
    
        exit;
    }   
    

    // ktr truy vấn thực hiện hay ko
       if($res==TRUE){
            //echo"Yes";
            //Create a session variable to display message
            $_SESSION['add'] = "<div class='success'>Admin Added Successfully</div>";
            //Redirect page to manage admin
        
        }
        else{
        //echo"Not";
        //Create a session variable to display message
        $_SESSION['add'] = "<div class='error'>Failed to Add Admin</div>";
        //Redirect page to add admin
        
        }
    }
?>



