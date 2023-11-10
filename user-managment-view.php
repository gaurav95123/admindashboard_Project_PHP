<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');
    exit();
}

$username=$_SESSION['username'];
?>


<?php
include 'connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Retrieve the product details from the database
    // $sql = "SELECT * FROM  user_management WHERE id = $id";
    // $result = $conn->query($sql);

//     if ($result->num_rows == 1) {
//         $row = $result->fetch_assoc();
//     } else {
//         echo "Product not found.";
//     }
// } else {
//     echo "Product ID not provided.";
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>view  management</title>
    <link rel="icon" type="image/png" href="assets/images/admin.png">

</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <?php include_once("assets/includesfiles/nav_bar.php"); ?>
        <!-- ============================================================== -->
        <?php include_once("assets/includesfiles/side_bar.php"); ?>
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <h1 class="p-3">View User Details</h1>
                    <div class="ecommerce-widget">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="#" id="basicform" data-parsley-validate="">
                                        <?php

$sql = "SELECT * FROM user_management WHERE id ='$id'";
// $sql="SELECT * FROM gmp_audit1 WHERE id='$id'";

$result = mysqli_query($conn, $sql);

$i = 0;

$row = mysqli_fetch_assoc($result);

?>
                                        <div class="form-group">
                                            <br>
                                            <label for="inputImage">Image</label>
                                                <div>
                                                     <img src="<?php echo $row['uphoto']; ?>" width="200" >
                                                </div>
                                                
                                                <br>
                                                <div class="form-group">
                                                <label for="inputUserName">First Name</label>
                                                <input id="inputUserName" type="text" name="firstname" required=""
                                                    placeholder="First name" autocomplete="off"   value="<?php echo $row['firstname']; ?>" class="form-control" disabled>
                                            </div>

                                                <div class="form-group">
                                                <label for="lastname"> Last Name</label>
                                                <input id="lastname" type="text" name="lastname" required=""
                                                    placeholder="Enter name" autocomplete="off" value="<?php echo $row['lastname']; ?>"  class="form-control" disabled>
                                            </div>

                                
                                            <div class="form-group">
                                                <label for="inputEmail">Email</label>
                                                <input id="inputEmail" value="<?php echo $row['email']; ?>" type="email" name="email" required=""
                                                 autocomplete="off" class="form-control" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword">User Name</label>
                                                <input id="inputPassword"  value="<?php echo $row['username']; ?>"type="text" name="username"
                                                 required="" class="form-control" disabled>
                                            </div>
                                            <!-- <div class="form-group">
                                                <label for="inputRepeatPassword">Password</label>
                                                <input id="inputRepeatPassword" data-parsley-equalto="#inputPassword"
                                                    name="password" type="text" required=""
                                                class="form-control" disabled>
                                            </div> -->
                                            <div class="form-group">
                                                <label for="inputPassword">Job Title</label>
                                                <input id="inputPassword" type="text" name="jobtitle"
                                                    placeholder="Enter username" required="" value="<?php echo $row['jobtitle']; ?>"  class="form-control" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="department">Department</label>
                                                <input id="department" type="text" name="department"  value="<?php echo $row['department']; ?>"
                                                    placeholder="Enter Department" required="" class="form-control" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail">Pay Roll No.</label>
                                                <input id="Contact" type="text" name="payroll" required="" value="<?php echo $row['payroll']; ?>"
                                                    placeholder="Enter pay roll" autocomplete="off" class="form-control" disabled>
                                            </div>
                                         

                                            <div class="row">
                                                <div class="col-sm-6 pl-0">
                                                    <p class="text-right">
                                                        <a href="user-managment.php"
                                                            class="btn btn-space btn-secondary">Back</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <?php include_once("assets/includesfiles/footer.php"); ?>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="assets/libs/js/main-js.js"></script>
    <!-- chart chartist js -->
    <script src="assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <!-- sparkline js -->
    <script src="assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- morris js -->
    <script src="assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="assets/vendor/charts/morris-bundle/morris.js"></script>
   
</body>

</html>
