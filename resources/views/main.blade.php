<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Sweets Technologies Ltd.</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link href="{{ asset('favicon.ico') }}" rel="icon">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet">
</head>
<body id="page-top">
<nav class="navbar fixed-top navbar-expand-lg">
    <img id="logo" class="navbar-logo" width="18pt" height="18pt" src="/img/favicon.png" alt="">
    <a id="logo" class="navbar-brand" href="#">Sweets Technologies</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon">Menu <i class="fa fa-bars" aria-hidden="true"></i>
  </span>
    </button>
    <div itemscope itemtype="http://schema.org/SiteNavigationElement" class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul itemscope itemtype="http://www.schema.org/SiteNavigationElement" class="navbar-nav right">
            <li itemprop="name" class="nav-item">
                <a  itemprop="url" class="nav-link" href="./">Home</a>
            </li>
            <li itemprop="name" class="nav-item">
                <a itemprop="url" class="nav-link" href="equipment.html">Equipment</a>
            </li>
            <li itemprop="name" class="nav-item">
                <a itemprop="url" class="nav-link" href="news.html">News</a>
            </li>
            <li itemprop="name" class="nav-item">
                <a itemprop="url" class="nav-link" href="exhibitions.html">Exhibitions</a>
            </li>
            <li itemprop="name" class="nav-item">
                <a itemprop="url" class="nav-link" href="./#contacts">Contacts</a>
            </li>
        </ul>
        <div class="lang_search right">
            <ul class="navbar-nav navbar-nav-lang">
                <li class="nav-item">
                    <a class="nav-link-lang" href="#">
                        <img width="18pt" height="18pt" src="img/en_flag.png" alt=""><span
                            class="language">EN</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link-lang" href="./ru">
                        <img width="18pt" height="18pt" src="img/ru_flag.png" alt=""><span
                            class="language">RU</span></a>
                </li>
            </ul>
            <form class="form-inline form-inline-search">
                <button class="btn-lang my-2 my-sm-0" data-toggle="modal" data-target="#modalSearch" type="button"><i
                        class="fa fa-search" aria-hidden="true"></i> Search
                </button>
            </form>
        </div>
    </div>
</nav>
<!-- Modal -->
<div class="modal fade" id="modalSearch" tabindex="-1" role="dialog" aria-labelledby="modalSearchLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalSearchLabel">Search equipment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="label-search">Categories</h5>
                            <div class="control-group">
                                <label class="control control-checkbox">
                                    Chocolate
                                    <input type="checkbox" checked="checked" />
                                    <div class="control_indicator"></div>
                                </label>
                                <label class="control control-checkbox">
                                    Candy
                                    <input type="checkbox" />
                                    <div class="control_indicator"></div>
                                </label>
                                <label class="control control-checkbox">
                                    Cookies
                                    <input type="checkbox" />
                                    <div class="control_indicator"></div>
                                </label>
                                <label class="control control-checkbox">
                                    Wafers
                                    <input type="checkbox" />
                                    <div class="control_indicator"></div>
                                </label>
                                <label class="control control-checkbox">
                                    Sugar product
                                    <input type="checkbox" />
                                    <div class="control_indicator"></div>
                                </label>
                                <label class="control control-checkbox">
                                    Packaking equipment
                                    <input type="checkbox" />
                                    <div class="control_indicator"></div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="button-neu">Search</button>
            </div>
        </div>
    </div>
</div>
<div id="home" class="intro main-bg">
    <div class="overlay-itro"></div>
    <div class="intro-content display-table">
        <div class="table-cell">
            <div itemscope itemtype="http://schema.org/Organization" class="container-fluid">
                <div class="row">
                    <div class="col-md-5 d-flex align-self-center justify-content-center">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12 d-flex justify-content-center">
                                    <img class="logo" src="img/logo.png" itemprop="logo" width="300px" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-5 main-short align-self-center">
                        <h2>Sweetstechnologies</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusantium ad aliquam architecto aut et illum ipsum mollitia odit tempore!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <video id="videoBG" autoplay muted loop>
        <source src="/img/footage.mp4" type="video/mp4">
    </video>
</div>
<div class="container-fluid main-back">
    <section id="categories" class="blog-mf route">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="title-box text-center">
                        <h3 class="title-a">Categories</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 animated-item js-animated-item col-6 mb-30">
                    <div class="categories card-blog">
                        <div class="categories-img">
                            <a href="#"><img src="img/post-1.jpg" alt="" class="categories-img-wrapper"></a>
                        </div>
                        <div class="card-body">
                            <div class="card-category-box">
                                <div class="card-category">
                                    <h6 class="category">Chocolate</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 animated-item js-animated-item col-6 mb-30">
                    <div class="categories card-blog">
                        <div class="categories-img">
                            <a href="#"><img src="img/post-1.jpg" alt="" class="categories-img-wrapper"></a>
                        </div>
                        <div class="card-body">
                            <div class="card-category-box">
                                <div class="card-category">
                                    <h6 class="category">Candy</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 animated-item js-animated-item col-6 mb-30">
                    <div class="categories card-blog">
                        <div class="categories-img">
                            <a href="#"><img src="img/post-1.jpg" alt="" class="categories-img-wrapper"></a>
                        </div>
                        <div class="card-body">
                            <div class="card-category-box">
                                <div class="card-category">
                                    <h6 class="category">Cookies</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 animated-item js-animated-item col-6 mb-30">
                    <div class="categories card-blog">
                        <div class="categories-img">
                            <a href="#"><img src="img/post-1.jpg" alt="" class="categories-img-wrapper"></a>
                        </div>
                        <div class="card-body">
                            <div class="card-category-box">
                                <div class="card-category">
                                    <h6 class="category">Wafers</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 animated-item js-animated-item col-6 mb-30">
                    <div class="categories card-blog">
                        <div class="categories-img">
                            <a href="#"><img src="img/post-1.jpg" alt="" class="categories-img-wrapper"></a>
                        </div>
                        <div class="card-body">
                            <div class="card-category-box">
                                <div class="card-category">
                                    <h6 class="category">Sugar products</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 animated-item js-animated-item col-6 mb-30">
                    <div class="categories card-blog">
                        <div class="categories-img">
                            <a href="#"><img src="img/post-1.jpg" alt="" class="categories-img-wrapper"></a>
                        </div>
                        <div class="card-body">
                            <div class="card-category-box">
                                <div class="card-category">
                                    <h6 class="category">Packaging equipment</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <section class="about-mf">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="about" class="box-shadow-full">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="about-me pt-4 pt-md-0">
                                    <h3 class="title-a text-center">About us</h3>
                                    <br>
                                </div>
                            </div>
                            <div class="col-md-6 align-self-center">
                                <p class="lead">
                                    Shokolend co. ltd brand «Sweet Technologies» company was founded more than 10 years
                                    ago. Our enterprise specialises on repair and manufacture of the confectionery
                                    equipment. We restore wrapping machines of the NAGEMA, Sollich, Haensel, Bosch,
                                    Knobel, Sapal, NUOVAFIMA and others companies. We carry out repair and equipment
                                    delivery in Russia and foreign countries (Germany, Belgium, Spain, Italy, Lebanon,
                                    Syria, Africa countries and etc.).
                                </p>
                                <p class="lead">
                                    Shokolend co. ltd brand «Sweet Technologies» company will help to solve a question
                                    with manufacturing and replacement of any detail for your equipment.
                                </p>
                                <p class="lead">
                                    The equipment is made with observance of all necessary requirements of confectionery
                                    factories of average and the low power for different variants and possibilities of
                                    your busssines.
                                </p>
                                <p class="lead">
                                    Quality of the used confectionery equipment after major repair look like new and
                                    work like new, more important that the cost is more cheaper. Shokolend co. ltd brand
                                    «Sweet Technologies» company is the dealer of Wafer stick lines and filling machines
                                    for «Tornado» type cookies.
                                </p>
                            </div>
                            <div class="col-md-6">
                                <img src="/img/product-1-desktop-1x.webp" class="img-fluid" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="news" class="blog-mf route">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="title-box text-center">
                        <h3 class="title-a">Last News</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-blog">
                        <div class="card-img">
                            <a href="news-single.html"><img src="img/post-1.jpg" alt="" class="img-fluid"></a>
                        </div>
                        <div class="card-body">
                            <div class="card-category-box">
                                <div class="card-category">
                                    <h6 class="category">Category</h6>
                                </div>
                            </div>
                            <h3 class="card-title"><a href="news-single.html">Title</a></h3>
                            <p class="card-description">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae sit velit officiis, et.
                            </p>
                        </div>
                        <div class="card-footer">
                            <div class="post-date">
                                <span class="fa fa-calendar"></span>
                                <span class="date">01.02.2020</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-blog">
                        <div class="card-img">
                            <a href="news-single.html"><img src="img/post-1.jpg" alt="" class="img-fluid"></a>
                        </div>
                        <div class="card-body">
                            <div class="card-category-box">
                                <div class="card-category">
                                    <h6 class="category">Category</h6>
                                </div>
                            </div>
                            <h3 class="card-title"><a href="news-single.html">Title</a></h3>
                            <p class="card-description">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae sit velit officiis, et.
                                Rerum est laudantium quia, eveniet, molestiae consectetur aliquid hic error ex, aliquam
                                libero pariatur enim non atque.
                            </p>
                        </div>
                        <div class="card-footer">
                            <div class="post-date">
                                <span class="fa fa-calendar"></span>
                                <span class="date">01.02.2020</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-blog">
                        <div class="card-img">
                            <a href="news-single.html"><img src="img/post-1.jpg" alt="" class="img-fluid"></a>
                        </div>
                        <div class="card-body">
                            <div class="card-category-box">
                                <div class="card-category">
                                    <h6 class="category">Category</h6>
                                </div>
                            </div>
                            <h3 class="card-title"><a href="news-single.html">Title</a></h3>
                            <p class="card-description">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda quaerat ipsam,
                                libero tempora voluptates repellendus labore, doloremque facilis suscipit beatae
                                voluptatibus. Quo officiis, quibusdam quaerat a itaque quos sed assumenda.
                            </p>
                        </div>
                        <div class="card-footer">
                            <div class="post-date">
                                <span class="fa fa-calendar"></span>
                                <span class="date">01.02.2020</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="partners" class="sect-pt4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="title-box text-center">
                        <h3 class="title-a">Partners</h3>
                    </div>
                </div>
            </div>
            <div class="animated-item js-animated-item">
                <div class="owl-carousel owl-theme">
                    <div><img src="/img/partners/image%20(1).png" alt=""></div>
                    <div><img src="/img/partners/image%20(3).png" alt=""></div>
                    <div><img src="/img/partners/image%20(4).png" alt=""></div>
                    <div><img src="/img/partners/image%20(5).png" alt=""></div>
                    <div><img src="/img/partners/image%20(6).png" alt=""></div>
                    <div><img src="/img/partners/image%20(7).png" alt=""></div>
                    <div><img src="/img/partners/image%20(9).png" alt=""></div>
                    <div><img src="/img/partners/image%20(10).png" alt=""></div>
                    <div><img src="/img/partners/image%20(11).png" alt=""></div>
                    <div><img src="/img/partners/image%20(18).png" alt=""></div>
                    <div><img src="/img/partners/image%20(12).png" alt=""></div>
                    <div><img src="/img/partners/image%20(13).png" alt=""></div>
                    <div><img src="/img/partners/image%20(14).png" alt=""></div>
                    <div><img src="/img/partners/image%20(15).png" alt=""></div>
                    <div><img src="/img/partners/image%20(16).png" alt=""></div>
                    <div><img src="/img/partners/image%20(17).png" alt=""></div>
                    <div><img src="/img/partners/image%20(19).png" alt=""></div>
                    <div><img src="/img/partners/image%20(20).png" alt=""></div>
                </div>
            </div>
        </div>
    </section>
</div>
<section class="bg-image sect-mt4">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="contacts" class="box-shadow-full-contacts">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="title-box-2">
                                <h5 class="title-left">Feedback</h5>
                            </div>
                            <div>
                                <form action="" method="post" role="form" class="contactForm">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" name="name" class="form-equipment" id="name"
                                                       placeholder="Name" data-rule="minlen:4"
                                                       data-msg="Incorrect name"/>
                                                <div class="validation"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="email" class="form-equipment" name="email" id="email"
                                                       placeholder="Email" data-rule="email"
                                                       data-msg="Incorrect Email"/>
                                                <div class="validation"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="phone" class="form-equipment" name="phone" id="phone"
                                                       placeholder="Phone" data-rule="email"
                                                       data-msg="Incorrect phone"/>
                                                <div class="validation"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea class="form-equipment" name="message" rows="5"
                                                          data-rule="required" data-msg="Enter your message"
                                                          placeholder="Message"></textarea>
                                                <div class="validation"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-right">
                                            <button type="submit" class="button-neu">Send</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="title-box-2 pt-4 pt-md-0">
                                <h5 class="title-left">
                                    Contacts
                                </h5>
                            </div>
                            <div class="more-info">
                                <ul class="list-ico">
                                    <li><span class="fa fa-map-marker"></span><span class="contacts">Russia, Stavropol region, Kochubeev
                                        district, H. Novozelenchuksky, str. Gagarina, 1</span>
                                    </li>
                                    <li><span class="fa fa-phone"></span><span class="contacts">+7(86554)9-53-17 ext. 500/504/104/501/506</span>
                                    </li>
                                    <li><span class="fa fa-envelope"></span><span
                                            class="contacts">info@sweetstech.com</span></li>
                                </ul>
                            </div>
                            <div class="map-wrapper">
                                <iframe class="map-wrapper-iframe"
                                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d5819944.899191486!2d41.9003569!3d44.5812749!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xcceb78920dd5d98!2s%22Sweets%20technologies%22%20Ltd.!5e0!3m2!1sru!2sru!4v1581571868237!5m2!1sru!2sru"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-4 align-self-center">
                    <a href="./" class="logo-link">
                        <img src="./img/logo_footer.png" alt="sweets technologies logo" class="footer-logo-img">
                    </a>
                </div>
                <div class="col-md-4 col-4 align-self-center text-center social">
                    <div class="social-icon">
                        <a href="https://www.instagram.com/sweetstech" target="_blank">
                            <svg class="instagram-icon" height="18pt" viewBox="0 0 511 511.9" width="18pt"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="m510.949219 150.5c-1.199219-27.199219-5.597657-45.898438-11.898438-62.101562-6.5-17.199219-16.5-32.597657-29.601562-45.398438-12.800781-13-28.300781-23.101562-45.300781-29.5-16.296876-6.300781-34.898438-10.699219-62.097657-11.898438-27.402343-1.300781-36.101562-1.601562-105.601562-1.601562s-78.199219.300781-105.5 1.5c-27.199219 1.199219-45.898438 5.601562-62.097657 11.898438-17.203124 6.5-32.601562 16.5-45.402343 29.601562-13 12.800781-23.097657 28.300781-29.5 45.300781-6.300781 16.300781-10.699219 34.898438-11.898438 62.097657-1.300781 27.402343-1.601562 36.101562-1.601562 105.601562s.300781 78.199219 1.5 105.5c1.199219 27.199219 5.601562 45.898438 11.902343 62.101562 6.5 17.199219 16.597657 32.597657 29.597657 45.398438 12.800781 13 28.300781 23.101562 45.300781 29.5 16.300781 6.300781 34.898438 10.699219 62.101562 11.898438 27.296876 1.203124 36 1.5 105.5 1.5s78.199219-.296876 105.5-1.5c27.199219-1.199219 45.898438-5.597657 62.097657-11.898438 34.402343-13.300781 61.601562-40.5 74.902343-74.898438 6.296876-16.300781 10.699219-34.902343 11.898438-62.101562 1.199219-27.300781 1.5-36 1.5-105.5s-.101562-78.199219-1.300781-105.5zm-46.097657 209c-1.101562 25-5.300781 38.5-8.800781 47.5-8.601562 22.300781-26.300781 40-48.601562 48.601562-9 3.5-22.597657 7.699219-47.5 8.796876-27 1.203124-35.097657 1.5-103.398438 1.5s-76.5-.296876-103.402343-1.5c-25-1.097657-38.5-5.296876-47.5-8.796876-11.097657-4.101562-21.199219-10.601562-29.398438-19.101562-8.5-8.300781-15-18.300781-19.101562-29.398438-3.5-9-7.699219-22.601562-8.796876-47.5-1.203124-27-1.5-35.101562-1.5-103.402343s.296876-76.5 1.5-103.398438c1.097657-25 5.296876-38.5 8.796876-47.5 4.101562-11.101562 10.601562-21.199219 19.203124-29.402343 8.296876-8.5 18.296876-15 29.398438-19.097657 9-3.5 22.601562-7.699219 47.5-8.800781 27-1.199219 35.101562-1.5 103.398438-1.5 68.402343 0 76.5.300781 103.402343 1.5 25 1.101562 38.5 5.300781 47.5 8.800781 11.097657 4.097657 21.199219 10.597657 29.398438 19.097657 8.5 8.300781 15 18.300781 19.101562 29.402343 3.5 9 7.699219 22.597657 8.800781 47.5 1.199219 27 1.5 35.097657 1.5 103.398438s-.300781 76.300781-1.5 103.300781zm0 0"/>
                                <path d="m256.449219 124.5c-72.597657 0-131.5 58.898438-131.5 131.5s58.90343 131.5 131.5 131.5c72.601562 0 131.5-58.898438 131.5-131.5s-58.898438-131.5-131.5-131.5zm0 216.800781c-47.097657 0-85.300781-38.199219-85.300781-85.300781s38.203124-85.300781 85.300781-85.300781c47.101562 0 85.300781 38.199219 85.300781 85.300781s-38.199219 85.300781-85.300781 85.300781zm0 0"/>
                                <path d="m423.851562 119.300781c0 16.953125-13.746093 30.699219-30.703124 30.699219-16.953126 0-30.699219-13.746094-30.699219-30.699219 0-16.957031 13.746093-30.699219 30.699219-30.699219 16.957031 0 30.703124 13.742188 30.703124 30.699219zm0 0"/>
                            </svg>
                        </a>
                    </div>
                    <div class="social-icon">
                        <a href="https://www.youtube.com/channel/UCISaAQ5WmmMtvU7-_g_diDQ" target="_blank">
                            <svg class="youtube-icon" version="1.1" height="18pt" width="18pt" id="Capa_1"
                                 xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                 viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
<g><g><path d="M490.24,113.92c-13.888-24.704-28.96-29.248-59.648-30.976C399.936,80.864,322.848,80,256.064,80
            c-66.912,0-144.032,0.864-174.656,2.912c-30.624,1.76-45.728,6.272-59.744,31.008C7.36,138.592,0,181.088,0,255.904
            C0,255.968,0,256,0,256c0,0.064,0,0.096,0,0.096v0.064c0,74.496,7.36,117.312,21.664,141.728
            c14.016,24.704,29.088,29.184,59.712,31.264C112.032,430.944,189.152,432,256.064,432c66.784,0,143.872-1.056,174.56-2.816
            c30.688-2.08,45.76-6.56,59.648-31.264C504.704,373.504,512,330.688,512,256.192c0,0,0-0.096,0-0.16c0,0,0-0.064,0-0.096
            C512,181.088,504.704,138.592,490.24,113.92z M192,352V160l160,96L192,352z"/>
    </g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g></svg>
                        </a>
                    </div>
                    <div class="social-icon">
                        <a href="https://facebook.com/sweetstec" target="_blank">
                            <svg class="facebook-icon" height="18pt" width="18pt" viewBox="0 0 512 512"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="m437 0h-362c-41.351562 0-75 33.648438-75 75v362c0 41.351562 33.648438 75 75 75h151v-181h-60v-90h60v-61c0-49.628906 40.371094-90 90-90h91v90h-91v61h91l-15 90h-76v181h121c41.351562 0 75-33.648438 75-75v-362c0-41.351562-33.648438-75-75-75zm0 0"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 col-4 align-self-center copy">
                    <p>All rights reserved. © <a href="./">Sweets Technologies</a></p>
                </div>
            </div>
        </div>
    </footer>
</section>
<!--/ Section Contact-footer End /-->
<div class="to-top js-to-top">
    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24">
        <path fill="none" d="M0 0h24v24H0V0z"></path>
        <path d="M4 12l1.41 1.41L11 7.83V20h2V7.83l5.58 5.59L20 12l-8-8-8 8z"></path>
    </svg>
</div>


<!-- JavaScript Libraries -->
<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
{{--<script src="/js/bootstrap.min.js"></script>--}}
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>

<!-- Template Main Javascript File -->
<script src="{{ asset('js/main.js') }}"></script>

</body>
</html>
