<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');
    exit();
}

$username=$_SESSION['username'];
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
    <a href="user-managment-add.php" class="btn btn-secondary mb-3">Add New</a>
    <a href="index.php" class="btn  btn-primary mb-3">Home</a>

<table class="table table-hover text-center">
  <thead class="table-light">
    <h1 class="p-3">User Details</h1>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Username</th>
      <th>Department</th>
      <th>Email</th>
      <th>Job title</th>
      <!-- <th>Photo</th> -->
      <th>Status</th>     
      <th>Update</th>
      <th>View</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "SELECT * FROM `user_management`";
    $result = mysqli_query($conn, $sql);
    $sequentialId = 1; // Initialize the sequential ID to 1

    while ($row = mysqli_fetch_assoc($result)) {
      ?>
      <tr>
        <td><?php echo $sequentialId; ?></td>
        <td><?php echo $row['firstname']; ?></td>
        <td><?php echo $row['lastname']; ?></td>
        <td><?php echo $row['username']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['jobtitle']; ?></td>
        <!-- <td><?php echo $row['uphoto']; ?></td> -->
        <!-- <td><?php echo $row['password']; ?></td> -->
        <td><?php echo $row['department']; ?></td>
        <td>
          <a href="user-managment-update.php?id=<?php echo $row["id"]; ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
        </td>
        <td>
          <a href="user-managment-view.php?id=<?php echo $row["id"]; ?>" class="fa-solid fa-eye fs-5"></a>
        </td>
        <td>
        <a href="javascript:void(0);" class="link-dark delete-record" data-id="<?php echo $row["id"]; ?>"><i class="fa-solid fa-trash fs-5"></i></a>
        </td>
      </tr>
      <?php
      $sequentialId++; // Increment the sequential ID for the next row
    }
    ?>
  </tbody>
</table>
</div>   
                    <!-- ============================================================== -->
                    <!-- end revenue year  -->
                    <!-- ============================================================== -->
                    
                    <!-- ============================================================== -->
                    <!-- end profit margin -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- earnings before interest tax  -->
                    <!-- ============================================================== -->
                    
                    <div class="row">
                        <!-- ============================================================== -->
                        <!-- overdue invoices  -->
                        <!-- ============================================================== -->
                        
                        <!-- ============================================================== -->
                        <!-- end overdue invoices  -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- disputed invoices  -->
                        <!-- ============================================================== -->
                       
                        <!-- ============================================================== -->
                        <!-- end disputed invoices  -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- account payable age  -->
                        <!-- ============================================================== -->
                        <!-- <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Accounts Payable Age</h5>
                                <div class="card-body">
                                    <div id="account" style="height: 300px;"></div>
                                </div>
                            </div>
                        </div> -->
                        <!-- ============================================================== -->
                        <!-- end account payable age  -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- working capital  -->
                        <!-- ============================================================== -->
                        <!-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Working Capital <span class="float-right">1 Jan 2018 to 31 Dec 2018</span></h5>
                                <div class="card-body">
                                    <div id="capital"></div>
                                    <div class="text-center m-t-10">
                                        <span class="legend-item mr-3">
                                                <span class="fa-xs text-secondary mr-1 legend-tile"><i class="fa fa-fw fa-square-full"></i></span>
                                        <span class="legend-text">Working Capital</span>
                                        </span>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- ============================================================== -->
                        <!-- end working capital  -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- inventory turnover  -->
                        <!-- ============================================================== -->
                        <!-- <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Inventory Turnover</h5>
                                <div class="card-body">
                                    <div class="ct-chart-inventory ct-golden-section"></div>
                                    <div class="text-center m-t-10">
                                        <span class="legend-item mr-3">
                                                <span class="fa-xs text-primary mr-1 legend-tile"><i class="fa fa-fw fa-square-full"></i></span>
                                        <span class="legend-text">Turnover</span>
                                        </span>
                                        <span class="legend-item mr-3">
                                                <span class="fa-xs text-secondary mr-1 legend-tile"><i class="fa fa-fw fa-square-full"></i></span>
                                        <span class="legend-text">Target</span>
                                        </span>
                                        <span class="legend-item mr-3">
                                                <span class="fa-xs text-info mr-1 legend-tile"><i class="fa fa-fw fa-square-full"></i></span>
                                        <span class="legend-text">Acheived</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div> -->
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
    <script>
document.addEventListener("DOMContentLoaded", function() {
    const deleteButtons = document.querySelectorAll(".delete-record");

    deleteButtons.forEach(button => {
        button.addEventListener("click", function() {
            const recordId = this.getAttribute("data-id");
            const confirmDelete = confirm("Are you sure you want to delete this record?");

            if (confirmDelete) {
                window.location.href = "user-managment-delete.php?id=" + recordId;
            }
        });
    });
});
</script>
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
    <script>
    $(function() {
        $('input[name="daterange"]').daterangepicker({
            opens: 'left'
        }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });
    });
    </script>
</body>
</html>
