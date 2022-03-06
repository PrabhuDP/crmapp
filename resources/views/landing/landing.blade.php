<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Phonix CRM</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <!-- App css -->
        <link href="{{ asset('assets/css/icons.min.css' ) }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/custom/css/effect.css' ) }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/app-creative.min.css') }}" rel="stylesheet" type="text/css" id="light-style" />
        <link href="{{ asset('assets/css/app-creative-dark.min.css') }}" rel="stylesheet" type="text/css" id="dark-style" />        

        <style>
            .btn-primary {
                background-image: linear-gradient(to right, #00c6ff 0%, #006BDF 51%, #00c6ff 100%);
                background-size: 200% auto;
                color: white !important;
                box-shadow: 2px 4px 10px 0px rgb(0 0 0 / 20%);
                transition: all .5s !important;
                font-weight: 500 !important;
                padding: 11px 25px !important;
                font-size: 1rem !important;
                }
                .btn-primary:hover {
                background-position: right center;
                transition: 0.5s;
                }

                .btn-dark {
                background-image: linear-gradient(to right, #517fa4 0%, #243949 51%, #517fa4 100%);
                background-size: 200% auto;
                color: white !important;
                box-shadow: 2px 4px 10px 0px rgb(0 0 0 / 20%);
                transition: all .5s !important;
                font-weight: 500 !important;
                padding: 11px 25px !important;
                font-size: 1rem !important;

                }
                .btn-dark:hover {
                background-position: right center;
                transition: 0.5s;
                }
            @media screen and (max-width: 980px) {
                .contact-card {
                    position: unset !important;
                    transform: translate(0,0) !important;
                    width: 100% !important;
                }
                .padding-left-250 {
                    padding-left: 35px !important
                }
            }
            .contact-card {
                transform: translate(-240px,80px);
                z-index: 1;
                color: white;
                width: 450px;
                top:0%;
                left: 0%
            }
            .padding-left-250 {
                padding:35px 35px 35px 250px ;
            }
            .bg-trans {
                background:  transparent !important;
            }
            .fa-lg {
                font-size: 28px;
                padding: 5px;
                border: 2px solid;
                margin-right: 15px;
                border-radius: 10px
            }
            .border-bottom-input {
                border-top: none !important;
                border-right: none !important;
                border-left: none !important;
                border-radius: 0 !important;
                border-bottom: 1px solid #ffffff17 !important
            }
            label.error {
                font-size: 10px;
                color: red;
                position: absolute;
                right: 0%;
                bottom: -21px
            }
            .rounded-5 {
                border-radius: 30px !important
            }
           .carousel-caption {
               left: 50% !important;
               top: 50% !important;
               transform: translate(-50%,-50%) !important;
               width: 100%;
               text-align: center !important
           }
        </style>
    </head>

    <body class="loading" data-layout-config='{"darkMode":false}'>

        <!-- NAVBAR START -->
        <nav class="navbar navbar-expand-lg p-0 bg-dark-50 sticky-top w-100" id="top-navbar-animated">
            <div class="container">
                <!-- logo -->
                <a href="#" class="navbar-brand me-lg-5 ">
                    <img src="{{ asset('assets/images/logo/logo-color.png') }}"     class="logo-dark" width="300px"  />
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="mdi text-white mdi-menu" style="text-shadow: 0 2px black;"></i>
                </button>

                <!-- menus -->
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    {{-- <ul class="navbar-nav mx-auto py-2 align-items-center"> 
                        <li class="nav-item mx-lg-1 text-center">
                            <a href="javascript: void(0);" class="social-list-item border text-white"><i class="mdi mdi-facebook"></i></a>
                        </li>
                        <li class="nav-item mx-lg-1 text-center">
                            <a href="javascript: void(0);" class="social-list-item border text-white"><i class="mdi mdi-instagram"></i></a>
                        </li>
                        <li class="nav-item mx-lg-1 text-center">
                            <a href="javascript: void(0);" class="social-list-item border text-white"><i class="mdi mdi-twitter"></i></a>
                        </li>
                        <li class="nav-item mx-lg-1 text-center">
                            <a href="javascript: void(0);" class="social-list-item border text-white"><i class="mdi mdi-google"></i></a>
                        </li>  
                    </ul>  --}}
                    <!-- left menu -->
                    <ul class="navbar-nav ms-auto py-2 align-items-center"> 
                        <li class="nav-item mx-lg-1">
                            <a class="nav-link text-white active" href="#">Home</a>
                        </li>
                        <li class="nav-item mx-lg-1">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item mx-lg-1">
                            <a class="nav-link" href="#">Blog</a>
                        </li>
                        <li class="nav-item mx-lg-1">
                            <a class="nav-link" href="#">Contact us</a>
                        </li>
                        <li class="nav-item me-0 ms-3">
                            <a href="https://themes.getbootstrap.com/product/hyper-responsive-admin-dashboard-template/" target="_blank" class="nav-link d-lg-none">Purchase now</a>
                            <a href="login" target="_blank" class="btn btn-sm btn-primary rounded-pill d-none d-lg-inline-flex">
                                <i class="mdi mdi-login-variant me-2"></i> LOGIN
                            </a>
                        </li>
                    </ul> 

                </div>
            </div>
        </nav>
        <!-- NAVBAR END -->

        <!-- START HERO -->  
        <div id="LandingBannnerSliders" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <div class="slider-img w-100" style="min-height: 70vh;background: linear-gradient( #020202c9 50%, #00d9ff34) , url('https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1115&q=80');background-size:cover"></div>
                    <div class="carousel-caption">
                        <div>
                            <span class="ms-1">Welcome to Brand <span class="badge bg-danger rounded-pill">New</span></span>
                        </div>
                        <h2 class="fw-normal text-white mb-4 mt-3 hero-title">
                            Phoenix - Customer relationship management system 
                        </h2>
                        <p class="mb-4 w-75 mx-auto font-16 text-light">Phoenix CRM is a fully featured  with business or other organization administers its interactions with customers, typically using data analysis to study large amounts of information.</p>
                        <a href="#" class="btn btn-primary rounded-pill">Get Started</a>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="slider-img w-100" style="min-height: 70vh;background: linear-gradient( #020202c9 50%, #00d9ff34) , url('https://images.unsplash.com/photo-1599658880436-c61792e70672?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80');background-size:cover"></div>
                    <div class="carousel-caption">
                        <div>
                            <span class="ms-1">Welcome to Brand <span class="badge bg-danger rounded-pill">New</span></span>
                        </div>
                        <h2 class="fw-normal text-white mb-4 mt-3 hero-title">
                            Phoenix - Customer relationship management system 
                        </h2>
                        <p class="mb-4  w-75 mx-auto font-16 text-light">Phoenix CRM is a fully featured  with business or other organization administers its interactions with customers, typically using data analysis to study large amounts of information.</p>
                            <a href="#" class="btn btn-primary rounded-pill">Get Started</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="slider-img w-100" style="min-height: 70vh;background: linear-gradient( #020202c9 50%, #00d9ff34) , url('https://images.unsplash.com/photo-1504868584819-f8e8b4b6d7e3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1176&q=80');background-size:cover"></div>
                    <div class="carousel-caption">
                        <div>
                            <span class="ms-1">Welcome to Brand <span class="badge bg-danger rounded-pill">New</span></span>
                        </div>
                        <h2 class="fw-normal text-white mb-4 mt-3 hero-title">
                            Phoenix - Customer relationship management system 
                        </h2>
                        <p class="mb-4  w-75 mx-auto font-16 text-light">Phoenix CRM is a fully featured  with business or other organization administers its interactions with customers, typically using data analysis to study large amounts of information.</p>
                         <a href="#" class="btn btn-primary rounded-pill">Get Started</a>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#LandingBannnerSliders" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#LandingBannnerSliders" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div> 
        <!-- END HERO -->
         <!-- START FEATURES 2 -->
      
         <section class="py-5">
            <div class="container"> 
                <div class="row pb-3 pt-5 align-items-center">
                    <div class="col-lg-6 col-md-5">
                        <h3 class="aos-init" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000">Who We are?</h3>
                        <div class="mt-4">
                            <p class="text-muted mb-3 aos-init"data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1200">Phoenix  CRM was originally designed to minimize the pain points of managing Small and Medium-Sized Companies with regards to Clients, Employees, and Finances.</p>
                            <p class="text-muted mb-3 aos-init"data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1400"> The Core Brain behind the development of Phoenix  CRM is having a huge experience in handling clients with regards to multiple industries and he found that most of the startup, small and medium scale companies are lagging in maintaining their own customers, new leads, followups with them, invoice tracking, finances and many other minor things which are affecting their business in a huge way. They are losing so many potential clients as well as their existing clients in the long run.</p>
                            <p class="text-muted mb-3 aos-init"data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1600"> Hence, we produced a system that will help them to overcome all these growth hurdles in their business and help them to reach the next level in their Business.</p>
                            <p class="text-muted mb-3 aos-init"data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1800"> Phoenix  CRM CRM(solidperformers.com) is owned by Phoenix  CRM Private Limited. We are a B2B Platform offering solutions only to Corporate Businesses of all sizes.</p>
                        </div>
                        <a href="#" class="btn btn-primary rounded-pill mt-3 aos-init" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="2000">Know More <i class="mdi mdi-arrow-right ms-1"></i></a>
                    </div>
                    <div class="col-lg-5 col-md-6 offset-md-1">
                        <div class="aos-init"  data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="2000" >
                            <img src="{{ asset('assets/images/about.png') }}" class="img-fluid"  alt="">
                        </div>
                    </div>
                </div> 
            </div>
            </section>
        <!-- END FEATURES 2 -->   

        <section class="py-5 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="section-head text-center">
                            <h1 class="text-primary">CRM Features</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <!-- InfoBox Left  <Start> -->
                        <div class="text-center mt-4 aos-init" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
                            <img src="https://phpstack-543502-1740558.cloudwaysapps.com/ohdearcrm/images/icn1.svg" alt="" class="img-fluid">
                            <h4 class="text-primary">Quality Resources</h4>
                            <p>Sed ut perspiciatis remque laudan unde omnis iste natus error sit voluptatem accusantium dolo remque laudan tiuotam.</p>
                        </div>
                        <!-- InfoBox Left </End> -->
                    </div>
                    <div class="col-md-4">
                        <!-- InfoBox Center  <Start> -->
                        <div class="text-center mt-4 aos-init" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1200">
                            <img src="https://phpstack-543502-1740558.cloudwaysapps.com/ohdearcrm/images/icn2.svg" alt="" class="img-fluid">
                            <h4 class="text-primary">At solmen va esser</h4>
                            <p>Sed ut perspiciatis remque laudan unde omnis iste natus error sit voluptatem accusantium dolo remque laudan tiuotam.</p>
                        </div>
                        <!-- InfoBox Center </End> -->
                    </div>
                    <div class="col-md-4">
                        <!-- InfoBox Center  <Start> -->
                        <div class="text-center mt-4 aos-init" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1400">
                            <img src="https://phpstack-543502-1740558.cloudwaysapps.com/ohdearcrm/images/icn1.svg" alt="" class="img-fluid">
                            <h4 class="text-primary">Pronunciation sommun</h4>
                            <p>Sed ut perspiciatis remque laudan unde omnis iste natus error sit voluptatem accusantium dolo remque laudan tiuotam.</p>
                        </div>
                        <!-- InfoBox Center </End> -->
                    </div>
                    <div class="col-md-4">
                        <!-- InfoBox Center  <Start> -->
                        <div class="text-center mt-4 aos-init" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1600">
                            <img src="https://phpstack-543502-1740558.cloudwaysapps.com/ohdearcrm/images/icn3.svg" alt="" class="img-fluid">
                            <h4 class="text-primary">Uniform Grammatica</h4>
                            <p>Sed ut perspiciatis remque laudan unde omnis iste natus error sit voluptatem accusantium dolo remque laudan tiuotam.</p>
                        </div>
                        <!-- InfoBox Center </End> -->
                    </div>
                    <div class="col-md-4">
                        <!-- InfoBox Center  <Start> -->
                        <div class="text-center mt-4 aos-init" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1800">
                            <img src="https://phpstack-543502-1740558.cloudwaysapps.com/ohdearcrm/images/icn4.svg" alt="" class="img-fluid">
                            <h4 class="text-primary">Omnicos al desirabilite</h4>
                            <p>Sed ut perspiciatis remque laudan unde omnis iste natus error sit voluptatem accusantium dolo remque laudan tiuotam.</p>
                        </div>
                        <!-- InfoBox Center </End> -->
                    </div>
                    <div class="col-md-4">
                        <!-- InfoBox Center  <Start> -->
                        <div class="text-center mt-4 aos-init" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="2000">
                            <img src="https://phpstack-543502-1740558.cloudwaysapps.com/ohdearcrm/images/icn5.svg" alt="" class="img-fluid">
                            <h4 class="text-primary">Commun Vocabules</h4>
                            <p>Sed ut perspiciatis remque laudan unde omnis iste natus error sit voluptatem accusantium dolo remque laudan tiuotam.</p>
                        </div>
                        <!-- InfoBox Center </End> -->
                    </div>
                </div>
            </div>
        </section> 


        <section class="py-5 text-center " style="background: url('{{ asset('/assets/images/landnig-bg.png') }}');background-size:cover">
            <div class="media-body"> 
                <h3 data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000"  class="aos-init text-white display-5">Want to try CRM Software for Free?</h3>
                <p  data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1400" class="text-light my-4 mt-3 lead">Close more deals than ever, automatice lead captures,in-built phone,smart alerts with push notifcations.</p>
                <div class="aos-init " data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1800" >
                    <a href="#" class="aos-init btn btn-success px-md-5 py-2 rounded-pill"><b>Register Now !</b></a>
                </div>
            </div>
        </section>
   
        <section class="py-5 ">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="section-head text-center">
                            <h1 class="text-primary aos-init" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000">Latest Blogs</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 p-md-3">
                        <!-- InfoBox Left  <Start> -->
                        <div class="mt-4 shadow aos-init" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
                            <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="" class="img-fluid blog-img mb-2">
                            <div class="card-body">
                                <h4 class="text-primary">Quality Resources</h4>
                                <p>Sed ut perspiciatis remque laudan unde omnis iste natus error sit voluptatem accusantium dolo remque laudan tiuotam.</p>
                                <a href="#" class="rounded-pill btn btn-outline-primary"><b>Read More..</b></a>
                            </div>
                        </div>
                        <!-- InfoBox Left </End> -->
                    </div>
                    <div class="col-md-4 p-md-3">
                        <!-- InfoBox Center  <Start> -->
                        <div class="mt-4 shadow aos-init" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1200">
                            <img src="https://images.unsplash.com/photo-1599658880436-c61792e70672?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="" class="img-fluid blog-img mb-2">
                            <div class="card-body">
                                <h4 class="text-primary">At solmen va esser</h4>
                                <p>Sed ut perspiciatis remque laudan unde omnis iste natus error sit voluptatem accusantium dolo remque laudan tiuotam.</p>
                                <a href="#" class="rounded-pill btn btn-outline-primary"><b>Read More..</b></a>
                            </div>
                        </div>
                        <!-- InfoBox Center </End> -->
                    </div>
                    <div class="col-md-4 p-md-3">
                        <!-- InfoBox Center  <Start> -->
                        <div class="mt-4 shadow aos-init" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1400">
                            <img src="https://images.unsplash.com/photo-1608222351212-18fe0ec7b13b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1074&q=80" alt="" class="img-fluid blog-img mb-2">
                            <div class="card-body">
                                <h4 class="text-primary">Pronunciation sommun</h4>
                                <p>Sed ut perspiciatis remque laudan unde omnis iste natus error sit voluptatem accusantium dolo remque laudan tiuotam.</p>
                                <a href="#" class="rounded-pill btn btn-outline-primary"><b>Read More..</b></a>
                            </div>
                        </div>
                        <!-- InfoBox Center </End> -->
                    </div>
                     
                </div>
            </div>
        </section> 

        <section class=" py-5 bg-light"> 
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-9 h-100 ms-auto position-relative p-0">
                        <div class="card position-absolute contact-card rounded-5"  style="background: linear-gradient( #020202c9 50%, #00d9ff34) , url('https://poetsandquants.com/wp-content/uploads/sites/5/2021/12/analytics.jpg');background-size:cover">
                            <div class="card-body p-4">
                                <h1>Request a call back</h1>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae optio, maxime illo nisi distinctio, error temporibus</p>
                                <div class="py-4">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="text-primary mdi mdi-phone-in-talk fa-lg"></div>
                                        <div>
                                            <strong>Call US</strong>
                                            <div>+91 98745 61230</div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="text-primary mdi mdi-email fa-lg"></div>
                                        <div>
                                            <strong>Mail US</strong>
                                            <div>info@phoenix.crm.com </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="text-primary mdi mdi-map-marker fa-lg"></div>
                                        <div>
                                            <strong>Call US</strong>
                                            <div>N.34/21 , New street , chennai-60001</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card h-100 padding-left-250" style="min-height: 80vh">
                            <div class="card-body py-lg-5" >
                                <div class="px-2">
                                    <h3 class="h3">CONTACT US</h3>
                                    <p>Enter your details to receive a call back from us</p>
                                </div>
                                @include('landing.enquiry')
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </section>
          
        <section class="py-5">
            <div class="container">
                <div class="row align-items-center m-0">
                    <div class="col-md">
                        <h3 class="h3"  class="aos-init" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
                            Subscribe with us get the newsletter
                        </h3>
                    </div>
                    <div class="col-md-6">
                        <div class="btn-group border shadow-sm rounded w-100 aos-init" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1200">
                            <div class="w-100 bg-white">
                                <input class="form-control  border-0 rounded-0  w-100 p-3" type="text" id="subject" placeholder="Enter your email...">
                            </div>
                            <div class="">
                                <button type="submit" class=" border-0 rounded-0 btn h-100 btn-primary p-3">Subscribe</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer class="py-5 text-center " style="background: linear-gradient(#020202e0 50%, #00d9ff34) , url('https://images.unsplash.com/photo-1587560699334-cc4ff634909a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80');background-size:cover;backdrop-filter:blur(5px)">
            <div class="container">
                <div class="row justify-content-center align-items-center" >
                    <div class="col-md-12 text-center">
                        {{-- <img src="assets/images/logo.png" alt="" class="logo-dark" height="18" /> --}}
                        
                        <div class="aos-init"  data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1400">
                            <strong class="text-white"> PHOENIX</strong>
                        </div>
                        <p class="text-white mt-4 aos-init" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1500">PHOENIX TECH makes it easier to build better websites with
                            <br> great speed. Save hundreds of hours of design
                            <br> and development by using it.</p>

                        <div class="aos-init"  data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="2000">
                            <strong class="text-primary">Follow Us On Social...</strong>
                            <ul class="social-list list-inline mt-3">
                                <li class="list-inline-item text-center">
                                    <a href="javascript: void(0);" class="social-list-item border-primary text-white btn-outline-primary"><i class="mdi mdi-facebook"></i></a>
                                </li>
                                <li class="list-inline-item text-center">
                                    <a href="javascript: void(0);" class="social-list-item border-primary text-white btn-outline-primary"><i class="mdi mdi-google"></i></a>
                                </li>
                                <li class="list-inline-item text-center">
                                    <a href="javascript: void(0);" class="social-list-item border-primary text-white btn-outline-primary"><i class="mdi mdi-twitter"></i></a>
                                </li>
                                <li class="list-inline-item text-center">
                                    <a href="javascript: void(0);" class="social-list-item border-primary text-white btn-outline-primary"><i class="mdi mdi-github"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>  
                    
                    <div class="col-12 text-center">
                        <div class="aos-init"  data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="2400">
                            <ul class="list-unstyled justify-content-center d-flex ps-0 mb-0 mt-3">
                                <li class="m-2"><a href="javascript: void(0);" class="text-light">About Us</a></li>
                                <li class="m-2"><a href="javascript: void(0);" class="text-light">Price</a></li>
                                <li class="m-2"><a href="javascript: void(0);" class="text-light">Blog</a></li>
                                <li class="m-2"><a href="javascript: void(0);" class="text-light">Contact us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                    
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mt-5">
                            <p class="text-light mt-4 text-center mb-0">{{ $copyrights ?? '© 2022 - 2023 PHOENIX. Design and coded by
                                DuraiBytes' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- bundle -->
        <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
        <script src="{{ asset('assets/js/app.min.js') }}"></script>
        <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            $(".enquiry-form").validate({
            submitHandler:function(form) {
                $.ajax({
                    url: form.action,
                    type: form.method,
                    data: $(form).serialize(),
                    beforeSend: function() {
                        $('#error').removeClass('alert alert-danger');
                        $('#error').html('');
                        $('#error').removeClass('alert alert-success');
                        $('#save').html('Loading...');
                    },
                    success: function(response) {
                        $('#save').html('Save');
                        if(response.error.length > 0 && response.status == "1" ) {
                            $('#error').addClass('alert alert-danger');
                            response.error.forEach(display_errors);
                        } else {
                            $('#error').addClass('alert alert-success');
                            response.error.forEach(display_errors);
                            setTimeout(function(){
                                location.reload();
                            },100);
                        }
                    }            
                });
            }
        });

        function display_errors( item, index) {
            $('#error').append('<div>'+item+'</div>');
        }
        </script>
        <script>
            $(window).scroll(function(){
                if ($(this).scrollTop() > 100) {
                $('#top-navbar-animated').addClass('bg-dark-50');
                } else {
                $('#top-navbar-animated').removeClass('bg-dark-50');
                }
            });
        </script>
        <script>
            AOS.init();
          </script>
    </body>

</html>