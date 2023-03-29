<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'database.php';
session_start();

if(isset($_SESSION["id"])){
    $id = $_SESSION["id"];
    $sql = "SELECT * FROM questionGroups inner join questions on questionGroups.id = questions.question_id where questionGroups.user_id = ?";
    $loggedin = true;
} else {
    $sql = "SELECT * FROM questionGroups inner join questions on questionGroups.id = questions.question_id where questionGroups.id = 1";
}
$stmt = $conn->prepare($sql);
if($loggedin){
    $stmt->bindParam(1, $id);
}
$stmt->execute();
$questions = $stmt->fetchAll();
$stmt->closeCursor();


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/icon.png" />
    <title>EnQUIZment</title>
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
      <h1>Welcome to EnQuizment</h1>
      <h3>EnQUIZment</h3>
    </div>
    <div class="container">
  <div class="row">
    <?php
    var_dump($_SESSION);
    foreach ($questions as $question) : ?>
      <div class="col-md-4">
        <div class="card mb-4">
          <div class="card-body">
            <h5 class="card-title"><?php echo $question["title"]; ?></h5>
            <a href="viewQuestion.php?id=<?php echo $question['id']; ?>" class="btn btn-primary">More Details</a>
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
