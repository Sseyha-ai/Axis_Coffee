{{-- @dd(auth()->user()->position) --}}



@extends('layouts.app')
@section('title','hompage')
@section('content')
<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        {{-- <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Carousel</h2>
                    <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">UI Elements</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Carousel</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- ============================================================== -->
        <!-- end pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- ============================================================== -->
            <!--  slides only  -->
            <!-- ============================================================== -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h1 class="card-header">WELCOME TO AXIS COFFEE</h1>
                    <div class="card-body">
                        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" style="height: 600px" src="{{asset('admin/assets/images/axis/pic5.jpg')}}" alt="First slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" style="height: 600px" src="{{asset('admin/assets/images/axis/pic6.jpg')}}" alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" style="height: 600px" src="{{asset('admin/assets/images/axis/pic7.jpg')}}" alt="Third slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" style="height: 600px" src="{{asset('admin/assets/images/axis/pic11.jpg')}}" alt="Third slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" style="height: 600px" src="{{asset('admin/assets/images/axis/pic12.jpg')}}" alt="Third slide">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!--  end slides only  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!--  slides with control  -->
            <!-- ============================================================== -->
            {{-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Slides with Controls</h5>
                    <div class="card-body">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100 h-25" src="{{asset('admin/assets/images/axis/pic1.jpg')}}" alt="First slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100 h-25" src="{{asset('admin/assets/images/axis/pic2.jpg')}}" alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" style="height: 1000px" src="{{asset('admin/assets/images/axis/pic3.jpg')}}" alt="Third slide">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                           <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                 <span class="sr-only">Previous</span>   </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                               <span class="carousel-control-next-icon" aria-hidden="true"></span>
                           <span class="sr-only">Next</span>  </a>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- ============================================================== -->
            <!--  end slides with control  -->
            <!-- ============================================================== -->
        </div>

        {{-- <div class="row">
            <!-- ============================================================== -->
            <!--  slides with indicator  -->
            <!-- ============================================================== -->
            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Slides with Indicators</h5>
                    <div class="card-body">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="../assets/images/card-img-1.jpg" alt="First slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="../assets/images/card-img-2.jpg" alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="../assets/images/card-img-3.jpg" alt="Third slide">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                               <span class="sr-only">Previous</span>  </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>  </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end slides with indicator  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!--  slides with control  -->
            <!-- ============================================================== -->
            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Slides with Captions</h5>
                    <div class="card-body">
                        <div id="carouselExampleIndicators1" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators1" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators1" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators1" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="../assets/images/card-img-1.jpg" alt="First slide">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h3 class="text-white">Heading Title Carousel</h3>
                                        <p>Mauris fermentum elementum ligula in efficitur. Aliquam id congue lorem. Proin consectetur feugiat enim ut luctus. Aliquam pellentesque ut tellus ultricies bibendum.</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="../assets/images/card-img-2.jpg" alt="Second slide">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h3 class="text-white">Heading Title Carousel</h3>
                                        <p>Mauris fermentum elementum ligula in efficitur. Aliquam id congue lorem. Proin consectetur feugiat enim ut luctus. Aliquam pellentesque ut tellus ultricies bibendum.</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="../assets/images/card-img-3.jpg" alt="Third slide">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h3 class="text-white">Heading Title Carousel</h3>
                                        <p>Mauris fermentum elementum ligula in efficitur. Aliquam id congue lorem. Proin consectetur feugiat enim ut luctus. Aliquam pellentesque ut tellus ultricies bibendum.</p>
                                    </div>
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators1" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                               <span class="sr-only">Previous</span>  </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators1" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>  </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!--  end slides with indicator  -->
            <!-- ============================================================== -->
        </div> --}}
    </div>
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    {{-- <div class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    Copyright © 2018 Concept. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Colorlib</a>.
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="text-md-right footer-links d-none d-sm-block">
                        <a href="javascript: void(0);">About</a>
                        <a href="javascript: void(0);">Support</a>
                        <a href="javascript: void(0);">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- ============================================================== -->
    <!-- end footer -->
    <!-- ============================================================== -->
</div>
@endsection









