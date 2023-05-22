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
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="./public/css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="./public/css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="./public/css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="./public/img/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="./public/css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- owl stylesheets -->
    <link rel="stylesheet" href="./public/css/owl.carousel.min.css">
    <link rel="stylesheet" href="./public/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
</head>
<title><?php echo APP_NAME ?></title>

    <body>
<!-- section header start -->
<div class="header_section">
    <div class="container">
        <div class="row">
            <div class="col-md-3">

            </div>
            <div class="col-md-9">
                <div class="menu_text">
                    <ul>
                        <li><a href="index.php?c=home&a=index">HOME</a></li>
                        <li><a href="index.php?c=auth&a=index">LOGIN</a></li>

                        <div id="myNav" class="overlay">
                            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                            <div class="overlay-content">
                                <a href="index.php?c=home&a=index">HOME</a>
                                <a href="index.php?c=auth&a=index">LOGIN</a>
                            </div>
                        </div>
                        <span  style="font-size:33px;cursor:pointer; color: #ffffff;" onclick="openNav()"><img src="./public/img/toggle.png" class="toggle_menu"></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- section header end -->
    <div class="container">
        <!-- Begin page content -->
        <?php require_once($viewPath); ?>
    </div>
    <!-- banner section start -->
    <div class="banner_section">
        <div class="container-fluid">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="round"><img src="./public/img/round-icon.png"></div>
                                <p class="number_text">02</p>
                                <div class="line"><img src="./public/img/line.png"></div>
                                <p class="number_text">02</p>
                                <div class="round"><img src="./public/img/round-icon.png"></div>
                            </div>
                            <div class="col-sm-5">
                                <div class="taital_main">
                                    <h2 class="construction_text">CONSTRUCTION</h2>
                                    <h1 class="building_text">BUILDING</h1>
                                    <p class="lorem_text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure </p>
                                    <div class="contact_bt"><a href="#">CONTACT US</a></div>
                                    <div class="get_bt"><a href="#">GET A QUOTE NOW</a></div>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div><img src="./public/img/banner-bg.png"></div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="round"><img src="./public/img/round-icon.png"></div>
                                <p class="number_text">02</p>
                                <div class="line"><img src="./public/img/line.png"></div>
                                <p class="number_text">02</p>
                                <div class="round"><img src="./public/img/round-icon.png"></div>
                            </div>
                            <div class="col-sm-5">
                                <div class="taital_main">
                                    <h2 class="construction_text">CONSTRUCTION</h2>
                                    <h1 class="building_text">BUILDING</h1>
                                    <p class="lorem_text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure </p>
                                    <div class="contact_bt"><a href="#">CONTACT US</a></div>
                                    <div class="get_bt"><a href="#">GET A QUOTE NOW</a></div>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div><img src="../../public/img/banner-bg.png"></div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="round"><img src="./public/img/round-icon.png"></div>
                                <p class="number_text">02</p>
                                <div class="line"><img src="./public/img/line.png"></div>
                                <p class="number_text">02</p>
                                <div class="round"><img src="./public/img/round-icon.png"></div>
                            </div>
                            <div class="col-sm-5">
                                <div class="taital_main">
                                    <h2 class="construction_text">CONSTRUCTION</h2>
                                    <h1 class="building_text">BUILDING</h1>
                                    <p class="lorem_text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure </p>
                                    <div class="contact_bt"><a href="#">CONTACT US</a></div>
                                    <div class="get_bt"><a href="#">GET A QUOTE NOW</a></div>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div><img src="./public/img/banner-bg.png"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
    <!-- banner section end -->

    <!-- footer section start -->
    <div class="footer_section layout_padding">
        <div class="container">
        </div>
        <div class="footer_section_2">
            <div class="container">
                <h2 class="addres_text">Localização</h2>
                <div class="row map_addres">

                    <div class="col-sm-12 col-lg-4">
                    </div>
                    <div class="col-sm-12 col-lg-4">
                        <div class="map_text"><a href="https://www.google.com/maps/place/Polit%C3%A9cnico+de+Leiria+%7C+ESTG+-+Escola+Superior+de+Tecnologia+e+Gest%C3%A3o_Edif%C3%ADcio+D/@39.7344393,-8.8236182,17z/data=!3m1!4b1!4m6!3m5!1s0xd22735a4e067afb:0xcfaf619f4450fa76!8m2!3d39.7344393!4d-8.8210433!16s%2Fg%2F120r4y5q"><img src="./public/img/map-icon.png"><span class="map_icon">ESTG,IPL Leiria</span></div>
                    </div>

                </div>
                <div class="social_icon">
                    <ul>
                        <li><a href="https://www.facebook.com/politecnico.de.leiria/"><img src="./public/img/fb-icon.png"></a></li>
                        <li><a href="https://www.ipleiria.pt/"><img src="./public/img/ipl.png"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- footer section end -->
    <!-- copyright section start -->
    <div class="copyright_section">
        <p class="copyright_text">Copyright 2020 All Right Reserved By.<a href="https://html.design"> Free  html Templates</p>
    </div>
    <!-- copyright section end -->
    <!-- Javascript files-->
    <script src="./public/js/jquery.min.js"></script>
    <script src="./public/js/popper.min.js"></script>
    <script src="./public/js/bootstrap.bundle.min.js"></script>
    <script src="./public/js/jquery-3.0.0.min.js"></script>
    <script src="./public/js/plugin.js"></script>
    <!-- sidebar -->
    <script src="./public/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="./public/js/custom.js"></script>
    <!-- javascript -->
    <script src="./public/js/owl.carousel.js"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".fancybox").fancybox({
                openEffect: "none",
                closeEffect: "none"
            });

            $(".zoom").hover(function(){

                $(this).addClass('transition');
            }, function(){

                $(this).removeClass('transition');
            });
        });

    </script>
    <script>
        function openNav() {
            document.getElementById("myNav").style.width = "100%";
        }

        function closeNav() {
            document.getElementById("myNav").style.width = "0%";
        }
    </script>
</body>
</html>