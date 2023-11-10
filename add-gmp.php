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
    
    <title>Add GMP</title>
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
            <!-- <a href="audit-details.php" class="btn btn-secondary mt-3 ml-4 mb-3">View Audit Details</a> -->
                <a href="view-gmp.php" class="btn  btn-secondary  mt-3 ml-4 mb-3">View Salsa details</a>
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <h1 class="p-3">Add User</h1>
                    <div class="ecommerce-widget">
                        <div class="row">                           
<?php
include "connect.php";

if (isset($_POST["submit"])) {
    $date = $_POST["date"];
    $auditee = $_POST["auditee"];
    $audit = $_POST["audit"];
    
    // Using prepared statement to prevent SQL injection

    $sql = "INSERT INTO gmp_audit1 (date, auditee, audit, auditor) VALUES ('$date', '$auditee', '$audit', '" . $_SESSION['username'] . "')";


    $result = mysqli_query($conn, $sql);


    $sql1="SELECT * from gmp_audit1 where date='$date' and  auditee='$auditee' and audit='$audit' order by id desc limit 1";
    $sql11=mysqli_query($conn,$sql1);
    $sql2= mysqli_fetch_assoc( $sql11);
     $sno=  $sql2['id'];

    // $sql = "INSERT INTO gmp_audit1 (date, auditee, audit,auditor) VALUES
    // ('$date', '$auditee', '$audit','$_SESSION["username"])'";
   
    // $sql = mysql_query("INSERT INTO $tbl_nameVALUES('','$eventname','$_SESSION['myusername'])");

    // $sql = "INSERT INTO gmp_audit1 (date, auditee, audit, auditor) VALUES ('$date', '$auditee', '$audit', '$username')";

    // $stmt->bind_param("sss", $date, $auditee, $audit);
   
   

    if ($result) {
        // echo"<p style='color: green;'>Data added successfully</p>";
        //  echo "Data added successfully";
    //    header("Location: add-gmp.php?msg=New record created successfully");
    //    header("Location: questions-page.php?msg= New record created successfully &sno= '$sno' ");
    // header("Location: questions-page.php?msg=New record created successfully&sno=$sno");
// ================================================================================================
    // header("Location: questions-page.php?msg=New record created successfully&sno= '$sno' ");
header("Location: questions-page.php?msg=New record created successfully&sno=$sno ");

// ================================================================================================

    // header("Location: questions-page.php?msg=New record created successfully & sno= $sno ");
    // header("Location: questions-page.php?msg=New record created successfully&sno=$sno");



    } else {
       echo "Failed: " . mysqli_error($conn);
    }
}
?>     
                            <div class=" col-md-12 col-sm-12 col-12">
                            <!-- <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12"> -->

                                <div class="card">
                                    <div class="card-body">
                                        <!-- form -->
                                        <form action="" id="basicform"
                                             method="POST">
                                    
                                             <div class="form-group">
                                             <label for="datepicker ml-3">Select Date:</label>
                                            <input type="date" id="datepicker" name="date">
                                            </div> 
                                            <div class="form-group">
                                            <label for="auditee">Auditee:</label>
                                            <input id="Contact" type="text" name="auditee" required="" placeholder="Enter Auditee" autocomplete="off" class="form-control">
                                            </div> 
                                            <div class="form-group">
                                                <label for="department">Select Audit:</label>
                                                <select id="auditttt" name="audit" required class="form-control">
                                                <option value="" disabled selected>Please Select</option>
                                                <option value="Sausage production area">Sausage production area</option>
                                                <option value="Saveloys production area">Saveloys production area</option>
                                                <option value="Unit 13- Dry Rm and Packaging storage area">Unit 13- Dry Rm and Packaging storage area</option>
                                                <option value="Unit 5">Unit 5</option>
                                                </select>

                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 pl-0">
                                                    <p class="text-right">
                                                        <button type="submit" name="submit"
                                                            class="btn btn-space btn-primary">Submit</button>
                                                        <!-- <button class="btn btn-space btn-secondary">Cancel</button> -->
                                                        <a href="index.php" class="btn btn-space btn-secondary">Back</a>
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
