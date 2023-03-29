<?php
require_once('database.php');

// Get IDs
$mission_id = filter_input(INPUT_POST, 'mission_id', FILTER_VALIDATE_INT);

// Delete the Missions from the database
if ($mission_id != false) {
    $query = 'DELETE FROM missions
              WHERE mission_id = :mission_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':mission_id', $mission_id);
    $success = $statement->execute();
    $statement->closeCursor();    
}

// Display the Missions List page
include('index.php');