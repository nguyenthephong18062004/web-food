<?php include("partials/menu.php");?>


        <!-- main content section starts-->
        <div class="main-content">
            <div class="wrapper">
                <h1>DASHBOARD</h1>

                <div class="col-4 text-center">

                <?php 
        
        $sql = "SELECT * FROM tbl_category";

        $res = mysqli_query($conn,$sql);

        $count = mysqli_num_rows($res);
            ?>

                    <h1><?php echo $count;?></h1>
                    <br/>
                        Category
                </div>

                <div class="col-4 text-center">

                <?php
          $sql2 = "SELECT * FROM tbl_food";

          $res2 = mysqli_query($conn,$sql2);

          $count2 = mysqli_num_rows($res2);
          ?>
                    <h1><?php echo $count2 ;?></h1>
                    <br/>
                        Food
                </div>

                <div class="col-4 text-center">
                <?php 
        
                    $sql3 = "SELECT * FROM tbl_order";

                    $res3 = mysqli_query($conn,$sql3);

                    $count3 = mysqli_num_rows($res3);
                ?>
                    <h1><?php echo $count3 ;?></h1>
                    <br  />
                    Total Order
                </div>

                <div class="col-4 text-center">
                    <?php
                    $sql4 = "SELECT SUM(total) AS total FROM tbl_order WHERE status='Delivered'";

                    $res4 = mysqli_query($conn,$sql4);
            
                    $row4 = mysqli_fetch_assoc($res4);

                    $total_revenue = $row4['total'];
                     
                     ?>
                    <h1><?php echo $total_revenue ;?></h1>
                    <br/>
                    Generated
                </div>
            <div class="clearfix"></div>

                                        


            </div>
         </div>
        <!-- main content section ends-->

<?php include("partials/footer.php"); ?>