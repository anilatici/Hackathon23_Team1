
<?php

$errors = '';
$myemail = 'd00251844@student.dkit.ie';// <-----Put your DkIT email address here.
if(empty($_POST['name'])  ||
    empty($_POST['email']) ||
    empty($_POST['phone']) ||
    empty($_POST['terms']) ||
    empty($_POST['birthdate']) ||
    empty($_POST['gender']) ||
    empty($_POST['country']) ||
    empty($_POST['datetime']) ||
    empty($_POST['file']) ||
    empty($_POST['message']))
{
    $errors .= "\n Error: all fields are required";
}

$headers = '';
// Important: Create email headers to avoid spam folder
$headers .= 'From: '.$myemail."\r\n".
    'Reply-To: '.$myemail."\r\n" .
    'X-Mailer: PHP/' . phpversion();

$name = $_POST['name'];
$email_address = $_POST['email'];
$phone = $_POST['phone'];
$terms = $_POST['terms'];
$birthdate = $_POST['birthdate'];
$gender = $_POST['gender'];
$country = $_POST['country'];
$datetime = $_POST['datetime'];
$file = $_POST['file'];
$message = $_POST['message'];

if (!preg_match(
    "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
    $email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if (empty($name)) {
    $errors .= 'Please enter your NAME<br>';
}


if( empty($errors)) {
    $to = $myemail;
    $email_subject = "Contact form submission: $name";
    $email_body = "You have received a new message. " .

        " Here are the details:\n  
        Name: $name \n         
        Email: $email_address \n 
        Birthdate: $birthdate \n 
        Phone: $phone \n 
        Terms: $terms \n 
        Gender: $gender \n 
        Country: $country \n 
        Datetime: $datetime \n 
        File: $file \n
        Message: \n $message";

    mail($to, $email_subject, $email_body, $headers);





// Insert data into table
// Change the database credentials according to your setup
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "restaurant";

// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

// Prepare and bind the parameters
    $stmt = $conn->prepare("INSERT INTO messages (name, email, phone, terms, 
                      birthdate, gender, country, datetime, file, message) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssss", $name, $email_address, $phone, $terms, $birthdate, $gender, $country, $datetime, $file, $message);

// Execute the query
    if ($stmt->execute() === TRUE) {
        // Redirect to the 'thank you' page
        header('Location: thank-you.php');
    } else {
        // Display an error message


        //redirect to the 'thank you' page
        header('Location: thank-you.php');
        echo "Error: " . $stmt->error;

        $stmt->close();
        $conn->close();

        exit();
    }







}


?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Contact form handler</title>
</head>

<body>
<!-- This page is displayed only if there is some error -->
<?php
echo nl2br($errors);
?>
</body>
</html>




















