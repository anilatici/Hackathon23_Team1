<!-- signup.php -->
    <?php
        // define variables and set to empty values
        $nameErr = $emailErr = $passwordErr = $confirmPasswordErr = "";
        $name = $email = $password = $confirmPassword = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // collect form data and validate input
            if (empty($_POST["name"])) {
                $nameErr = "Name is required";
            } else {
                $name = test_input($_POST["name"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                    $nameErr = "Only letters and white space allowed";
                }
            }

            if (empty($_POST["email"])) {
                $emailErr = "Email is required";
            } else {
                $email = test_input($_POST["email"]);
                // check if email address is well-formed
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Invalid email format";
                }
            }

            if (empty($_POST["password"])) {
                $passwordErr = "Password is required";
            } else {
                $password = test_input($_POST["password"]);
                // password validation - at least 6 characters, 1 uppercase letter, 1 lowercase letter, 1 number, 1 special character
                if (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()])(?=.*[^\s]).{6,}$/",$password)) {
                    $passwordErr = "Invalid password format.";
                }
            }
            
            if ($passwordErr == "") {
                // password_hash
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            }
            
            

            if (empty($_POST["confirmPassword"])) {
                $confirmPasswordErr = "Please confirm your password";
            } else {
                $confirmPassword = test_input($_POST["confirmPassword"]);
                if ($confirmPassword != $_POST["password"]) {
                    $confirmPasswordErr = "Passwords do not match";
                }
            }

            // if no errors, connect to database and insert data
            if ($nameErr == "" && $emailErr == "" && $passwordErr == "" && $confirmPasswordErr == "") {
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "userdb";

                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashedPassword')";

                if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                $conn->close();
            }
        }

        // function to sanitize input data
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/icon.png" />
    <title>Sign Up</title>
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
      <h1>Sign Up</h1>
    </div>
    <div class="container">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="needs-validation" novalidate>
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" id="name" name="name" required>
    <div class="invalid-feedback">Please enter your name.</div>
  </div>
  <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" class="form-control" id="email" name="email" required>
    <div class="invalid-feedback">Please enter a valid email address.</div>
  </div>
  <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" class="form-control" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()]).{6,}" title="Password must be at least 6 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character (!@#$%^&*())" required>
    <div class="invalid-feedback">Password must be at least 6 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character (!@#$%^&*()).</div>
  </div>
  <div class="form-group">
    <label for="confirmPassword">Confirm Password:</label>
    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
    <div class="invalid-feedback">Please confirm your password.</div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
  </div>
    </section><br><br><br>
  </main><!-- /.container -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- footer file -->
	<?php include('footer.php'); ?>
  </body>
</html>

