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
    
    <title>Add Auditor Management</title>
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
                    <h1 class="p-3">Add Update  User</h1>
                    <div class="ecommerce-widget">
                        <div class="row">
                              <?php
                            include "connect.php";
                            if (isset($_GET["id"])) {
                                $id = $_GET["id"];
                                if (isset($_POST["submit"])) {
                                   $firstname = mysqli_real_escape_string($conn, $_POST["firstname"]);
                                    $lastname = mysqli_real_escape_string($conn, $_POST["lastname"]);
                                    $username = mysqli_real_escape_string($conn, $_POST["username"]);
                                    $password = mysqli_real_escape_string($conn, $_POST["password"]);
                                    $email = mysqli_real_escape_string($conn, $_POST["email"]);
                                    $jobtitle = mysqli_real_escape_string($conn, $_POST["jobtitle"]);
                                    $department = mysqli_real_escape_string($conn, $_POST["department"]);
                                    $payroll = mysqli_real_escape_string($conn, $_POST["payroll"]);
                                    // $sql = "UPDATE `user_management` SET `name`='$name', `email`='$email', `username`='$username', `password`='$password' WHERE id = $id";
                                    $sql  = "UPDATE user_management SET firstname = '$firstname', lastname = '$lastname', username = '$username', email='$email' , jobtitle='$jobtitle',department='$department', payroll='$payroll'  WHERE id = $id";

                                    $result = mysqli_query($conn, $sql);

                                    if ($result) {
                                        header("Location:user-managment.php?msg=Data updated successfully");
                                        exit();
                                    } else {
                                        echo "Failed: " . mysqli_error($conn);
                                    }
                                }

                                $sql = "SELECT * FROM `user_management` WHERE id = $id LIMIT 1";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($result);
                            } else {
                                // Handle the case when 'id' is not set, e.g., show an error message or redirect.
                            }
                            ?>
              


                            <div class="col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                         <form action="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $id; ?>"
                                              id="basicform" data-parsley-validate="" method="POST">
                                            <div class="form-group">
                                                <label for="inputUserName">First Name</label>
                                                <input id="inputUserName" type="text" name="firstname" required=""
                                                    placeholder="First name" autocomplete="off"   value="<?php echo $row['firstname']; ?>" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="lastname"> Last Name</label>
                                                <input id="lastname" type="text" name="lastname" required=""
                                                    placeholder="Enter name" autocomplete="off" value="<?php echo $row['lastname']; ?>"  class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="username">User Name</label>
                                                <input id="username" type="text" name="username" required=""
                                                    placeholder="Enter name" autocomplete="off" value="<?php echo $row['username']; ?>"  class="form-control">
                                            </div>
                                         
                                            <div class="form-group">
                                                <label for="inputEmail">Email</label>
                                                <input id="inputEmail" type="email" name="email" required=""
                                                    placeholder="Enter email" autocomplete="off" value="<?php echo $row['email']; ?>" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword">Job Title</label>
                                                <input id="inputPassword" type="text" name="jobtitle"
                                                    placeholder="Enter username" required="" value="<?php echo $row['jobtitle']; ?>"  class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputRepeatPassword"> Password</label>
                                                <input id="inputRepeatPassword" data-parsley-equalto="#inputPassword"
                                                    name="password" type="text" required=""  value="<?php echo $row['password']; ?>"
                                                    placeholder=" Enter Password"   class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="department">Department</label>
                                                <input id="department" type="text" name="department"  value="<?php echo $row['department']; ?>"
                                                    placeholder="Enter Department" required="" class="form-control">
                                            </div>
                                            
                                            <!-- <div class="form-group">
                                                <label for="image">User Photo:</label>
                                                    <input type="file" id="image" name="uphoto" accept="image/*">
                                            </div> -->
                                            <br>
                                            <div class="form-group">
                                                <label for="inputEmail">Pay Roll No.</label>
                                                <input id="Contact" type="text" name="payroll" required="" value="<?php echo $row['payroll']; ?>"
                                                    placeholder="Enter pay roll" autocomplete="off" class="form-control">
                                            </div>
                                         
                                            <div class="row">
                                                <div class="col-sm-6 pl-0">
                                                    <p class="text-right">
                                                        <button type="submit" name="submit"
                                                            class="btn btn-space btn-primary">Submit</button>
                                                            <a href="user-managment.php" class="btn btn-space btn-secondary">Cancel</a>
                                                        <!-- <button class="btn btn-space btn-secondary">Cancel</button> -->
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
    <script>
    // Get the Contact input element by its ID
const contactInput = document.getElementById("Contact");

// Add an input event listener to the input field
contactInput.addEventListener("input", function () {
    // Get the current value of the input field
    const inputValue = contactInput.value;

    // Use a regular expression to test if the input contains only digits
    const isOnlyDigits = /^\d+$/.test(inputValue);

    // If the input contains non-digit characters, clear the input field
    if (!isOnlyDigits) {
        contactInput.value = '';
    }
});
</script>
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









