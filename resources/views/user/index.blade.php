<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="Barnox Developer Adalah Developer website dan sistem berbasis website menggunakan Framework Laravel.">
    <meta name="author" content="Barnox">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
	<meta property="og:site_name" content="" /> <!-- website name -->
	<meta property="og:site" content="" /> <!-- website link -->
	<meta property="og:title" content=""/> <!-- title shown in the actual shared post -->
	<meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
	<meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
	<meta property="og:url" content="" /> <!-- where do you want your post to link to -->
	<meta property="og:type" content="article" />

    <!-- Website Title -->
    <title>E-Voting | Barnox Developer</title>
    
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,600,700,700i&amp;subset=latin-ext" rel="stylesheet">
    <link href="{{url('frontend/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{url('frontend/css/fontawesome-all.css')}}" rel="stylesheet">
    <link href="{{url('frontend/css/swiper.css')}}" rel="stylesheet">
	<link href="{{url('frontend/css/magnific-popup.css')}}" rel="stylesheet">
	<link href="{{url('frontend/css/styles.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Favicon  -->
    <link rel="icon" href="{{url('frontend/images/barnox.png')}}">
</head>
<body data-spy="scroll" data-target=".fixed-top">
    
    <!-- Preloader -->
	<div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <!-- end of preloader -->
    

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        <!-- Text Logo - Use this if you don't have a graphic logo -->
        <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Evolo</a> -->

        <!-- Image Logo -->
        <a class="navbar-brand logo-image" style="color: #000" href="index.html"><h4><span class="turquoise">BD | </span>Barnox Developer</h4></a>
        
        <!-- Mobile Menu Toggle Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-awesome fas fa-bars"></span>
            <span class="navbar-toggler-awesome fas fa-times"></span>
        </button>
        <!-- end of mobile menu toggle button -->

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#header">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#services">Services</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#about">About</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#contact">Contact</a>
                </li>
            </ul>
        </div>
    </nav> <!-- end of navbar -->
    <!-- end of navigation -->


    <!-- Header -->
    <header id="header" class="header">
        <div class="header-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="text-container">
                            {{-- alert email success --}}
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success m-2">
                                  <h5><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ $message }}</h5>
                                </div>
                            @endif
                            <h1><span class="turquoise">E-Voting </span> By. Barnox Developer</h1>
                            <p class="p-large">Aplikasi Pemilihan Ketua RT secara online</p>
                            <a class="btn-solid-lg page-scroll" href="{{ route('user-login') }}">Login untuk Voting</a>
                        </div> <!-- end of text-container -->
                    </div> <!-- end of col -->
                    <div class="col-lg-6">
                        <div class="image-container">
                            <img class="img-fluid" src="{{url('frontend/images/vote.svg')}}" alt="alternative">
                        </div> <!-- end of image-container -->
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </div> <!-- end of header-content -->
    </header> <!-- end of header -->
    <!-- end of header -->

    <!-- Services -->
    <div id="services" class="cards-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Business Growth Services</h2>
                    <p class="p-heading p-large">Kami melayani perusahaan kecil dan menengah di semua industri terkait teknologi dengan layanan pertumbuhan berkualitas tinggi yang disajikan di bawah ini.</p>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">

                    <!-- Card -->
                    <div class="card">
                        <img class="card-image" src="{{url('frontend/images/details-lightbox-2.svg')}}" alt="alternative">
                        <div class="card-body">
                            <h4 class="card-title">Membuat Website</h4>
                            <p>Kami mempunyai tim developer yang sudah berpelangaman dalam pembuatan website.</p>
                        </div>
                    </div>
                    <!-- end of card -->

                    <!-- Card -->
                    <div class="card">
                        <img class="card-image" src="{{url('frontend/images/edit.svg')}}" alt="alternative">
                        <div class="card-body">
                            <h4 class="card-title">Design</h4>
                            <p>Kami mempunyai tim developer yang sudah berpelangaman dalam pembuatan design logo, editing video, dan yang lainnya.</p>
                        </div>
                    </div>
                    <!-- end of card -->

                    <!-- Card -->
                    <div class="card">
                        <img class="card-image" src="{{url('frontend/images/laravel.svg')}}" alt="alternative">
                        <div class="card-body">
                            <h4 class="card-title">Pembuatan Sistem dengan Laravel</h4>
                            <p>Kami mempunyai tim developer yang sudah berpelangaman dalam pembuatan sistem dengan framework Laravel</p>
                        </div>
                    </div>
                    <!-- end of card -->
                    
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of cards-1 -->
    <!-- end of services -->


    <!-- Details 1 -->
    <div class="basic-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="text-container">
                        <h2>Design And Plan Your Business Growth Steps</h2>
                        <p>Use our staff and our expertise to design and plan your business growth strategy. Evolo team is eager to advise you on the best opportunities that you should look into</p>
                        {{-- <a class="btn-solid-reg popup-with-move-anim" href="#details-lightbox-1">LIGHTBOX</a> --}}
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-6">
                    <div class="image-container">
                        <img class="img-fluid" src="{{url('frontend/images/details-1-office-worker.svg')}}" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-1 -->
    <!-- end of details 1 -->

    
    <!-- Details 2 -->
    <div class="basic-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="image-container">
                        <img class="img-fluid" src="{{url('frontend/images/details-2-office-team-work.svg')}}" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
                <div class="col-lg-6">
                    <div class="text-container">
                        <h2>Search For Optimization Wherever Is Possible</h2>
                        <ul class="list-unstyled li-space-lg">
                            <li class="media">
                                <i class="fas fa-check"></i>
                                <div class="media-body">Basically we'll teach you step by step what you need to do</div>
                            </li>
                            <li class="media">
                                <i class="fas fa-check"></i>
                                <div class="media-body">In order to develop your company and reach new heights</div>
                            </li>
                            <li class="media">
                                <i class="fas fa-check"></i>
                                <div class="media-body">Everyone will be pleased from stakeholders to employees</div>
                            </li>
                        </ul>
                        {{-- <a class="btn-solid-reg popup-with-move-anim" href="#details-lightbox-2">LIGHTBOX</a> --}}
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-2 -->
    <!-- end of details 2 -->

    <!-- Details Lightboxes -->
    <!-- Details Lightbox 1 -->
	<div id="details-lightbox-1" class="lightbox-basic zoom-anim-dialog mfp-hide">
        <div class="container">
            <div class="row">
                <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                <div class="col-lg-8">
                    <div class="image-container">
                        <img class="img-fluid" src="{{url('frontend/images/details-lightbox-1.svg')}}" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
                <div class="col-lg-4">
                    <h3>Design And Plan</h3>
                    <hr>
                    <h5>Core feature</h5>
                    <p>The emailing module basically will speed up your email marketing operations while offering more subscriber control.</p>
                    <p>Do you need to build lists for your email campaigns? It just got easier with Evolo.</p>
                    <ul class="list-unstyled li-space-lg">
                        <li class="media">
                            <i class="fas fa-check"></i><div class="media-body">List building framework</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-check"></i><div class="media-body">Easy database browsing</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-check"></i><div class="media-body">User administration</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-check"></i><div class="media-body">Automate user signup</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-check"></i><div class="media-body">Quick formatting tools</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-check"></i><div class="media-body">Fast email checking</div>
                        </li>
                    </ul>
                    <a class="btn-solid-reg mfp-close page-scroll" href="#request">REQUEST</a> <a class="btn-outline-reg mfp-close as-button" href="#screenshots">BACK</a>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of lightbox-basic -->
    <!-- end of details lightbox 1 -->

    <!-- Details Lightbox 2 -->
	<div id="details-lightbox-2" class="lightbox-basic zoom-anim-dialog mfp-hide">
        <div class="container">
            <div class="row">
                <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                <div class="col-lg-8">
                    <div class="image-container">
                        <img class="img-fluid" src="{{url('frontend/images/details-lightbox-2.svg')}}" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
                <div class="col-lg-4">
                    <h3>Search To Optimize</h3>
                    <hr>
                    <h5>Core feature</h5>
                    <p>The emailing module basically will speed up your email marketing operations while offering more subscriber control.</p>
                    <p>Do you need to build lists for your email campaigns? It just got easier with Evolo.</p>
                    <ul class="list-unstyled li-space-lg">
                        <li class="media">
                            <i class="fas fa-check"></i><div class="media-body">List building framework</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-check"></i><div class="media-body">Easy database browsing</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-check"></i><div class="media-body">User administration</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-check"></i><div class="media-body">Automate user signup</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-check"></i><div class="media-body">Quick formatting tools</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-check"></i><div class="media-body">Fast email checking</div>
                        </li>
                    </ul>
                    <a class="btn-solid-reg mfp-close page-scroll" href="#request">REQUEST</a> <a class="btn-outline-reg mfp-close as-button" href="#screenshots">BACK</a>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of lightbox-basic -->
    <!-- end of details lightbox 2 -->
    <!-- end of details lightboxes -->

    <!-- About -->
    <div id="about" class="basic-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>About The Team</h2>
                    <p class="p-heading p-large">Tim Developer kami</p>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">

                    <!-- Team Member -->
                    <div class="team-member">
                        <div class="image-wrapper">
                            <img class="img-fluid" src="{{url('frontend/images/team-member-2.svg')}}" alt="alternative">
                        </div> <!-- end of image wrapper -->
                        <p class="p-large"><strong>Andre E.</strong></p>
                        <p class="job-title">Back End Developer</p>
                        <span class="social-icons">
                            <span class="fa-stack">
                                <a href="https://www.instagram.com/and_bintang22/">
                                    <i class="fas fa-circle fa-stack-2x facebook"></i>
                                    <i class="fab fa-instagram fa-stack-1x"></i>
                                </a>
                            </span>
                            <span class="fa-stack">
                                <a href="mailto:andreelm01@gmail.com">
                                    <i class="fas fa-circle fa-stack-2x twitter"></i>
                                    <i class="fab fa-google fa-stack-1x"></i>
                                </a>
                            </span>
                        </span> <!-- end of social-icons -->
                    </div> <!-- end of team-member -->
                    <!-- end of team member -->

                    <!-- Team Member -->
                    <div class="team-member">
                        <div class="image-wrapper">
                            <img class="img-fluid" src="{{url('frontend/images/team-member-3.svg')}}" alt="alternative">
                        </div> <!-- end of image wrapper -->
                        <p class="p-large"><strong>Umi A.</strong></p>
                        <p class="job-title">Frontend Developer</p>
                        <span class="social-icons">
                            <span class="fa-stack">
                                <a href="https://www.instagram.com/umiiatiyah">
                                    <i class="fas fa-circle fa-stack-2x facebook"></i>
                                    <i class="fab fa-instagram fa-stack-1x"></i>
                                </a>
                            </span>
                            <span class="fa-stack">
                                <a href="mailto:umiatiyah97@gmail.com">
                                    <i class="fas fa-circle fa-stack-2x twitter"></i>
                                    <i class="fab fa-twitter fa-stack-1x"></i>
                                </a>
                            </span>
                        </span> <!-- end of social-icons -->
                    </div> <!-- end of team-member -->
                    <!-- end of team member -->

                    <!-- Team Member -->
                    <div class="team-member">
                        <div class="image-wrapper">
                            <img class="img-fluid" src="{{url('frontend/images/team-member-2.svg')}}" alt="alternative">
                        </div> <!-- end of image wrapper -->
                        <p class="p-large"><strong>Fatoni M.</strong></p>
                        <p class="job-title">Designer</p>
                        <span class="social-icons">
                            <span class="fa-stack">
                                <a href="https://www.instagram.com/afarokun/">
                                    <i class="fas fa-circle fa-stack-2x facebook"></i>
                                    <i class="fab fa-instagram fa-stack-1x"></i>
                                </a>
                            </span>
                            <span class="fa-stack">
                                <a href="mailto:ahmadfatoni169@gmail.com">
                                    <i class="fas fa-circle fa-stack-2x twitter"></i>
                                    <i class="fab fa-google fa-stack-1x"></i>
                                </a>
                            </span>
                        </span> <!-- end of social-icons -->
                    </div> <!-- end of team-member -->
                    <!-- end of team member -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-4 -->
    <!-- end of about -->


    <!-- Contact -->
    <div id="contact" class="form-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Contact Information</h2>
                    <ul class="list-unstyled li-space-lg">
                        <li class="address">Jangan ragu untuk menelepon kami atau mengirimkan pesan formulir kontak kepada kami</li>
                        <li><i class="fa fa-whatsapp turquoise"></i>&nbsp;<a class="turquoise" href="whatsapp://send?text=Hello%20BarnoxDeveloper&phone=+6285156833797">+6285156833797</a></li>
                        <li><i class="fa fa-envelope turquoise"></i>&nbsp;<a class="turquoise" href="mailto:barnoxdev@gmail.com">barnoxdev@gmail.com</a></li>
                    </ul>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">
                    <!-- Contact Form -->
                    <form action="{{ url('/send-email') }}" method="POST" {{-- id="contactForm" --}} data-toggle="validator" data-focus="false">
                        @csrf
                        <div class="form-group">
                            {{-- penerima --}}
                            <input type="hidden" required="" name="penerima" readonly="" value="barnoxdev@gmail.com">
                            <input type="text" class="form-control-input" name="nama" id="cname" required>
                            <label class="label-control" for="cname">Name</label>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <input type="email" required="" class="form-control-input" name="email" id="cemail" required>
                            <label class="label-control" for="cemail">Email</label>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control-textarea" required="" name="isi" id="cmessage" required></textarea>
                            <label class="label-control" for="cmessage">Your message</label>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-info"><i class="fa fa-paper-plane"></i> SUBMIT MESSAGE</button>
                        </div>
                        <div class="form-message">
                            <div id="cmsgSubmit" class="h3 text-center hidden"></div>
                        </div>
                    </form>
                    <!-- end of contact form -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of form-2 -->
    <!-- end of contact -->


    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="footer-col">
                        <h4>About Barnox Developer</h4>
                        <p>Kami bersemangat untuk menawarkan beberapa layanan pertumbuhan bisnis terbaik untuk para pelanggan</p>
                    </div>
                </div> <!-- end of col -->
                <div class="col-md-6">
                    <div class="footer-col last">
                        <h4>Social Media</h4>
                        {{-- <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-facebook-f fa-stack-1x"></i>
                            </a>
                        </span> --}}
                        <!-- <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-twitter fa-stack-1x"></i>
                            </a>
                        </span> -->
                        <span class="fa-stack">
                            <a href="mailto:barnoxdev@gmail.com">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-google fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="https://www.instagram.com/afarokun/">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-instagram fa-stack-1x"></i>
                            </a>
                        </span>
                        <!-- <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-linkedin-in fa-stack-1x"></i>
                            </a>
                        </span> -->
                    </div> 
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of footer -->  
    <!-- end of footer -->


    <!-- Copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="p-small">Copyright © 2020 <a href="https://inovatik.com">Inovatik</a> - All rights reserved<br>
                    Modify by <a href="mailto:barnoxdev@gmail.com">Barnox Developer</a>
                    </p>
                </div> <!-- end of col -->
            </div> <!-- enf of row -->
        </div> <!-- end of container -->
    </div> <!-- end of copyright --> 
    <!-- end of copyright -->
    
    	
    <!-- Scripts -->
    <script src="{{ url('frontend/js/jquery.min.js')}}"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="{{ url('frontend/js/popper.min.js')}}"></script> <!-- Popper tooltip library for Bootstrap -->
    <script src="{{ url('frontend/js/bootstrap.min.js')}}"></script> <!-- Bootstrap framework -->
    <script src="{{ url('frontend/js/jquery.easing.min.js')}}"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="{{ url('frontend/js/swiper.min.js')}}"></script> <!-- Swiper for image and text sliders -->
    <script src="{{ url('frontend/js/jquery.magnific-popup.js')}}"></script> <!-- Magnific Popup for lightboxes -->
    <script src="{{ url('frontend/js/validator.min.js')}}"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
    <script src="{{ url('frontend/js/scripts.js')}}"></script> <!-- Custom scripts -->
</body>
</html>