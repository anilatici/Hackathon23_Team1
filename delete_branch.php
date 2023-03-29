<?php
require_once('database.php');

// Get branch ID
$branch_id = filter_input(INPUT_POST, 'branch_id', FILTER_VALIDATE_INT);
if (!$branch_id) {
    // Handle invalid branch ID input
    echo "Invalid branch ID input!";
    exit();
}

// Delete the branch from the database
$query = 'DELETE FROM Branch WHERE Branch_Id = :branch_id';
$statement = $db->prepare($query);
$statement->bindValue(':branch_id', $branch_id);
$success = $statement->execute();
$statement->closeCursor();

if (!$success) {
    // Handle database deletion error
    echo "Error deleting branch from database!";
    exit();
}

// Display the Product List page
include('page-1.php');

exit();
?>

