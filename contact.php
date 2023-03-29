<?php include 'includes/header.php'; ?>

<meta name="keywords" content="example, JavaScript Form Validation" />
<meta name="description" content="This document is an example of JavaScript Form Validation." />
<script src="Validations.js" ></script>

<body >


    <main class="containerForm" STYLE="height: 1200px"  style="margin-bottom: 0px">



        <div class="contactUs">

            <div class = "title">
                <h1>CONTACT US</h1>
            </div>



            <div class="box">


                <div class="contact form">

                    <h3>Send a Message</h3>

                    <form onsubmit="return  validateForm(); " method="POST" name="contactform" id="contactform" action="contact-form-handler.php">
                        <div class="formBox">


                            <div class="row50">
                                <div class="inputBox">
                                    <label for='name'>Your Name:</label>
                                    <input type="text" name="name" placeholder="Name" required>
                                </div>
                                <div class="inputBox">
                                    <label for="birthdate">Birthdate:</label>
                                    <input type="date" id="birthdate" name="birthdate" placeholder="Birthdate" required>
                                </div>
                            </div>

                            <div class="row50">
                                <div class="inputBox">
                                    <label for="gender">Gender:</label>
                                    <select id="gender" name="gender" required>
                                        <option value="">-- Select Gender--</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div class="inputBox">
                                    <label  for='email'>Email Address:</label>
                                    <input type="text" name="email" required>
                                </div>
                            </div>

                            <div class="row50">
                                <div class="inputBox">
                                    <label for="phone">Enter a phone number:</label>
                                    <input type="tel" name="phone"
                                           required>
                                </div>
                                <div class="inputBox">
                                    <label for="country">Country:</label>
                                    <input type="text" id="country" name="country" required list="country-list">
                                    <datalist id="country-list">
                                        <option value="Ireland">
                                        <option value="Canada">
                                        <option value="Mexico">
                                        <option value="Japan">
                                        <option value="China">
                                        <option value="Denmark">
                                        <option value="Norway">
                                        <option value="Iceland">
                                        <option value="Peru">
                                        <option value="Guatemala">
                                        <option value="China">
                                        <option value="Brazil" required>
                                    </datalist>
                                </div>
                            </div>

                            <div class="row50">
                                <div class="inputBox">
                                    <label for="terms">Agree to terms and conditions:</label>
                                    <input type="checkbox" id="terms" name="terms" required>
                                </div>
                                <div class="inputBox">
                                    <label for="datetime">Date and time:</label>
                                    <input type="datetime-local" id="datetime" name="datetime" required>
                                </div>
                            </div>

                            <div class="row100">
                                <div class="inputBox">
                                    <label for="file">Upload file:</label>
                                    <input type="file" id="file" name="file">
                                </div>
                            </div>

                            <div class="row100">
                                <div class="inputBox">
                                    <label for='message'>Message:</label>
                                    <textarea placeholder="Write your message here..." name="message"></textarea>
                                </div>
                            </div>

                            <div class="row100">
                                <div class="inputBox">
                                    <input type="submit" value="Submit">
                                </div>
                            </div>

                        </div>
                    </form>

                </div>

                <div class="contact info">
                    <h3>Contact Info</h3>
                    <div class = "infoBox">
                        <div>
                            <span><ion-icon name="location"></ion-icon></span>
                            <p>Server Side Development <br> IRELAND, DKIT </p>
                        </div>
                        <div>
                            <span><ion-icon name="mail"></ion-icon></span>
                            <a href = "mailto:d00251844@student.dkit.ie" > d00251844@student.dkit.ie </a>
                        </div>
                        <div>
                            <span><ion-icon name="call"></ion-icon></span>
                            <a href = "tel: +353830678444" > +353 830 678 444 </a>
                        </div>
                        <!-- Social Media Links -->
                        <ul class="sci">
                            <li><a href="https://www.facebook.com/"> <ion-icon name="logo-facebook"></ion-icon> </a></li>
                            <li><a href="https://twitter.com/"> <ion-icon name="logo-twitter"></ion-icon> </a></li>
                            <li><a href="https://www.instagram.com/"> <ion-icon name="logo-instagram"></ion-icon> </a></li>
                            <li><a href="https://ie.linkedin.com/"> <ion-icon name="logo-linkedin"></ion-icon> </a></li>
                        </ul>

                    </div>
                </div>

                <div class="contact map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2346.0420842552794!2d-
                    6.395559184264154!3d53.98427648011768!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.
                    1!3m3!1m2!1s0x4860cc1416459c83%3A0x6cc743bdadf216c2!2sDundalk%20Institute%20of%20
                    Technology!5e0!3m2!1sen!2sie!4v1678241501271!5m2!1sen!2sie"  style="border:0;"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>



            </div>


        </div>

        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    </main><!-- /.container -->


<?php include 'includes/footer.php'; ?>

</body>
