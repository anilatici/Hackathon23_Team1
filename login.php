<?php

// Step 1: Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Step 2: Create the login form
echo "<form action='login.php' method='post'>
      Email: <input type='text' name='email'><br>
      Password: <input type='password' name='password'><br>
      <input type='submit' value='Login'>
      </form>";

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
