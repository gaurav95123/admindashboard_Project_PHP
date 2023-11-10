<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');
    exit();
}
$username=$_SESSION['username'];
?>



<?php
session_start();

// Check if the user is authenticated or has a valid session
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];

    // Perform a database query to fetch the name
    $query = "SELECT name FROM crud_table WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id); // Assuming 'id' is an integer

    if ($stmt->execute()) {
        $stmt->bind_result($name);
        $stmt->fetch();

        $_SESSION['username'] = $name; // Store the name in a session variable
        $stmt->close();
    } else {
        // Handle the query execution error
    }
} else {
    // Redirect the user to a login page if they are not authenticated
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
    <link rel="stylesheet" href="assets/vendor/vector-map/jqvmap.css">
    <link href="assets/vendor/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/daterangepicker/daterangepicker.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <style>
    .report{
        margin-left: 900px;
    
    }
  </style>
    <title>User Management</title>
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
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <?php include_once("assets/includesfiles/side_bar.php"); ?>

        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-finance">
                <div class="container-fluid dashboard-content">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <!-- <h3 class="mb-2">Admin Dashboard </h3> -->
                                <!-- <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p> -->
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <!-- <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"> Admin Dashboard</a></li> -->
                                            <!-- <li class="breadcrumb-item active" aria-current="page">Admin Dashboard </li> -->
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <?php include "connect.php";?>
  

  <div class="container">
    <?php
    if (isset($_GET["msg"])) {
      $msg = $_GET["msg"];
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      ' . $msg . '</div>';

    }
    ?>
    <a href="add-gmp.php" class="btn btn-secondary mb-3">Back</a>
    <!-- <a href="user-managment-add.php" class="btn btn-secondary mb-3">Add New</a> -->
    <a href="index.php" class="btn  btn-primary mb-3">Home</a>
    <a href="report.php" class="btn  btn-primary report ml-10 mb-3">View Report</a>
                              

<table class="table table-hover text-center">
  <thead class="table-light">
    
    <h1 class="p-3">Audit Details</h1>
    <tr>
      <th>Id</th>
      <th>Date</th>
      <th>Auditor</th>
      <th>Auditee</th>

      <th>Audit</th>
      <th>Question</th>

      
      <th>Answer</th>     
      <th>Options</th>
      <th>Image</th>
     
      <!-- <th>Update</th>
      <th>View</th>
      <th>Delete</th> -->
    </tr>
  </thead>
  <tbody>

                 <?php
                            // $sql = "SELECT * FROM `gmp_audit`";

                    // ======================================================================================================        
                    //                $query= "SELECT gmp.*, gmp2.ques, gmp1.date, gmp1.auditee,gmp1.audit
                    // FROM gmp_audit gmp
                    // INNER JOIN gmp_audit2 gmp2 ON gmp.id = gmp2.qid
                    // INNER JOIN gmp_audit1 gmp1 ON gmp.id = gmp1.gid";
                                        // =======================================================================================================

                    // $query= "SELECT gmp.*, gmp2.ques, gmp1.date, gmp1.auditee,gmp1.audit,ts.quess,ts.cmnt,ts.ans,ts.cmnt,ts.pic
                    // FROM gmp_audit gmp
                    // INNER JOIN gmp_audit2 gmp2 ON gmp.id = gmp2.qid
                    // INNER JOIN gmp_audit1 gmp1 ON gmp.id = gmp1.gid
                    // INNER JOIN tblsaveans ts ON gmp.id = ts.qqid";


                           $query= "SELECT ts.*,  gmp1.date, gmp1.auditee,gmp1.audit
                           FROM tblsaveans ts
                        --    INNER JOIN gmp_audit2 gmp2 ON gmp.id = gmp2.qid
                           INNER JOIN gmp_audit1 gmp1 ON ts.id = gmp1.gid
                        --    INNER JOIN tblsaveans ts ON gmp.id = ts.qqid";



                            
                    //        $query1111= "SELECT gmp1.*, gmp2.ques, gmp.ansone, gmp.anstwo, gmp.ansthree
                    // FROM gmp_audit1 gmp1
                    // INNER JOIN gmp_audit2 gmp2 ON gmp1.id = gmp2.qid
                    // INNER JOIN gmp_audit gmp ON gmp1.id = gmp.qid";

                            // $query = "select gmp1.*, gmp2.ques, gmp.ansone, gmp.anstwo, gmp.ansthree
                            //   FROM gmp_audit1 gmp1
                            //   INNER JOIN gmp_audit2 gmp2 ON  gmp1.id = gmp2.qid
                                                                //   INNER JOIN gmp_audit gmp ON  gmp1.id = gmp.qid";
                                        $result = mysqli_query($conn, $query);

                                    if (!$result) {
                                        die("Query failed: " . mysqli_error($conn));
                                    }

                                    $sequentialId = 1; // Initialize a sequential ID

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['date']; ?></td>
                                            <!-- <td>na</td> -->
                                            <td><?php echo $userName;?></td>
                                            <td><?php echo $row['auditee']; ?></td>
                                            <td><?php echo $row['audit']; ?></td>
                                            <!-- <td><?php echo $row['ques']; ?></td> -->
                                            <!-- <td><?php echo $row['ansone']; ?></td> -->
                                            <td><?php echo $row['quess']; ?></td>
                                            <td><?php echo $row['cmnt']; ?></td>  
                                            <td><?php echo $row['ans']; ?></td>
                                            <td>
                                                <?php
                                                echo '<img src="assets/suppdoc/' . $row['pic'] . '" style="width: 100px; margin-right:-15px;  height: 100px; border: 1px solid #ccc;">';
                                                ?>
                                            </td>            
                                        </tr>
                                        <?php
                                        $sequentialId++; // Increment the sequential ID for the next row

                                    }

                                    // Don't forget to close the database connection when you're done
                                    mysqli_close($conn); 
                                    
                                   ?>
  </tbody>
</table>
</div>   
                    <!-- ============================================================== -->
                    <!-- end inventory turnover -->
                    <!-- ============================================================== -->
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
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- jquery 3.3.1  -->

    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- chart chartist js -->
    <script src="assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <script src="assets/vendor/charts/chartist-bundle/Chartistjs.js"></script>
    <script src="assets/vendor/charts/chartist-bundle/chartist-plugin-threshold.js"></script>
    <!-- chart C3 js -->
    <script src="assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <!-- chartjs js -->
    <script src="assets/vendor/charts/charts-bundle/Chart.bundle.js"></script>
    <script src="assets/vendor/charts/charts-bundle/chartjs.js"></script>
    <!-- sparkline js -->
    <script src="assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- dashboard finance js -->
    <script src="assets/libs/js/dashboard-finance.js"></script>
    <!-- main js -->
    <script src="assets/libs/js/main-js.js"></script>
    <!-- gauge js -->
    <script src="assets/vendor/gauge/gauge.min.js"></script>
    <!-- morris js -->
    <script src="assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="assets/vendor/charts/morris-bundle/morris.js"></script>
    <script src="assets/vendor/charts/morris-bundle/morrisjs.html"></script>
    <!-- daterangepicker js -->
    <script src="assets/vendor/datepicker/moment.js"></script>
    <script src="assets/vendor/datepicker/datepicker.js"></script>

</body>
</html>
