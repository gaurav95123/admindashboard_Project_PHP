<?php
include "connect.php";
// error_reporting(0);
if (isset($_POST["submit"])) 
{
    for ($i = 0; $i < count($_POST['qqid']); $i++) 

    {
        $qqid = $_POST['qqid'][$i];
        $quess = mysqli_real_escape_string($conn, $_POST['ques'][$i]);    
        
        $ans =mysqli_real_escape_string($conn,$_Post ['r1'][$i]);
        // $ans =mysqli_real_escape_string($conn,$_Post ['r1'.$i]);
        // $ans = mysqli_real_escape_string($conn, $_POST['r1'.$i]);


        // $ans = mysqli_real_escape_string($conn, $_POST['r1'.$i]);

        $cmnt = mysqli_real_escape_string($conn, $_POST['cmnt'][$i]);

        // =======================================================================

        // $pic = mysqli_real_escape_string($conn, $_FILES['pic'.$i]['name']);
        // move_uploaded_file($_FILES['pic'.$i]['tmp_name'], "assets/suppdoc/".$pic);

         // create a variable and link with $_FILES global variable with name.

        $pic = mysqli_real_escape_string($conn, $_FILES['pic'.$i]['name']);

           move_uploaded_file($_FILES['pic'.$i]['tmp_name'], "assets/suppdoc/".$pic);

        // ==============================================================================

        $sql = "INSERT INTO tblsaveans (qqid, quess, cmnt, ans, pic) VALUES ('$qqid', '$quess', '$cmnt', '$ans', '$pic')";

        if (mysqli_query($conn, $sql)) {
            header("Location: questions-page.php");
            exit();
        } else {
            echo "Failed: " . mysqli_error($conn);
        }     
    }
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
       <!-- main wrapper -->
        <!-- ============================================================== -->
        <div class="dashboard-main-wrapper">
            <!-- ============================================================== -->
            <!-- navbar -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->

            <!-- end left sidebar -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- wrapper -->
            <!-- ============================================================== -->
            <div class="dashboard-wrapper">
                <div class="dashboard-ecommerce">
                    <div class="container-fluid dashboard-content ">
                        <!-- ============================================================== -->
                         <a href="add-gmp.php" class="btn btn-secondary mb-3">Back</a>
                            <a href="index.php" class="btn  btn-primary mb-3">Home</a>
                        <div class="ecommerce-widget">
                    <h1 class="p-3">Add Audit || Attempt Audit</h1>

                            <div class="row">
                                <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <!-- form -->
                                <form action="" method="post" enctype="multipart/form-data">
                                            <?php
                                            $sql = "SELECT * FROM `gmp_audit2`";
                                            $result = mysqli_query($conn, $sql);
                                            $i=0;
                                            while ($row = mysqli_fetch_assoc($result))
                                            {
                                                $i++;
                                                ?>
                                        <div class="row">
                                            <div class="form-group">
                                                <label for="quess<?php echo $i; ?>" class="form-label"><?php echo $i;?>, <?php echo $row['ques'] ?></label>
                                                <hr>

                                                <!-- Add a div to contain the radio buttons horizontally -->
                                                <div class="radio-buttons-horizontal ml-3 mb-3">
                                                    <label class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="r1<?php echo $i;?>" class="custom-control-input" value="a"><span class="custom-control-label">a</span>
                                                    </label>
                                                    
                                                    <label class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="r1<?php echo $i;?>" class="custom-control-input" value="b"><span class="custom-control-label">b</span>
                                                    </label>

                                                    <label class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="r1<?php echo $i;?>" class="custom-control-input" value="c"><span class="custom-control-label">c</span>
                                                    </label>

                                                    <label class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="r1<?php echo $i;?>" class="custom-control-input" value="d"><span class="custom-control-label">d</span>
                                                    </label>

                                                    <label class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" name="r1<?php echo $i;?>" class="custom-control-input" value="e"><span class="custom-control-label">e</span>
                                                    </label>
                                                </div>


                                                
                                                <input type="text" name="qqid[]" value="<?php echo $row['id'] ?>">
                                                <input type="text" name="ques[]" value="<?php echo $row['ques'] ?>">
                                              
                                                <input type="text" class="form-control" name="cmnt[]"  placeholder="Comment">
                                                <!-- ======================================================================================================= -->
                                                <br>
                                                
                                                <!-- <input type="hidden" name="qqid[]" value="<?php echo $qqid; ?>"> -->
                                                <input type="file" name="pic<?php echo $i;?>" accept=".pdf, .xls, .xlsx, .doc, .docx, .csv, image/*">
                                                <br>
                                                <br>
                                                <hr>
                                            </div>
                                        </div> <!-- Close the div for each set of form fields -->
                                    <?php
                                    }
                                    ?>

                                    <div class="my-5 d-flex justify-content-center ">
                                        <button type="submit" class="btn btn-success m-1" name="submit">Submit</button>
                                        <a href="index.php" class="btn btn-danger m-1">Cancel</a>
                                    </div>  
                             </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php include_once("assets/includesfiles/footer.php"); ?>
                </div>
            </div> <!-- Missing closing </div> tag for the outermost <div> -->
                
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
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

   
    </body>
</html>
