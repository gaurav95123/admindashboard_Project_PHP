 <?php
include "connect.php";
// session_start(); // Start the session
// Assuming you have a session variable for the logged-in username
$loggedInUsername = $_SESSION['username']; 
// Adjust this according to your session variable
// Initialize a variable for user data

$userName = "Guest";

// Modify the SQL query to select user data from both tables using a UNION
// ======================================================================================

$sql = "SELECT name FROM `crud_table` WHERE username = '$loggedInUsername'
        UNION ALL
        SELECT auditee_name AS name FROM `auditee_t` WHERE auditee = '$loggedInUsername'";
// $sql="select name from `crud_table` where username ='$loggedInUsername'
// UNION ALL 
// SELECT auditee_name as name 
// =========================================================================================================
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // Check if there is at least one result
    while ($row = mysqli_fetch_assoc($result)) {
        // Loop through all results and set $userName
        $userName = $row['name'];
        // $userName = $row['username'];
    }

} else {
    $userName = "Guest";
    // Handle the case where the username is not found in either table
    // $userName already contains the default value "Guest"
}

// Now, $userName contains the user's name, whether they are in "crud_table" or "auditee_t".
?>


<!-- <?php
include "connect.php";
// session_start(); // Start the session
// Assuming you have a session variable for the logged-in username
$loggedInUsername = $_SESSION['username']; // Adjust this according to your session variable
// Initialize a variable for user data

$userName = "Guest";

// $userNAme="guest2";

// Modify the SQL query to select user data from both tables using a UNION

// $sql="SELECT name FROM `crud_table` where username='$loggedInUsername'
// UNION
//     SELECT auditee_name FROM `auditee_t` WHERE auditee

// "

// query


// $sql = "SELECT name FROM `crud_table` WHERE username = '$loggedInUsername'
//         UNION
//         SELECT auditee_name AS name FROM `auditee_t` WHERE auditee = '$loggedInUsername'";


// $sql = "SELECT name FROM `crud_table` WHERE username = '$loggedInUsername'
//         UNION
//         SELECT auditee_name AS name FROM `auditee_t` WHERE auditee = '$loggedInUsername'";
        
        
//  $sql= "select name form `crud_table` where username = '$loggendInUsername'
//  union 
//  select auditee_name `crud_table` where username='$loggendInUsername'";

// $sql = "SELECT name FROM `crud_table` WHERE username = '$loggedInUsername'
//         UNION
//         SELECT auditee_name AS name FROM `auditee_t` WHERE auditee = '$loggedInUsername'";

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $userName = $row['name']; 
} else {
    // Handle the case where the username is not found in either table
    // $userName already contains the default value "Guest"
}

// Now, $userName contains the user's name, whether they are in "crud_table" or "auditee_t".
?> -->

<!-- ============================================= -->

<!-- single table record -->

<?php
include "connect.php";
$loggedInUsername = $_SESSION['username'];
$sql="SELECT name FROM `crud_table` WHERE username='$loggedInUsername'
UNION ALL 
SELECT auditee_name as  name FROM  `auditee_t` = '$loggedInUsername'";



//  <?php
// include "connect.php";
// // Assuming you have a session variable for the logged-in username
// $loggedInUsername = $_SESSION['username']; // Adjust this according to your session variable
// // Modify the SQL query to select the user's data based on their username
// $sql = "SELECT * FROM `crud_table` WHERE username = '$loggedInUsername'";

// $result = mysqli_query($conn, $sql);

// if ($row = mysqli_fetch_assoc($result)) {
//     $userName = $row['name'];
// } else {
//     // Handle the case where the username is not found in the database
//     $userName = "Guest"; // Default name if the user is not found
// }
// ?>  


<!-- ============================================= -->
<div class="dashboard-header">
    <nav class="navbar navbar-expand-lg bg-white fixed-top">
        <!-- <a class="navbar-brand" href="index.php">Admin Dashboard</a> -->
        <a class="nav-link nav-user-img" href="index.php" id="navbarDropdownMenuLink2" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false"><img src="assets/images/rtntss.png" alt=""></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto navbar-right-top">
                <!-- <li class="nav-item">
                    <div id="custom-search" class="top-search-bar">
                        <input class="form-control" type="text" placeholder="Search..">
                    </div>
                </li> -->

                <li class="nav-item dropdown nav-user">
                    <!-- <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/user.png" alt="" class="user-avatar-md rounded-circle">Welcome <br><span class="mt-1 small text-muted"><?php echo $row['name'];?></br></span></a> -->
                   
                    <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"><img src="assets/images/user1.png" style="eh" alt=""
                            class="user-avatar-md rounded-circle"><i>Welcome</i><span class="mt-1 small text-muted">
                           </i><?php echo $userName; ?>
                        </span>
                    </a>

                    <!-- <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">test</a> -->

                    <div class="dropdown-menu dropdown-menu-right nav-user-dropdown"
                        aria-labelledby="navbarDropdownMenuLink2"> 
                        <!-- <div class="nav-user-info">
                            <h5 class="mb-0 text-white nav-user-name">status</h5>
                            <span class="status"></span><span class="ml-2">Profile</span>
                        </div> -->
                        <!-- <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Account</a> -->
                        <!-- <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Setting</a> -->
                        <a class="dropdown-item" href="logout.php"><i class="fas fa-power-off mr-2"></i>Logout</a>

                    </div>
                </li>
            </ul>
        </div>
        <br>

    </nav>
</div>
<?php
      // Increment the sequential ID for the next row
   