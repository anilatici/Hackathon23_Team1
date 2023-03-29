<html>
<head>
	<title>Contact us</title>
<!-- define some style elements-->
<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="mystyle.css?v=1" rel="stylesheet">
    <link rel="icon" href="images/favicon.png" />		
</head>
<body>
<!-- nav bar file -->
	<?php include('nav.php'); ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1 class="text-center mb-4">Contact us</h1>
                <form method="POST" name="contactform" action="contact-form-handler.php">
                    <div class="form-group">
                        <label for='name'>Your Name:</label><span class="required" id="name_required"></span>
                        <input type="text" name="name" required class="form-control">
                    </div><br>
                    <div class="form-group">
                        <label for='email'>Email Address:</label><span class="required" id="email_required"></span>
                        <input type="email" name="email" required class="form-control">
                    </div><br>
                    <div class="form-group">
                        <label for='message'>Message:</label><span class="required" id="message_required"></span>
                        <textarea name="message" required class="form-control"></textarea>
                    </div><br>
                    <div class="form-group">
                        <label for='phone'>Phone:</label><span class="required" id="phone_required"></span>
                        <input type="tel" name="phone" required pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="123-456-7890" class="form-control">
                        <small>Format: 123-456-7890</small>
                    </div><br>
                    <div class="form-group">
                        <label for='subject'>Subject:</label><span class="required" id="subject_required"></span>
                        <input type="text" name="subject" required class="form-control">
                    </div><br>
                    <div class="form-group">
                        <label for='category'>Category:</label><span class="required" id="category_required"></span>
                        <select name="category" required class="form-control">
                            <option value="" selected disabled>Please select a category</option>
                            <option value="General Inquiry">General Inquiry</option>
                            <option value="Product Support">Product Support</option>
                            <option value="Sales">Sales</option>
                        </select>
                    </div><br>
                    <div class="form-check">
                        <input type="checkbox" name="newsletter" value="yes" class="form-check-input">
                        <label for='newsletter' class="form-check-label">Subscribe to Newsletter</label>
                    </div><br>
                    <div class="form-group">
                        <label for='company'>Company:</label><span class="required" id="company_required"></span>
                        <input type="text" name="company" required class="form-control">
                    </div><br>
                    <div class="form-group">
                        <label for='department'>Department:</label><span class="required" id="department_required"></span>
                        <input type="text" name="department" required class="form-control">
                    </div><br>
                    <div class="form-group">
                        <label for='country'>Country:</label><span class="required" id="country_required"></span>
                        <input type="text" name="country" required class="form-control">
                    </div><br>
                    <div class="form-group">
                        <label for='city'>City:</label><span class="required" id="city_required"></span>
                        <input type="text" name="city" required class="form-control">
                    </div><br>
                    <input type="submit" value="Submit" class="btn btn-primary btn-block" onclick="return validateForm()"><br><br><br>
    </form>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="validation.js"></script>
<!-- footer file -->
<?php include('footer.php'); ?>
</body>
</html>