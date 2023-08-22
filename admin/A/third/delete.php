
<?php
require_once '../../database/dbcon.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the record from the database
    $delete_query = mysqli_query($con, "DELETE FROM a WHERE id = '$id'");

    if ($delete_query) {
        // Redirect to your listing page or display a success message
        header('Location: third.php'); 
        exit();
    } else {
        
        header('Location: third.php?error=delete_failed');
        exit();
    }
} else {
    header('Location: third.php?error=no_id');
    exit();
}
?>
