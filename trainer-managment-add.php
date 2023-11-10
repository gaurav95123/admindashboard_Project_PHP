<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');
    exit();
}

$username=$_SESSION['username'];
?>




<?php ob_start(); ?>
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
    
    <title>Add Training Management</title>
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
                    <h1 class="p-3">Add Trainer Management</h1>
                    <div class="ecommerce-widget">
                        <div class="row">
                                   <?php
                            include "connect.php";
                            
                            if (isset($_POST["submit"])) {
                                $name = mysqli_real_escape_string($conn, $_POST["name"]);
                                $email = mysqli_real_escape_string($conn, $_POST["email"]);
                                $username = mysqli_real_escape_string($conn, $_POST["username"]);
                                $password = mysqli_real_escape_string($conn, $_POST["password"]);

                                $sql = "INSERT INTO crud_table (name, email, username, password) VALUES ('$name', '$email', '$username', '$password')";
                                
                                if (mysqli_query($conn, $sql)) {
                                    header("Location: trainer-managment.php?msg=New record added successfully");
                                    exit();
                                } else {
                                    echo "Failed: " . mysqli_error($conn);
                                }
                            }
                             ?>     
                            <div class=" col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" id="basicform"
                                            data-parsley-validate="" method="POST">
                                            <div class="form-group">
                                                <label for="inputUserName"> Name</label>
                                                <input id="inputUserName" type="text" name="name" required=""
                                                    placeholder="Enter name" autocomplete="off" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail">Email</label>
                                                <input id="inputEmail" type="email" name="email" required=""
                                                    placeholder="Enter email" autocomplete="off" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword">User Name</label>
                                                <input id="inputPassword" type="text" name="username"
                                                    placeholder="Enter user name" required="" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputRepeatPassword"> Password</label>
                                                <input id="inputRepeatPassword" data-parsley-equalto="#inputPassword"
                                                    name="password" type="text" required=""
                                                    placeholder=" Enter Password" class="form-control">
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 pl-0">
                                                    <p class="text-right">
                                                        <button type="submit" name="submit"
                                                            class="btn btn-space btn-primary">Submit</button>
                                                        <!-- <button class="btn btn-space btn-secondary">Cancel</button> -->
                                                        <a href="trainer-managment.php" class="btn btn-space btn-secondary">Cancel</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
                                integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
                                crossorigin="anonymous"></script>
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
