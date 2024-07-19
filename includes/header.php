<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Bossmann Technologies</title>
    <meta name="keywords" content="Bossmann, Bossmann technologies, Bossmann ltd, Bossmann technologies ltd, bossmann tech, laptops, brand new computer, computer accessories, compter shop, software installation, website development, software development, hp laptops and computers, hp laptops, hp compter, hp products, quality hp laptops, affordable laptops, buy laptops, buy computer, one-stop computer shop, computer shop in abuja, cheap laptops in abuja, quaility laptops in abuja, computer sales, laptop sales, laptop shop in abuja, computer shop in abuja, software firm in abuja, software company, software company in abuja, computer market place, affordable computer store in abuja, laptop and computer accessories">
    <meta name="description" content="Bossmann Technologies Ltd is a one-stop computers shop in Abuja; your premier destination for cutting-edge computing solutions. From high-performance desktops to sleek laptops, we offer a wide range of top-quality devices to suit every need. Elevate your productivity with our premium accessories and unlock new possibilities with our expert software services. At Bossmann, we're dedicated to providing innovative solutions that empower you to thrive in the digital age. Experience excellence in technology – choose Bossmann Technologies Ltd.">
    <meta name="author" content="Godwin Ikpe Ugbe">
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- font awesome -->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- owl stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesoeet" href="css/owl.theme.default.min.css">
    <!-- <link href="css/bootstrap1.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <!-- Libraries Stylesheet -->
    <!-- <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet"> -->
    <!-- Customized Bootstrap Stylesheet -->
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- Template Stylesheet -->
    <link href="css/style1.css" rel="stylesheet">
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="css/navabar.css"> -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>
    <script type="text/javascript">
        (function() {
            // https://dashboard.emailjs.com/admin/account
            emailjs.init({
                publicKey: "52UEaT-6XmQ29Z_Mu",
            });
        })();
    </script>
    <script type="text/javascript">
        window.onload = function() {
            document.getElementById('contact-form').addEventListener('submit', function(event) {
                event.preventDefault();
                if(this.username.value==""|| this.useremail.value==""||this.userphonenumber.value==""||this.subject.value==""){
                    console.log("Empty input not allowed!")
                    return;
                }
                // these IDs from the previous steps
                // emailjs.send("service_jbk03hk","template_bysq7p2",{
                // from_name: "Godwin Testing",
                // message: "Testing the process",
                // reply_to: "ugbegodwin7963@gmail.com",
                // });
                emailjs.sendForm('service_jbk03hk', "template_bysq7p2", this)
                    .then(() => {
                        console.log('SUCCESS!');
                        document.getElementById('conform').textContent = "Send"
                        alert("Message has been sent successfully!")
                    }, (error) => {
                        console.log('FAILED...', error);
                    });
            });
        }
    </script>
</head>

<body>


    <!-- banner bg main start -->
    <div class="banner_bg_main">
        <!-- header top section start -->
        <div class="container">
            <div class="header_section_top">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="custom_menu">
                            <ul>
                                <li><a href="index.php" class="btn btn-primary">Home</a></li>
                                <li><a href="about.php">About Us</a></li>
                                <li><a href="enterprise.php">Services</a></li>
                                <li><a href="retails.php">Shop With Us</a></li>
                                <li><a href="contact.php">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header top section start -->
        <!-- logo section start -->
        <div class="logo_section">
            <div class="container" style="display: flex;">
                <!-- header section start -->
                <div class="header_section">
                    <div class="container">
                        <div class="containt_main">
                            <div id="mySidenav" class="sidenav">
                                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                                <a href="index.php" class="btn btn-primary">Home</a>
                                <a href="about.php">About Us</a>
                                <a href="enterprise.php">Services</a>
                                <a href="#services">Shop With Us</a>
                                <a href="contact.php">Contact Us</a>
                                
                            </div>
                            <span class="toggle_icon" onclick="openNav()"><img src="images/toggle-icon.png"></span>
                        </div>
                    </div>
                </div>
                <!-- header section end -->
                <!-- logo section start -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="logo">
                            <a href="index.php" class="text-white"><img src="images/logo1.jpg" alt="Bossmann Technologies" width="500px;"></a>
                        </div>
                    </div>
                </div>
                <!-- logo section end -->
            </div>
        </div>
