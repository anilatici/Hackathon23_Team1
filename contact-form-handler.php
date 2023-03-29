<?php

$errors = '';
$myemail = 'd00245674@student.dkit.ie';// <-----Put your DkIT email address here.
if(empty($_POST['name'])  ||
   empty($_POST['email']) ||
   empty($_POST['message']) ||
   empty($_POST['phone']) ||
   empty($_POST['subject']) ||
   empty($_POST['category']) ||
   empty($_POST['company']) ||
   empty($_POST['department']) ||
   empty($_POST['country']) ||
   empty($_POST['city']))
{
    $errors .= "\n Error: all fields are required";
}

// Important: Create email headers to avoid spam folder
$headers = 'From: '.$myemail."\r\n".
    'Reply-To: '.$myemail."\r\n" .
    'X-Mailer: PHP/' . phpversion();


$name = $_POST['name'];
$email_address = $_POST['email'];
$message = $_POST['message'];
$phone = $_POST['phone'];
$subject = $_POST['subject'];
$category = $_POST['category'];
$newsletter = $_POST['newsletter'];
$company = $_POST['company'];
$department = $_POST['department'];
$country = $_POST['country'];
$city = $_POST['city'];

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if (!preg_match(
    "/^\d{3}-?\d{3}-?\d{4}$/",
    $phone))
    {
        $errors .= "\n Error: Invalid phone number";
    }


if( empty($errors))
{
        $to = $myemail;
        $email_subject = "Contact form submission: $name";
        $email_body = "You have received a new message. ".
        " Here are the details:\n Name: $name \n ".
        "Email: $email_address \n Phone: $phone \n ".
        "Subject: $subject \n Company: $company \n ".
        "Department: $department \n Country: $country \n ".
        "City: $city \n Message: \n $message";

        mail($to,$email_subject,$email_body,$headers);
        //redirect to the 'thank you' page
        header('Location: contact-form-thank-you.php');
}
?>
<!DOCTYPE HTML>
<html>
<head>
        <title>Contact form handler</title>
		<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="mystyle.css" rel="stylesheet">
</head>

<body>
<!-- This page is displayed only if there is some error -->
<?php
echo nl2br($errors);
?>
</body>
</html>