<?php
require_once('database.php');

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
    <title>NASA Programs Table</title>
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
    <p class="lead">The table contains a list of space programs with details such as program name, program launch date, status, and end date.</p>
    <h1>Programs List</h1>
    <section>
        <!-- display a table of NASA programs -->
        <table class="table">
            <thead>
                <tr>
                    <th>Program Name</th>
                    <th>Program Launch Date</th>
                    <th>Program End Date</th>
                    <th>Program Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($programs as $program) : ?>
                <tr>
                  <td><a href="program.php?id=<?php echo $program['program_name']; ?>"><?php echo $program['program_name']; ?></a></td>
                  <td><?php echo $program['program_start_date']; ?></td>
                  <td><?php echo $program['program_end_date']; ?></td>
                  <td><?php echo $program['program_status']; ?></td>
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
