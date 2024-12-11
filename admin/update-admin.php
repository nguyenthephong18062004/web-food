<?php require 'partials/menu.php' ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>

        <br><br>

        <?php

        $id = $_GET['id']; //1 lấy id cảu admin để xóa
        $sql = "SELECT * FROM tbl_admin WHERE id = $id"; //2 tạo truy vấn sql để xóa admin
        $res = mysqli_query($conn, $sql);// truy vấn 
        
        //ktr
        if ($res == TRUE) {
            $count = mysqli_num_rows($res); // ktr dl có sẵn sàng
            
            //ktr có dl hay ko
            if ($count == 1) {
                //lấy dl
                $row = mysqli_fetch_assoc($res); //gạch chân trong csdl
                $fullname = $row['full_name'];
                $username = $row['username'];
            }
            else{
                header('loaction'.SITEURL.'admin/manage-admin.php'); //chuyển hướng
            }
        }
        ?>

        <form action="" method="post">
            <table class="tbn-30">
                <tr>
                    <td>Full Name: </td>
                    <td><input type="text" name="full_name" value="<?php echo $fullname; ?>"></td>
                </tr>
                <tr>
                    <td>Username: </td>
                    <td><input type="text" name="username" value="<?php echo $username; ?>"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php 
    //ktr nút đc bấm hay ko
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        
        // tạo truy vấn sql
        $sql = "UPDATE tbl_admin SET
        full_name = '$full_name',
        username = '$username'
        WHERE id = '$id'
        ";
        
        //truy vấn
        $res = mysqli_query($conn, $sql);
        //ktr truy vấn
        if($res==TRUE){
            $_SESSION['update'] = "<div class ='success'>Admin Updated Successfully</div>";
            header('location: '.SITEURL.'admin/manage-admin.php'); // Correct the header function
            exit(); // thêm lối thoát để dừng thực hiện
        }
        else{
            $_SESSION['update'] = "<div class ='error'>Fail to Update Admin</div>";
            header('location: '.SITEURL.'admin/manage-admin.php'); // Correct the header function
            exit();
        }
    }
?>


<?php require 'partials/footer.php' ?>