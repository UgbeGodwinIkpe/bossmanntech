<!-- footer section start -->
<div class="footer_section layout_padding">
        <div class="container ">
            <div class="footer_logo " id="contact-us ">
                <h4 class="text-white banner_taital ">Talk To Sales</h4>
                <h4 class="text-white ">Our experts love to answer questions</h4>
                <!-- <a href="index.html " class="text-white "><img src="images/footer-logo.pn " alt="Bossmann Technologies "></a> -->
            </div>
            <div class="input_bt ">
                <form id="contact-form">
                    <input type="email " class="mail_bt" placeholder="Enter Your Email " name="useremail" required>
                    <input type="text " class="mail_bt" placeholder="Enter Your Name " name="username" required>
                    <input type="text " class="mail_bt" placeholder="Enter Your Phone Number " name="userphonenumber" required>
                    <select name="subject" class="mail_bt" required>
                        <option value="">Select One Subject</option>
                        <option value="Web Development Services">Web Development Services</option>
                        <option value="Mobile Apps Development Services">Mobile Apps Development Services</option>
                        <option value="Cyber Security Services">Cyber Security Services</option>
                        <option value="Software Installation Services">Software Installation Services</option>
                        <option value="Database Management Services">Database Management Services</option>
                        <option value="Computers and Accessories">Computers and Accessories</option>
                        <option value="Other Services">Other Services</option>
                        <option value="Have a Complaint">Have a Complaint</option>
                    </select>
                    <textarea name="message" id=" " cols="30 " rows="10 " class="mail_bt ">Write Your Message Here...</textarea>
                    <span class="subscribe_bt " id="basic-addon2 "><button type="submit " style="width: 100%;" id="conform">Send</button></span>

                </form>
            </div>
            <div class="footer_menu ">
                <h4 class="text-white banner_taital " aria-hidden="true "><i class="fa fa-mobile "></i> +2348130484992</h4>
                <h4 class="text-white ">We also provide quick response through our social media handles:</h4>
                <center>
                    <ul>
                        <li><a href="tel:+2348130484992"><button class="btn fa fa-phone" style="color:#ffffff; background-color: #f26522; padding:10px;border-radius: 50%; "></button></a></li>
                        <li><a href="https://wa.me/2348130484992?text=Hello+Bossmann+Technologies'+sales!%0AMy+name+is+....+,+I+want+to+enquire+about+....."><button class="btn fa fa-whatsapp" style="color:#ffffff; background-color: #f26522; padding:10px;border-radius: 50%; "></button></a></li>
                        <li>
                            <a href="# "><button class="btn fa fa-facebook" style="color:#ffffff; background-color: #f26522; padding:10px;border-radius: 50%; "></button></a>
                        </li>
                        <li>
                            <a href="#"><button class="btn fa-linkedin" style="color:#ffffff; background-color: #f26522; padding:10px;border-radius: 50%; "></button></a>
                        </li>
                        <li>
                            <a href=""><button class="btn fa-instagram" style="color:#ffffff; background-color: #f26522; padding:10px;border-radius: 50%; "></button></a>

                        </li>
                        <li>
                            <a href="https://x.com/bossmann_tech" class="fa fa-twitter"></a>
                        </li>
                        <li>
                            <a href="https://www.tiktok.com/@bossmanntech1?_t=8nm9U3yS9MD&_r=1" class="fa fa-tiktok"></a>
                        </li>
                    </ul>
                </center>
            </div>
            <!-- <div class="location_main fa fa-phone "> <a href="# ">+1 1800 1200 1200</a></div> -->
        </div>
        <div class="container ">
            <h4 class="text-white banner_taital ">Our Location</h4>
            <h6 class="text-white ">
                <button class="fa fa-map-marker " style="color:#ffffff; background-color: #f26522; padding:10px;border-radius: 50%; "></button>
                <b> Head Office:</b> Shop 02 City Center Mall, 2nd Floor, Area 11, Garki, Abuja 900103, Federal Capital Territory
            </h6>
            <!-- Google map embeded code -->
            <center>
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15761.051304744273!2d7.5044203!3d9.0397728!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x104e0b6dd47a9c69%3A0x7f106cf4d068802d!2sBossmann%20Technologies%20Ltd.!5e0!3m2!1sen!2sng!4v1718371826083!5m2!1sen!2sng "
                    width="80% " height="450 " style="border:0; " frameborder="0 " allowfullscreen=" " loading="lazy " referrerpolicy="no-referrer-when-downgrade "></iframe>
            </center>
        </div>
    </div>
    <!-- footer section end -->
    <!-- copyright section start -->
    <div class="copyright_section ">
        <div class="container ">
            <p class="copyright_text ">© <span id="year">Year</span> All Rights Reserved. <a href="https://wa.me/2348127087575 ">Bossmann Technologies Ltd</a></p>
        </div>
    </div>

    <!-- copyright section end -->
    <!-- Javascript files-->
    <script>
        let retailservice = document.getElementById("retail-services");
        let enterpriseservice = document.getElementById("enterprise-service");
        let entbnt = document.getElementById("entbtn");
        let retailbnt = document.getElementById("retailbtn");
        let cyear = document.getElementById("year");
        let d = new Date().getFullYear();
        cyear.innerHTML = d;

        function enterprise() {
            console.log("Enterprise ")
            retailservice.style.display = "none !important";
            enterpriseservice.style.display = "block";
            retailbtn.style.display = "none";
            entbnt.innerHTML = "<h1 style='color:white;'>Please wait loading...</h1>";
            entbtn.style.width = "50%";
            entbtn.style.color = "white";
        }

        function retails() {
            console.log("Retails");
            retailservice.style.display = "block";
            enterpriseservice.style.display = "none";
        }
    </script>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <script src="js/plugin.js"></script>
    <!-- sidebar -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>
    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
        document.getElementById("year").innerHTML = new Date().getFullYear()
    </script>
</body>

</html>