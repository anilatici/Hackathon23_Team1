<?php 
require('database.php');
// Get program id from previous page
$program_name = $_GET['id'];

// Prepare and execute the query to retrieve the program with the given name
$query = "SELECT * FROM programs WHERE program_name = :program_name";
$statement = $db->prepare($query);
$statement->bindValue(':program_name', $program_name);
$statement->execute();

// Fetch the program from the result set
$program = $statement->fetch();

// Close the database connection
$statement->closeCursor();

$queryMissions = "SELECT * FROM missions WHERE program_name = :program_name";
$statement2 = $db->prepare($queryMissions);
$statement2->bindValue(':program_name', $program_name);
$statement2->execute();
$missions = $statement2->fetchAll();
$statement2->closeCursor();
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
    <title><?php echo $program['program_name']; ?></title>
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
            <img src="<?php echo $program['image']; ?>" class="img-fluid program-image" alt="<?php echo $program['program_name']; ?>">
          </div>
          <div class="col-md-6"> 
            <h2 class="program-title"><?php echo $program['program_name']; ?></h2>
            <p class="program-details"><strong>Program Launch Date:</strong> <?php echo $program['program_start_date']; ?></p>
            <p class="program-details"><strong>Program End Date:</strong> <?php echo $program['program_end_date']; ?></p>
            <p class="program-details"><strong>Program Status:</strong> <?php echo $program['program_status']; ?></p><br>
            <table class="table">
            <thead>
                <tr>
                    <th><h2 class="mission-title">Missions:</h2></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($missions as $mission) : ?>
                <tr>
                    <td><a href="mission.php?id=<?php echo $mission['mission_id']; ?>"><?php echo $mission['mission_name']; ?></a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
          </div>
        </div>
      </div>
    </div><br><br><br>
  </main>
  <?php include('footer.php'); ?>
</body>
</html>