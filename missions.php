<?php
require_once('database.php');

// Get Missions
$queryMissions = 'SELECT * FROM missions';
$statement = $db->prepare($queryMissions);
$statement->execute();
$missions = $statement->fetchAll();
$statement->closeCursor();

// Get Programs
$queryPrograms = 'SELECT * FROM programs';
$statement = $db->prepare($queryPrograms);
$statement->execute();
$programs = $statement->fetchAll();
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
    <title>NASA Missions</title>
    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="mystyle.css?v=1" rel="stylesheet">
  </head>
  <body>
    <!-- nav bar file -->
	<?php include('nav.php'); ?>

  <main class="container">
  <div class="starter-template text-center">
    <h1>Matt's NASA Database</h1>
    <p class="lead">The table contains a list of space missions with details such as mission name, program name, type, and status.</p>
    <h1>Missions List</h1>
    <section>
        <!-- display a table of NASA Missions -->
        <table class="table">
            <thead>
                <tr>
                    <th>Mission Program</th>
                    <th>Mission Name</th>
                    <th>Mission Type</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($missions as $mission) : ?>
                <tr>
                    <td><a href="program.php?id=<?php echo $mission['program_name']; ?>"><?php echo $mission['program_name']; ?></a></td>
                    <td><a href="mission.php?id=<?php echo $mission['mission_id']; ?>"><?php echo $mission['mission_name']; ?></a></td>
                    <td><?php echo $mission['mission_type']; ?></td>
                    <td>
                        <form action="delete_mission.php" method="post">
                            <input type="hidden" name="mission_id"
                                value="<?php echo $mission['mission_id']; ?>">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section><br><br><br>
  </div>
</main><!-- /.container -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- footer file -->
	<?php include('footer.php'); ?>
  </body>
</html>
