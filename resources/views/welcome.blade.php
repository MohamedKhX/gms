<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Gym Template">
    <meta name="keywords" content="Gym, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gym | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,600,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }} " type="text/css">
    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }} " type="text/css">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }} " type="text/css">
    <link rel="stylesheet" href="{{ asset('css/barfiller.css') }} " type="text/css">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }} " type="text/css">
    <link rel="stylesheet" href="{{ asset('css/slicknav.min.css') }} " type="text/css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} " type="text/css">
</head>

<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>



<!-- Header Section Begin -->
<header class="header-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div class="logo">
                    <a href="./index.html">
                        <img src="img/logo.png" alt="">
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
     {{--           <nav class="nav-menu">
                    <ul>
                        <li class="active"><a href="./index.html">Home</a></li>
                        <li><a href="./about-us.html">About Us</a></li>
                        <li><a href="./class-details.html">Classes</a></li>
                        <li><a href="./services.html">Services</a></li>
                        <li><a href="./team.html">Our Team</a></li>
                        <li><a href="./contact.html">Contact</a></li>
                    </ul>
                </nav>--}}
            </div>
            <div class="col-lg-3">
                <div class="top-option">

                    <div class="to-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-youtube-play"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="canvas-open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header End -->

<!-- Hero Section Begin -->
<section class="hero-section">
    <div class="hs-slider owl-carousel">
        <div class="hs-item set-bg" data-setbg="img/hero/hero-1.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-6">
                   {{--     <div class="hi-text">
                            <span>شكل جسمك</span>
                            <h1>كن <strong>قويا</strong> وتمرن بقوة</h1>
                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
        <div class="hs-item set-bg" data-setbg="img/hero/hero-2.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-6">
              {{--          <div class="hi-text">
                            <span>Shape your body</span>
                            <h1>Be <strong>strong</strong> traning hard</h1>
                            <a href="#" class="primary-btn">Get info</a>
                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- ChoseUs Section Begin -->
<section class="choseus-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>لماذا نحن خيارك الأفضل</span>
                    <h2>ادفع حدودك إلى الأمام</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="cs-item">
                    <span class="flaticon-034-stationary-bike"></span>
                    <h4>معدات حديثة</h4>
                    <p>هنا يمكنك كتابة النص العربي الذي يتوافق مع العنوان "معدات حديثة"</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="cs-item">
                    <span class="flaticon-033-juice"></span>
                    <h4>خطة التغذية الصحية</h4>
                    <p>هنا يمكنك كتابة النص العربي الذي يتوافق مع العنوان "خطة التغذية الصحية"</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="cs-item">
                    <span class="flaticon-002-dumbell"></span>
                    <h4>تدريب احترافي</h4>
                    <p>هنا يمكنك كتابة النص العربي الذي يتوافق مع العنوان "تدريب احترافي"</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="cs-item">
                    <span class="flaticon-014-heart-beat"></span>
                    <h4>عناية كاملة بصحتك</h4>
                    <p>هنا يمكنك كتابة النص العربي الذي يتوافق مع العنوان "عناية كاملة بصحتك"</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ChoseUs Section End -->

<!-- Classes Section Begin -->
<section class="classes-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>فصولنا</span>
                    <h2>ما يمكننا تقديمه</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="class-item">
                    <div class="ci-pic">
                        <img src="img/classes/class-4.jpg" alt="">
                    </div>
                    <div class="ci-text">
                        <span>تدريب</span>
                        <h4>كمال أجسام</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="class-item">
                    <div class="ci-pic">
                        <img src="img/classes/class-5.jpg" alt="">
                    </div>
                    <div class="ci-text">
                        <span>تدريب</span>
                        <h4>بوكنسج</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ChoseUs Section End -->

<!-- Banner Section Begin -->
<section class="banner-section set-bg" data-setbg="img/hero/hero-1.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="bs-text">
                    <h2>سجل الآن</h2>
                    <div class="bt-tips">يمكنك الاشتراك عن طريق الدفع الإلكتروني</div>
                    <a href="#" class="primary-btn  btn-normal">إنشاء حساب</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner Section End -->

<!-- Pricing Section Begin -->
{{--<section class="pricing-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>Our Plan</span>
                    <h2>Choose your pricing plan</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-8">
                <div class="ps-item">
                    <h3>Class drop-in</h3>
                    <div class="pi-price">
                        <h2>$ 39.0</h2>
                        <span>SINGLE CLASS</span>
                    </div>
                    <ul>
                        <li>Free riding</li>
                        <li>Unlimited equipments</li>
                        <li>Personal trainer</li>
                        <li>Weight losing classes</li>
                        <li>Month to mouth</li>
                        <li>No time restriction</li>
                    </ul>
                    <a href="#" class="primary-btn pricing-btn">Enroll now</a>
                    <a href="#" class="thumb-icon"><i class="fa fa-picture-o"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-8">
                <div class="ps-item">
                    <h3>12 Month unlimited</h3>
                    <div class="pi-price">
                        <h2>$ 99.0</h2>
                        <span>SINGLE CLASS</span>
                    </div>
                    <ul>
                        <li>Free riding</li>
                        <li>Unlimited equipments</li>
                        <li>Personal trainer</li>
                        <li>Weight losing classes</li>
                        <li>Month to mouth</li>
                        <li>No time restriction</li>
                    </ul>
                    <a href="#" class="primary-btn pricing-btn">Enroll now</a>
                    <a href="#" class="thumb-icon"><i class="fa fa-picture-o"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-8">
                <div class="ps-item">
                    <h3>6 Month unlimited</h3>
                    <div class="pi-price">
                        <h2>$ 59.0</h2>
                        <span>SINGLE CLASS</span>
                    </div>
                    <ul>
                        <li>Free riding</li>
                        <li>Unlimited equipments</li>
                        <li>Personal trainer</li>
                        <li>Weight losing classes</li>
                        <li>Month to mouth</li>
                        <li>No time restriction</li>
                    </ul>
                    <a href="#" class="primary-btn pricing-btn">Enroll now</a>
                    <a href="#" class="thumb-icon"><i class="fa fa-picture-o"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>--}}
<!-- Pricing Section End -->

<!-- Gallery Section Begin -->
<div class="gallery-section">
    <div class="gallery">
        <div class="grid-sizer"></div>
        <div class="gs-item grid-wide set-bg" data-setbg="img/gallery/gallery-1.jpg">
            <a href="img/gallery/gallery-1.jpg" class="thumb-icon image-popup"><i class="fa fa-picture-o"></i></a>
        </div>
        <div class="gs-item set-bg" data-setbg="img/gallery/gallery-2.jpg">
            <a href="img/gallery/gallery-2.jpg" class="thumb-icon image-popup"><i class="fa fa-picture-o"></i></a>
        </div>
        <div class="gs-item set-bg" data-setbg="img/gallery/gallery-3.jpg">
            <a href="img/gallery/gallery-3.jpg" class="thumb-icon image-popup"><i class="fa fa-picture-o"></i></a>
        </div>
        <div class="gs-item set-bg" data-setbg="img/gallery/gallery-4.jpg">
            <a href="img/gallery/gallery-4.jpg" class="thumb-icon image-popup"><i class="fa fa-picture-o"></i></a>
        </div>
        <div class="gs-item set-bg" data-setbg="img/gallery/gallery-5.jpg">
            <a href="img/gallery/gallery-5.jpg" class="thumb-icon image-popup"><i class="fa fa-picture-o"></i></a>
        </div>
        <div class="gs-item grid-wide set-bg" data-setbg="img/gallery/gallery-6.jpg">
            <a href="img/gallery/gallery-6.jpg" class="thumb-icon image-popup"><i class="fa fa-picture-o"></i></a>
        </div>
    </div>
</div>
<!-- Gallery Section End -->

{{--<!-- Team Section Begin -->
<section class="team-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="team-title">
                    <div class="section-title">
                        <span>Our Team</span>
                        <h2>TRAIN WITH EXPERTS</h2>
                    </div>
                    <a href="#" class="primary-btn btn-normal appoinment-btn">appointment</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="ts-slider owl-carousel">
                <div class="col-lg-4">
                    <div class="ts-item set-bg" data-setbg="img/team/team-1.jpg">
                        <div class="ts_text">
                            <h4>Athart Rachel</h4>
                            <span>Gym Trainer</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ts-item set-bg" data-setbg="img/team/team-2.jpg">
                        <div class="ts_text">
                            <h4>Athart Rachel</h4>
                            <span>Gym Trainer</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ts-item set-bg" data-setbg="img/team/team-3.jpg">
                        <div class="ts_text">
                            <h4>Athart Rachel</h4>
                            <span>Gym Trainer</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ts-item set-bg" data-setbg="img/team/team-4.jpg">
                        <div class="ts_text">
                            <h4>Athart Rachel</h4>
                            <span>Gym Trainer</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ts-item set-bg" data-setbg="img/team/team-5.jpg">
                        <div class="ts_text">
                            <h4>Athart Rachel</h4>
                            <span>Gym Trainer</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ts-item set-bg" data-setbg="img/team/team-6.jpg">
                        <div class="ts_text">
                            <h4>Athart Rachel</h4>
                            <span>Gym Trainer</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Team Section End -->--}}

<!-- Get In Touch Section Begin -->
<div class="gettouch-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="gt-text">
                    <i class="fa fa-map-marker"></i>
                    <p style="margin-top: 0.7rem">بن عاشور - شارع الظل</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="gt-text">
                    <i class="fa fa-mobile"></i>
                    <ul>
                        <li>091-0000000</li>
                        <li>092-0000000</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="gt-text email">
                    <i class="fa fa-envelope"></i>
                    <p>gym@gmail.com</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Get In Touch Section End -->

<!-- Footer Section Begin -->
{{--<section class="footer-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="fs-about">
                    <div class="fa-logo">
                        <a href="#"><img src="img/logo.png" alt=""></a>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore dolore magna aliqua endisse ultrices gravida lorem.</p>
                    <div class="fa-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-youtube-play"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa  fa-envelope-o"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6">
                <div class="fs-widget">
                    <h4>Useful links</h4>
                    <ul>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Classes</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6">
                <div class="fs-widget">
                    <h4>Support</h4>
                    <ul>
                        <li><a href="#">Login</a></li>
                        <li><a href="#">My account</a></li>
                        <li><a href="#">Subscribe</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
            </div>
           --}}{{-- <div class="col-lg-4 col-md-6">
                <div class="fs-widget">
                    <h4>Tips & Guides</h4>
                    <div class="fw-recent">
                        <h6><a href="#">Physical fitness may help prevent depression, anxiety</a></h6>
                        <ul>
                            <li>3 min read</li>
                            <li>20 Comment</li>
                        </ul>
                    </div>
                    <div class="fw-recent">
                        <h6><a href="#">Fitness: The best exercise to lose belly fat and tone up...</a></h6>
                        <ul>
                            <li>3 min read</li>
                            <li>20 Comment</li>
                        </ul>
                    </div>
                </div>
            </div>--}}{{--
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="copyright-text">
                    <p>
                        جميع الحقوق محفوظة  &copy; 2024
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>--}}
<!-- Footer Section End -->


<!-- Js Plugins -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/masonry.pkgd.min.js"></script>
<script src="js/jquery.barfiller.js"></script>
<script src="js/jquery.slicknav.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/main.js"></script>



</body>

</html>
