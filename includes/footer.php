
<html>
    <body>


        <script src="js/bootstrap.bundle.min.js"></script>


    </body>

    <div class="footer">
        <div class="bubbles">
            <?php for ($i = 0; $i < 128; $i++) { ?>
                <div class="bubble" style="--size:<?php echo 2+rand(0,4) ?>rem; --distance:<?php echo 6+rand(0,4) ?>rem; --position:<?php echo -5+rand(0,110) ?>%; --time:<?php echo 2+rand(0,2) ?>s; --delay:<?php echo -1*(2+rand(0,2)) ?>s;"></div>
            <?php } ?>
        </div>
        <div class="content">
            <div>
                <div class = "infoBox">
                    <div>
                        <span><ion-icon name="location"></ion-icon></span>
                        <a href = "https://www.dkit.ie/" >Server Side Development, DKIT Dundalk, IRELAND</a>
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


                </div>


            </div>
            <div>
                <p>©2023 Abielinsky</p>
            </div>
        </div>
    </div>
    <svg style="position:fixed; top:100vh">
        <defs>
            <filter id="blob">
                <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur"/>
                <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="blob"/>
            </filter>
        </defs>
    </svg>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</html>