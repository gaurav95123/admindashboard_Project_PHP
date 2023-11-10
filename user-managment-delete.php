<?php
include "connect.php";

$id = $_GET["id"];
$sql = "DELETE FROM `user_management` WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
    // Display a success message and redirect to the management page after 3 seconds
    // $msg = "Data deleted successfully.";
    echo '<script>
    
        window.location.href = "user-managment.php";
    </script>';
} else {
    // Display an error message if the delete operation fails
    echo "Failed: " . mysqli_error($conn);
}
?>

