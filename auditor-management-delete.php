<?php
include "connect.php"; // Include the database connection code

$id = $_GET["id"]; // Get the 'id' parameter from the URL
$sql = "DELETE FROM `auditor_management` WHERE id = $id"; // Construct the SQL query
$result = mysqli_query($conn, $sql); // Execute the SQL query

if ($result) {
    // Display a success message and redirect to the management page after 3 seconds
    // $msg = "Data deleted successfully.";
    echo '<script>
    
        window.location.href = "auditor-management.php";
    </script>';
} else {
    // Display an error message if the delete operation fails
    echo "Failed: " . mysqli_error($conn);
}
?>
