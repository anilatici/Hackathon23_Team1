<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'database.php';
session_start();

$loggedin = false;
if(isset($_SESSION["id"])){
    $id = $_SESSION["id"];
    $sql = "SELECT * FROM questionGroups  where questionGroups.user_id = ?";
    $loggedin = true;
} else {
    $sql = "SELECT * FROM questionGroups where questionGroups.id = 1";
}
$stmt = $conn->prepare($sql);
if($loggedin){
    $stmt->bindParam(1, $id);
}
$stmt->execute();
$questions = $stmt->fetchAll();
$stmt->closeCursor();

foreach($questions as $key => $question) {
    $sql = "SELECT * FROM questions where questions.question_group = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $question["id"]);
    $stmt->execute();
    $questions[$key]["question"] = $stmt->fetchAll();
    $stmt->closeCursor();
    foreach($questions[$key]["question"] as $key2 => $question2) {
        $sql = "SELECT * FROM answers where answers.question_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $question2["id"]);
        $stmt->execute();
        $questions[$key]["question"][$key2]["answer"] = $stmt->fetchAll();
        $stmt->closeCursor();
    }
}

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
    foreach ($questions as $question) : ?>

      <div class="col-md-4">
        <div class="card mb-4">
          <div class="card-body">
            <h5 class="card-title"><?php echo $question["title"]; ?></h5>
            <button class="btn btn-primary">More Details</button>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>



<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal body -->
      <div class="modal-body">
        <!-- Content to display in the modal -->
      </div>
    </div>
  </div>
</div>


  </div>

    </section><br><br><br>
  </main><!-- /.container -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script>
  document.addEventListener('DOMContentLoaded', function() {
    // Get all "More Details" buttons
    var buttons = document.querySelectorAll('.btn-primary');
    // Add a click event listener to each button
    buttons.forEach(function(button) {
      button.addEventListener('click', function(event) {
        // Prevent the default behavior of the button
        event.preventDefault();
        // Get the ID of the question
        var questionId = this.getAttribute('href').split('=')[1];
        // Make an AJAX request to get the details of the question
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
          if (this.readyState === 4 && this.status === 200) {
            // Set the content of the modal to the details of the question
            document.querySelector('#myModal .modal-body').innerHTML = this.responseText;
            // Show the modal
            document.querySelector('#myModal').classList.add('show');
          }
        };
        xhr.open('GET', 'getQuestionDetails.php?id=' + questionId, true);
        xhr.send();
      });
    });
  });
</script>
    <!-- footer file -->
	<?php include('footer.php'); ?>
  </body>
</html>
