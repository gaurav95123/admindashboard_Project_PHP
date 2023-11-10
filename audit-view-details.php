<!-- audit-view-details backup code -->

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

  <title> View Audit Details</title>
  <link rel="icon" type="image/png" href="assets/images/admin.png">
  <!-- <link rel="icon" type="assets/image/png" href="assets/images/admin.png"> -->
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
    <a href="view-audit-details.php" class="btn btn-secondary mb-3">Back</a>
    <a href="index.php" class="btn  btn-primary mb-3">Home</a>
    <!-- Your HTML and table structure -->

<table class="table table-hover text-center">
    <thead class="table-light">
    <h1 class="p-3">Audit Details || Audit Management</h1>
        <tr>
            <th>Id</th>
            <th>Date</th>
            <th>Quess</th>
            <!-- <th>Auditee</th> -->
            <th>Ans</th>
            <!-- <th>Auditor</th> -->
            <th>Comment</th>
            <th>Description</th>
            <th>Pics</th>
            <th>Status1</th>
            <th>Status2</th>
            <th>Action<th>
        </tr>
    </thead>
    <tbody>
        
    <?php
error_reporting(0);
$sno = $_GET['id'];
$amid = $_GET['amid'];

// $amdd= `$_GET['amid']`; 

// $amid= $_GET['amid'];
// ===============================================================================
// $amid = $_GET['amid'];

$query1="SELECT * FROM audit_management WHERE amid ='$amid'";

// $query = "SELECT * FROM ans1 WHERE sno = '$sno'";

// =============================================================================

//  two query concatination

// $query1 = "SELECT * FROM audit_management WHERE amid = '$amid';";
// $query2 = "SELECT * FROM ans1 WHERE sno = '$sno';";
// $sql = $query1 .';'. $query2;

// ===========================================================================
// using joins

 // First Query
//   $query = "SELECT an.*, am.dates
//           FROM ans1 an
//           INNER JOIN audit_management am ON an.id = am.amid";

// ===================================================================

// using UNION ALL;

// $query1 = "SELECT * FROM ans1 WHERE sno = '$sno'";
// $query2 = "SELECT date FROM audit_management WHERE amid = '$amid'";
// $combinedQuery = "($query1) UNION All ($query2)";

// $query1="select*from audit_management where";


// $query1 = "SELECT column_name FROM audit_management WHERE amid = :amid";

//  $query2="SELECT *  FROM audit_management where amid= '$amid'";

//  $query2="SELECT * FROM audit_management where amid='$sno'";
// $result1=mysqli_query($conn, $query);

// $result=mysqli_multiple_query($conn, $query1:$query);

// ===========================================

$sql= "SELECT * from ans1 where sno= '$sno'";

$result1 = mysqli_query($conn, $sql);
$sequentialId = 1;
while ($row = mysqli_fetch_assoc($result1)) {

    // Determine the status based on 'ans' value
    $ansValue = getAuditStatus($row['ans']);
    $ansValues = getNewAnsValue($row['ans']);
    ?>
    <tr>
        <td><?php echo $row['qqid']; ?></td>
        <td><?php echo $row['date']; ?></td>
        <td><?php echo $row['quess']; ?></td>
        <!-- <td><?php echo $row['auditt']; ?></td> -->
        <td><?php echo $row['ans']; ?></td>
        <!-- <td><?php echo $userName; ?></td> -->
        <!-- <td><?php echo $row['id']; ?></td> -->
        <td><?php echo $row['cmnt']; ?></td>
        <td><?php echo $row['tarea']; ?></td>

        <td>
            <?php
            // Assume $row['pic'] contains the image URL
            $imageURL = $row['pic'];

            if (!empty($imageURL)) {
                echo '<img src="assets/auditdoc/' . $imageURL . '" width="100px" />';
            } else {
                echo '';
            }
            ?>
        </td>
        <td><?php echo $ansValue; ?></td>
        <td><?php echo $ansValues; ?></td>
        <td>

            <?php
            // Conditionally show the view section if 'ans' is 'major' or 'minor'
            if ($row['ans'] === 'major' || $row['ans'] === 'minor') {
                // echo '<a href="auditt-management.php?id=' . $row["id"] . '" class="fa-solid fa-plus fs-5"></a>';
                // echo '<a href="auditt-management.php?id=' . $row["id"] . $row["amid"]'" class="fa-solid fa-plus fs-5"></a>';
               
                // echo'<a href="auditt-management.php?id=' . $row["id"] . '&amid=' . $sno . '" class="fa-solid fa-plus fs-5"></a>';
                echo'<a href="auditt-management.php?id=' . $row["id"] . '&amid='. $sno.  '" class="fa-solid fa-plus fs-5"></a>';
            }
            ?>
        </td>
    </tr>
    <?php

    $sequentialId++;
}

// Close the database connection
mysqli_close($conn);
?>

<?php
// Second Query
$query2 = "SELECT sno, ans FROM ans1";
$results2 = mysqli_query($conn, $query2);

if ($results2) {
    while ($row = mysqli_fetch_assoc($results2)) {
        $sno = $row['sno'];
        $ansValue = $row['ans'];

        // Use the getAuditStatus function to determine the audit status for each 'ans' value
        
        $auditStatus = getAuditStatus($ansValue);
        // Output the results
        if ($auditStatus == 'nc') {
            ?>
            <tr>
                <!-- Display the anchor link section when audit status is 'nc' -->

                <!-- <td>
                    <a href="auditt-management.php?id=<?php echo $sno; ?>" class="fa-solid fa-eye fs-5"></a>
                </td>

            </tr>
            <?php
        }
    }
    
    // Close the database connection
    mysqli_close($conn);
} else {
    echo "Error in the database query: " . mysqli_error($conn);
}

// Function to determine the audit status based on 'ans' value

function getAuditStatus($ansValue) {
    if ($ansValue == "compliant" || $ansValue == "not/applicable") {
        return "done";
    } elseif ($ansValue == "major" || $ansValue == "minor") {
        return "nc";
    } else {
        return $ansValue;
    }
}
?>

<!- audit status accept  status start  -->
<!-- ======================================================================= -->
<?php

$query = "SELECT sno, ans FROM ans1";

// Execute the query
$results = mysqli_query($conn, $query);

if ($results) {
    while ($row = mysqli_fetch_assoc($results)) {
        $sno = $row['sno'];
        $ansValue = $row['ans'];
        // Determine the new value for $ansValue
        $newAnsValue = getNewAnsValue($ansValue);

        // Update the database with the new value
        $updateQuery = "UPDATE ans1 SET ans = '$newAnsValue' WHERE sno = $sno";
        $updateResult = mysqli_query($conn, $updateQuery);

    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo "Error in the database query: " . mysqli_error($conn);
}

// Function to determine the new value for 'ans' based on the existing value
function getNewAnsValue($ansValue) {
    if ($ansValue == "major" || $ansValue == "minor") {
        return "accepted";
    } elseif ($ansValue == "compliant") {
        return "completed";
    } elseif ($ansValue == "not/applicable") {
        return "not applicable";
    } else {
        return $ansValue; // No change for other values
    }
}

?>

<!-- ===================================================================== -->


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