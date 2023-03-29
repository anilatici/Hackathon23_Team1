<?php
require_once('database.php');

// Get Missions
$queryMissions = 'SELECT * FROM missions';
$statement = $db->prepare($queryMissions);
$statement->execute();
$missions = $statement->fetchAll();
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
    <title>Matt's NASA Database</title>
    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="mystyle.css?v=1" rel="stylesheet">
  </head>
  <body>
    <!-- nav bar file -->
	<?php include('nav.php'); ?>

  <main class="container my-5">
    <div class="starter-template text-center">
      <h1>Welcome to Matt's NASA Database</h1>
      <p class="lead">This database contains information about NASA missions, astronauts, and rockets.</p>
      <p>Please select a category from the navigation bar or click a mission below to get started.</p>
      <h3>NASA Missions</h3>
    </div>
    <div class="container">
  <div class="row">
    <?php foreach ($missions as $mission) : ?>
      <div class="col-md-4">
        <div class="card mb-4">
          <img class="card-img-top" src="<?php echo $mission['image']; ?>" alt="<?php echo $mission['mission_name']; ?>" height = "250px" width = "200px">
          <div class="card-body">
            <h5 class="card-title"><?php echo $mission['mission_name']; ?></h5>
            <a href="mission.php?id=<?php echo $mission['mission_id']; ?>" class="btn btn-primary">More Details</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
  </div>
    </section><br><br><br>
  </main><!-- /.container -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- footer file -->
	<?php include('footer.php'); ?>
  </body>
</html>
