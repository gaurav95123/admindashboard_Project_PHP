<?php

session_start();

if(!isset($_SESSION['username'])){

    header('location:login.php');

    exit();

}

$username=$_SESSION['username'];

?>

<?php
include "connect.php"; // Include your database connection code

if (isset($_POST["submit"])) {


    for ($i = 0; $i < count($_POST['qqid']); $i++) {
       
        $sno= $_POST['sno'];

        $qqid = $_POST['qqid'][$i];
        $quess = $_POST['ques'][$i];
        $ans = $_POST['r1' . $i];
        $date = $_POST['date' . $i];
        $texta =  $_POST['tarea' . $i];
        $cmnt =  $_POST['cmnt' . $i];

        // File Upload
        $pic = $_FILES['pic' . $i]['name'];

        move_uploaded_file($_FILES['pic'.$i]['tmp_name'], "assets/auditdoc/".$pic);

        $pic_tmp = $_FILES['pic' . $i]['tmp_name'];
        // $pic_destination = "assets/auditdoc/" . $pic;

          $sql = "INSERT INTO ans1 (qqid, quess, sno, ans, date, cmnt, pic, tarea)

                VALUES ('$qqid', '$quess', '$sno', '$ans', '$date', '$cmnt', '$pic', '$texta')";
        $result= mysqli_query($conn, $sql);
   if ($result) {
    // echo"<p style='color: green;'>Data added successfully</p>";
    //  echo "Data added successfully";
//    header("Location: add-gmp.php?msg=New record created successfully");
//    header("Location: questions-page.php?msg=thank you!");
   header("Location:audit-questions-page.php?msg=Thank you!");

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

   

    <title>Add Audit</title>

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
                    <?php
    if (isset($_GET["msg"])) {
      $msg = $_GET["msg"];
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      ' . $msg . '</div>';

    }
    ?>

                        <!-- ============================================================== -->

                         <a href="view-audit-details.php" class="btn btn-secondary mb-3">Back</a>

                            <a href="index.php" class="btn  btn-primary mb-3">Home</a>

                        <div class="ecommerce-widget">

                    <h1 class="p-3">Add Audit||Attempt Audit</h1>
                    <h5 class="p-1"> **All Questions Are Mandatory**</h5>

 

                            <div class="row">

                                <div class="col-xl-12 col-lg-6 col-md-12 col-sm-12 col-12">

                                    <div class="card">

                                        <div class="card-body">

                                            <!-- form -->

                                           
                                            <form action="" method="post" enctype="multipart/form-data" id="auditid">
                                              

                                                <?php
                                                error_reporting(0);
                                            
                                                $sno= $_GET['sno'];
                                                $sql = "SELECT * FROM `quest1`";

                                                $result = mysqli_query($conn, $sql);

                                                $i = 0;

                                                while ($row = mysqli_fetch_assoc($result)) {

                                                ?>
                                              
                                                <input type="hidden" value="<?php echo $sno; ?>" name='sno'>
                                              

                                                    <div class="row">

                                                        <div class="form-control">

                                                            <label for="ques<?php echo $i; ?>" name="ques<?php echo $i; ?>" class="form-label"><?php echo $row['ques'] ?></label>

                                                            <hr>

 

                                                            <!-- Radio buttons group -->

                                                                <div class="radio-buttons-horizontal ml-3 mb-3">

                                                                    <label class="custom-control custom-radio custom-control-inline">

                                                                        <input type="radio" name="r1<?php echo $i; ?>" class="custom-control-input" value="compliant" Required>

                                                                        <span class="custom-control-label">Compliant</span>

                                                                    </label>

    

                                                                    <label class="custom-control custom-radio custom-control-inline">

                                                                        <input type="radio" name="r1<?php echo $i; ?>" class="custom-control-input" value="major" Required>

                                                                        <span class="custom-control-label">Major</span>

                                                                    </label>

    

                                                                    <label class="custom-control custom-radio custom-control-inline">

                                                                        <input type="radio" name="r1<?php echo $i; ?>" class="custom-control-input" value="minor" Required>

                                                                        <span class="custom-control-label">Minor</span>

                                                                    </label>

    

                                                                    <label class="custom-control custom-radio custom-control-inline">

                                                                        <input type="radio" name="r1<?php echo $i; ?>" class="custom-control-input" value="not/applicable" Required>

                                                                        <span class="custom-control-label">Not/Applicable</span>

                                                                    </label>
    
<!-- 
                                                                    <label class="custom-control custom-radio custom-control-inline">

                                                                        <input type="radio" name="r1<?php echo $i; ?>" class="custom-control-input" value="e">

                                                                        <span class="custom-control-label">e</span>

                                                                    </label> -->

                                                                </div>

 

                                                            <!-- Hidden inputs for other data -->

                                                            <input type="hidden" name="qqid[]" value="<?php echo $row['id'] ?>">
                                                        
                                                            <input type="hidden" name="ques[]" value="<?php echo $row['ques'] ?>">

                                                            <br>

                                                            <!-- <input type="hidden" name="ques[]" value="<?php echo $row['ques'] ?>"> -->
                                                            
                                                            <br>
                                                            
                                                            <div class="">
                                                              <input type="text" class="form-control" id="cmntt" autocomplete="off" name="cmnt<?php echo $i; ?>" placeholder="Comment" Required>
                                                              <span id="cmnt-error" class="text-danger"></span>
                                                            </div>
                                                            <br>




                                                            <!-- <input type="text" class="form-control" name="cmnt<?php echo $i; ?>" placeholder="Comment"> -->
                                                            <!-- <input type="text" class="form-control" name="cmnt<?php echo $i; ?>" placeholder="Comment"> -->
                                                            <br>
                                                            <!-- <input type="date" class="form-control"  name="<?php echo $i; ?>" placeholder="date"> -->
                                                            <!-- <input type="date" class="form-control"   name="date<?php echo $i;?>" placeholder="date"> -->
                                                            <input type="date" class="form-control"   name="date<?php echo $i; ?>" placeholder="date" Required>


                                                            <br>

                                                            <div class="my-custom-class">
                                                                <textarea class="form-control" name="tarea<?php echo $i; ?>" autocomplete="off" placeholder="Action required" id="text1" Required></textarea>
                                                                <span id="text1-error" class="text-danger"></span>
                                                            </div>
                                                          
                                                            <br>
                                                            <input type="file" name="pic<?php echo $i; ?>" accept=".pdf, .xls, .xlsx, .doc, .docx, .csv, image/*">

                                                            <br>

                                                            <br>

                                                            <hr>

                                                        </div>

                                                    </div>

                                                    <?php
  $i++;
                                                    }

                                                    ?>

 

                                                    <div class="my-5 d-flex justify-content-center">

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

    <script>
    $(document).ready(function () {
        $("#auditid").submit(function (e) {
            // Clear previous error messages
            $(".text-primary").html(""); // Corrected the selector

            // Perform your custom validation here
            var cmntValue = $("#cmntt").val();
            if (cmntValue.trim() === "") {
                $("#cmnt-error").html("This field is required.");
                e.preventDefault(); // Prevent form submission
            }
        });
    });
</script>
    
    
    
  
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