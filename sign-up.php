<?php
require_once('sign-up-handler.php');
?>

<?php include 'includes/header.php';?>

<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel = "stylesheet" href = "https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity = "sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin = "anonymous">
    <link rel = "stylesheet" href = "css/styles.css">
</head>
<body>
    <main class = "container">
        <div class = "starter-template text-center">
            <h1 style = "margin-top: 20px;">Sign Up</h1>
            <p class = "lead" style = "margin-bottom: 20px;">You can sign up here.</p>
        </div>
        <form action="" method="post">
            <section class = "sign-up-form">
                <div class = "row row-cols-1 row-cols-md-3 g-4">
                    <div class = "col">
                        <div class = "card h-100">
                            <div class = "card-body">
                                <form action = "sign-up.php" method = "post">
                                    <div class = "form-group">
                                        <label for="name">Name:</label>
                                        <input type="text" name="name" id="name" value="<?php echo $name; ?>">
                                        <?php echo $name_err; ?>
                                    </div>
                                    <div class = "form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" name="email" id="email" value="<?php echo $email; ?>">
                                        <?php echo $email_err; ?>
                                        <small id = "emailHelp" class = "form-text text-muted">We'll never share your email with anyone else.</small>
                                    </div>
                                    <div class = "form-group">
                                        <label for="password">Password:</label>
                                        <input type="password" name="password" id="password">
                                        <?php echo $password_err; ?>
                                    </div>
                                    <div class = "form-group">
                                        <label for="confirm_password">Confirm Password:</label>
                                        <input type="password" name="confirm_password" id="confirm_password">
                                        <?php echo $confirm_password_err; ?>
                                    </div>
                                    <button type = "submit" class = "btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </form>
</body>       