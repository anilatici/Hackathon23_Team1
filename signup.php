<!-- signup.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
</head>
<body>
    <h2>Sign Up</h2>

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

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Name: <input type="text" name="name">
        <span class="error">* <?php echo $nameErr;?></span>
        <br><br>
        E-mail: <input type="text" name="email">
        <span class="error">* <?php echo $emailErr;?></span>
        <br><br>
        Password: <input type="password" name="password">
        <br>Password must be at least 6 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character (!@#$%^&*())
        <span class="error">* <?php echo $passwordErr;?></span>
        <br><br>
        Confirm Password: <input type="password" name="confirmPassword">
        <span class="error">* <?php echo $confirmPasswordErr;?></span>
        <br><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>

