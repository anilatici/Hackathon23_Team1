<?php 
    require_once('database.php');
    // Get mission id from previous page
    $mission_id = $_GET['id'];

    // Prepare and execute the query to retrieve the mission with the given ID
    $query = "SELECT * FROM missions WHERE mission_id = :mission_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':mission_id', $mission_id);
    $statement->execute();

    // Fetch the mission from the result set
    $mission = $statement->fetch();

    // Close the database connection
    $statement->closeCursor();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <link rel="icon" href="images/favicon.png" />
    <title><?php echo $mission['mission_name']; ?></title>
    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="mystyle.css?v=1" rel="stylesheet">
  </head>
  <body>
  <?php include('nav.php'); ?>
  <main class="container">
    <div class="starter-template text-center">
      <div class="container mt-5">
        <div class="row">
          <div class="col-md-6">
            <img src="<?php echo $mission['image']; ?>" class="img-fluid mission-image" alt="<?php echo $mission['mission_name']; ?>">
          </div>
          <div class="col-md-6">
            <h2 class="mission-title"><?php echo $mission['mission_name']; ?></h2>
            <p class="mission-details"><strong><?php echo $mission['program_name']; ?></strong></p>
            <p class="mission-details"><strong>Mission Type:</strong> <?php echo $mission['mission_type']; ?></p>
            <p class="mission-details"><strong>Mission Crew:</strong> <?php echo $mission['mission_crew']; ?></p>
            <p class="mission-details"><strong>Mission Status:</strong> <?php echo $mission['mission_status']; ?></p>
            <p class="mission-description"><?php echo $mission['description']; ?></p>
          </div>
        </div>
      </div>
    </div><br><br><br>
  </main>
  <?php include('footer.php'); ?>
</body>
</html>