<?php

$errors = '';
$myemail = 'd00251844@student.dkit.ie'; // <-----Put your DkIT email address here.

if (empty($_POST['name']) ||
    empty($_POST['email']) ||
    empty($_POST['phone']) ||
    empty($_POST['terms']) ||
    empty($_POST['birthdate']) ||
    empty($_POST['gender']) ||
    empty($_POST['country']) ||
    empty($_POST['datetime']) ||
    empty($_FILES['file']['name']) ||
    empty($_POST['message'])
) {
    $errors .= "\n Error: all fields are required";
}

$headers = '';
// Important: Create email headers to avoid spam folder
$headers .= 'From: ' . $myemail . "\r\n" .
    'Reply-To: ' . $myemail . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

$Name = htmlspecialchars($_POST['name']);
$Email_address = htmlspecialchars($_POST['email']);
$Phone = htmlspecialchars($_POST['phone']);
$Message = htmlspecialchars($_POST['message']);
$Terms = htmlspecialchars($_POST['terms']);
$Birthdate = htmlspecialchars($_POST['birthdate']);
$Gender = htmlspecialchars($_POST['gender']);
$Country = htmlspecialchars($_POST['country']);
$Datetime = htmlspecialchars($_POST['datetime']);


if ($_FILES["file"]["error"] == UPLOAD_ERR_OK) {

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

$allowed_file_types = array('pdf', 'doc', 'docx');

// Check file extension
if (!in_array($imageFileType, $allowed_file_types)) {
    $errors .= "\n Error: Sorry, only PDF, DOC, and DOCX files are allowed.";
    $uploadOk = 0;
}



// Check if file already exists
if (file_exists($target_file)) {
    $errors .= "\n Error: Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["file"]["size"] > 5000000) {
    $errors .= "\n Error: Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "doc" && $imageFileType != "docx") {
    $errors .= "\n Error: Sorry, only PDF, DOC, and DOCX files are allowedxxxxxxxxxxx.";
    $uploadOk = 0;

} else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        $File = $target_file;
    } else {
        $errors .= "\n Error: Sorry, there was an error uploading your file.";
    }
}

if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
    $File = $target_file;
} else {
    $errors .= "\n Error: Sorry, there was an error uploading your file.";
    $File = '';
}

if (!preg_match(
    "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
    $Email_address
)) {
    $errors .= "\n Error: Invalid email address";
}

if (empty($errors)) {
    $to = $myemail;
    $email_subject = "Contact form submission: $Name";
    $email_body = "You have received a new message. " .

        " Here are the details:\n  
        Name: $Name \n         
        Email: $Email_address \n 
        Birthdate: $Birthdate \n 
        Phone: $Phone \n 
        Terms: $Terms \n 
        Gender: $Gender \n 
        Country: $Country \n 
        Datetime: $Datetime


\n
Message: $Message \n
Attached File: $File \n";
    $headers .= "MIME-Version: 1.0\r\n";

    $headers .= "Content-Type: multipart/mixed; boundary=\"boundary1\"\r\n";



    $message = "--boundary1\r\n";
    $message .= "Content-Type: text/plain; charset=\"iso-8859-1\"\r\n";
    $message .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
    $message .= $email_body . "\r\n\r\n";

    if ($uploadOk == 1) {
        $file_size = filesize($target_file);
        $handle = fopen($target_file, "r");
        $content = fread($handle, $file_size);
        fclose($handle);
        $content = chunk_split(base64_encode($content));
        $message .= "--boundary1\r\n";
        $message .= "Content-Type: application/octet-stream; name=\"" . basename($target_file) . "\"\r\n";
        $message .= "Content-Transfer-Encoding: base64\r\n";
        $message .= "Content-Disposition: attachment; filename=\"" . basename($target_file) . "\"\r\n\r\n";
        $message .= $content . "\r\n\r\n";
    }

    $sent = mail($to, $email_subject, $message, $headers);
    if ($sent) {
        echo "success";
    } else {
        echo "Error: Message not sent";
    }

} else {
    echo $errors;
}

if ($sent) {
    header('Location: thank-you.php');
    exit;
} else {
    echo "Error: Message not sent";





}}
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












