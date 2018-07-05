<!DOCTYPE html>
<html lang="en">
<head>
<title>Invest</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Invest project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<?php if ((!empty($_GET['page']) && $_GET['page'] == 'register') || empty($_GET['page'])) : ?>
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/responsive.css">
<?php endif;?>
<?php if (!empty($_GET['page']) && $_GET['page'] == 'register') : ?>
    <link rel="stylesheet" type="text/css" href="styles/contact.css">
    <link rel="stylesheet" type="text/css" href="styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
<?php endif;?>
</head>
<body>

<div class="super_container">
    <?php include 'switcher.php';?>
    <!-- Footer -->

    <footer class="footer">
        <div class="container">
            <div class="row">

                <!-- Footer Column -->
                <div class="col-lg-3 footer_col">
                    <div class="footer_about">
                        <div class="logo_container footer_logo">
                            <div class="logo">
                                <a href="#">
                                    <div class="logo_line_1"><span>start</span>invest</div>
                                    <div class="logo_line_2">semakin mudah temukan startup & investor</div>
                                    <div class="logo_img"><img src="images/logo-1.png" alt=""></div>
                                </a>
                            </div>
                        </div>
                        <p class="footer_about_text">Semakin banyaknya pemuda pemudi yang aktif dan kreatif dalam menciptakan ide ide untuk dijadikan startup oleh mereka kami membuat platform ini untuk memudahkannya menemukan investor demi keberlangsungan ide dan impian yang akan mereka capai.</p>
                    </div>
                </div>

                <!-- Footer Column -->
                <div class="col-lg-3 footer_col">
                    <div class="footer_links">
                        <div class="footer_title">Useful Links</div>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Benefit</a></li>
                            <li><a href="#">Event</a></li>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Contact</a></li>
                            
                        </ul>
                    </div>
                </div>

                <!-- Footer Column -->
                <div class="col-lg-6 footer_col">
                    <div class="footer_newsletter">
                        <div class="footer_title">Subscribe to our newsletter</div>
                        <form action="#" class="footer_newsletter_form">
                            <input type="email" class="footer_newsletter_input" placeholder="Your E-mail" required="required">
                            <button class="footer_newsletter_button" type="submit">subscribe</button>
                        </form>
                        <div class="footer_newsletter_text">Dengan mengisi email anda diatas, maka anda akan mendapatkan info info terupdate dari website ini dan juga menerima kabar dari event yang akan diselenggarakan yang berhubungan dengan startup.</div>
                        <div class="footer_social">
                            <ul>
                                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-reddit-alien" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 order-md-1 order-2">
                        <div class="copyright_content d-flex flex-row align-items-center justify-content-start">
                            <div class="cr"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-8 order-md-2 order-1">
                        <nav class="footer_nav d-flex flex-row align-items-center justify-content-md-end">
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="about.html">About us</a></li>
                                <li><a href="services.html">Services</a></li>
                                <li><a href="news.html">Blog</a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/custom.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        var tutup_alert = $('.close-sm');
        tutup_alert.onclick(function() {
            <?php
            unset($_SESSION['pesan']);
            unset($_SESSION['alert']);
            ?>
        });
    });
</script>
</body>
</html>