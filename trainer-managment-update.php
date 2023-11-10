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
    <title>Update Trainer Management</title>
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
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content">
                    <!-- ============================================================== -->
                    <h1 class="p-3">Update Trainer Management</h1>
                    <div class="ecommerce-widget">
                        <div class="row">
                            <?php
                            include "connect.php";
                            if (isset($_GET["id"])) {
                                $id = $_GET["id"];
                                if (isset($_POST["submit"])) {
                                    $name = mysqli_real_escape_string($conn, $_POST["name"]);
                                    $email = mysqli_real_escape_string($conn, $_POST["email"]);
                                    $username = mysqli_real_escape_string($conn, $_POST["username"]);
                                    $password = mysqli_real_escape_string($conn, $_POST["password"]);

                                    $sql = "UPDATE `crud_table` SET `name`='$name', `email`='$email', `username`='$username', `password`='$password' WHERE id = $id";

                                    $result = mysqli_query($conn, $sql);

                                    if ($result) {
                                        header("Location:trainer-managment.php?msg=Data updated successfully");
                                        exit();
                                    } else {
                                        echo "Failed: " . mysqli_error($conn);
                                    }
                                }

                                $sql = "SELECT * FROM `crud_table` WHERE id = $id LIMIT 1";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($result);
                            } else {
                                // Handle the case when 'id' is not set, e.g., show an error message or redirect.
                            }
                            ?>

                            <div class=" col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $id; ?>"
                                              id="basicform" data-parsley-validate="" method="POST">
                                            <div class="form-group">
                                                <label for="inputUserName">Name</label>
                                                <input id="inputUserName" type="text" name="name" required=""
                                                       placeholder="Enter name" autocomplete="off" class="form-control"
                                                       value="<?php echo $row['name']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail">Email</label>
                                                <input id="inputEmail" type="email" name="email" required=""
                                                       placeholder="Enter email" autocomplete="off" class="form-control"
                                                       value="<?php echo $row['email']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword">Username</label>
                                                <input id="inputPassword" type="text" name="username"
                                                       placeholder="Enter username" required="" class="form-control"
                                                       value="<?php echo $row['username']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputRepeatPassword">Password</label>
                                                <input id="inputRepeatPassword" data-parsley-equalto="#inputPassword"
                                                       name="password" type="text" required=""
                                                       placeholder="Enter Password" class="form-control"
                                                       value="<?php echo $row['password']; ?>">
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 pl-0">
                                                    <p class="text-right">
                                                        <button type="submit" name="submit" class="btn btn-space btn-primary">Update</button>
                                                        <a href="trainer-managment.php" class="btn btn-space btn-secondary">Cancel</a>
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
