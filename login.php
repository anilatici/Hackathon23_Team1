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

<?php

// Step 1: Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "QuizzApp";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Step 2: Create the login form
echo "
  <form class='form-signin' action='login.php' method='post'>
    <h1 class='h3 mb-3 font-weight-normal'>Login</h1>
    <label for='inputEmail' class='sr-only'>Email address</label>
    <input type='email' name='email' id='inputEmail' class='form-control' placeholder='Email address' required autofocus>
    <label for='inputPassword' class='sr-only'>Password</label>
    <input type='password' name='password' id='inputPassword' class='form-control' placeholder='Password' required>
    <button class='btn btn-lg btn-primary btn-block' type='submit'>Sign in</button>
  </form>
";

// Step 3: Validate input
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST["email"];
  $password = $_POST["password"];

  if (empty($email) || empty($password)) {
    echo "Please enter both email and password.";
    exit;
  }

  // Step 4: Query the database
  $sql = "SELECT * FROM users WHERE email='$email'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Step 5: Check the password
    if (password_verify($password, $row['password'])) {

      // Step 6: Start the session
      session_start();
      $_SESSION["name"] = $row["name"];
      $_SESSION["email"] = $row["email"];

      // Step 7: Redirect to the homepage
      header("Location: index.php");
      exit;
    } else {
      echo "Invalid password.";
      exit;
    }

  } else {
    echo "Invalid email.";
    exit;
  }
}

$conn->close();

?>

</div>

    </section><br><br><br>
  </main><!-- /.container -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- footer file -->
	<?php include('footer.php'); ?>
  </body>
</html>

