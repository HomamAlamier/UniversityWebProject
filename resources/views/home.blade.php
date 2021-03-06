<!DOCTYPE html>
<html>
    <head>
        <title>
            Home Page
        </title>
        <meta charset="utf-8">
        <meta property="og:title" content="Home Page" />
        <meta property="og:site_name" content="main-laraveltests"/>
        <meta property="og:description" content="Welcome to main-laraveltests main page..." />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}" >
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/main-interface.css') }}">

    </head>

    <body>

        
          <!-- start navbar -->
        
          <nav class="navbar navbar-expand-lg navbar-light fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <span>Galaxy</span><span>Market</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-nav" aria-controls="main-nav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                <div class="collapse navbar-collapse" id="main-nav">
                  <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                      <a class="nav-link active" href="#"><i class="fa fa-home fa-x5"></i> Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link  " href="search.html"> <i class="fa fa-product-hunt fa-x5"></i> Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../basic interfaces/customer-login.html"><i class="fa fa-arrow-right" aria-hidden="true"></i> Rigester </a> 
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="cart.html"> <i class="fa fa-shopping-basket fa-x5"></i> cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/login"><i class="fa fa-user fa-x5"></i> Account </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" onclick="logout()" style="display: <?php echo ((session('userID') == null || session('userID') == 0) ? 'none;' : 'block;'); ?>"><i class="fa fa-reply fa-x5"></i> Logout </a>
                    </li>
                  </ul>
                </div>
            </div>
        </nav>

        <!-- end navbar -->

        <!-- start upper-bar -->
        <div class="upper-bar">
            <div class="container">
                <div class="row">
                    <div class="info col-sm text-center text-sm-left">
                        <div class="input-group mb-3 wow animate__bounceInLeft" data-wow-duration="2s" data-wow-delay=".1s">
                            <div class="input-group-prepend">
                              <button class="btn btn-outline-info" type="button"><i class="fa fa-search"></i></button>
                            </div>
                            <input type="search" class="form-control" placeholder="What are you looking for" aria-label="" aria-describedby="basic-addon1" size="100">
                        </div>
                    </div>
    
                    <div class="info col-sm text-center text-sm-right wow animate__bounceInRight" data-wow-duration="2s" data-wow-delay=".1s">
                        <ul class="list-unstyled">
                            <li>
                                 <a href="#" class="facebook" > <i class="fa fa-facebook fa-x4"></i> </a>
                            </li>
                            <li>
                                 <a href="#" class="google" > <i class="fa fa-google-plus fa-x4"></i> </a>
                            </li>
                            <li>
                                 <a href="#" class="youtupe" > <i class="fa fa-youtube fa-x4"></i> </a>
                            </li>
                            <li>
                                 <a href="#" class="instagram" > <i class="fa fa-instagram fa-x4"></i> </a>
                            </li>
                            <li>
                                 <a href="#" class="pinterset" > <i class="fa fa-pinterest fa-x4"></i> </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <!-- end upper-bar -->

       

        <!-- start image slider -->

        <div class="slide">
            <div class="overlay"></div>
            <div class="c">
                <div id="slider" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider" data-slid-to="0" class="active" ></li>
                        <li data-target="#slider" data-slid-to="1"  ></li>
                        <li data-target="#slider" data-slid-to="2"  ></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('media/slide-1.jpg') }}" alt="...">     
                            <div class="carousel-caption d-none d-block " >
                                <h5>Galaxy Market</h5>
                                <p>The best choice for shopping in Syria, easy, fast, reliable, safe,</p>
                                <button type="button"> Read More </button> 
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('media/slide-2.jpg') }}" alt="...">   
                            <div class="carousel-caption d-none d-block">
                                <h5>Galaxy Market </h5>
                                <p>Now you can shop from anywhere you want as easily as possible</p>
                                <button type="button"> Read More </button> 
                            </div>
                        </div>
                         <div class="carousel-item">
                            <img src="{{ asset('media/slide-3.jpg') }}" alt="...">
                            <div class="carousel-caption d-none d-block">
                                <h5>Galaxy Market</h5>
                                <button type="button"> Read More </button>                            
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#slider" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#slider" role="button" data-slide="prev">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                    </a>
                </div>  
            </div>   
        </div>
    <!-- end image slider -->

    <!-- start filter product  -->
    <div class="filter-product">
        <div class="container">
            <h2 class="text-center text-capitalize">Products you like<span>.</span> </h2>
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="card wow animate__bounceInLeft" data-wow-duration="2s" data-wow-delay=".1s">
                        <img class="card-img-top" src="{{ asset('media/card1.jpg') }}" alt="Card image cap">
                        <div class="body">
                            <h4 class="card-title">product name</h4>
                            <h6 class="card-subtitle mb-2 text-muted">123000 <span>S.P</span></h6>
                            <p class="card-text">Some quick example text to build on the product name</p>
                            <div class="rating">
                                <ul id="stars" class="list-unstyled">
                                    <li class="star" data-value='1' title="poor">
                                        <i class="fa fa-star fa-lg"></i>
                                    </li>
                                    <li class="star" data-value='2' title="bad">
                                        <i class="fa fa-star fa-lg"></i>
                                    </li>
                                    <li class="star" data-value='3' title="Good">
                                        <i class="fa fa-star fa-lg"></i>
                                    </li>
                                    <li class="star" data-value='4' title="Excellent">
                                        <i class="fa fa-star fa-lg"></i>
                                    </li>
                                    <li class="star" data-value='5' title="very Excellent">
                                        <i class="fa fa-star fa-lg"></i>
                                    </li>
                                    <li class="star" style="margin-left: -3px;  color: #777; font-size: 12px;">
                                        (4.5)
                                    </li>
                                </ul>
                            </div>
                            <div class="card-footer">
                                <a href="#" class="card-link Add-to-cart">Add To Card</a>
                                <a href="info-product.html" class="card-link info-product">Info</a>  
                            </div>

                        </div>
                    </div>
                </div>

                    <div class="col-md-4 col-sm-12">
                        <div class="card wow animate__bounceInUp" data-wow-duration="2s" data-wow-delay=".1s">
                            <img class="card-img-top" src="{{ asset('media/card2.jp') }}" alt="Card image cap">
                            <div class="body">
                                <h4 class="card-title">product name</h4>
                                <h6 class="card-subtitle mb-2 text-muted">123000 <span>S.P</span></h6>
                                <p class="card-text">Some quick example text to build on the product name</p>
                                <div class="rating">
                                    <ul id="stars" class="list-unstyled">
                                        <li class="star" data-value='1' title="poor">
                                            <i class="fa fa-star fa-lg"></i>
                                        </li>
                                        <li class="star" data-value='2' title="bad">
                                            <i class="fa fa-star fa-lg"></i>
                                        </li>
                                        <li class="star" data-value='3' title="Good">
                                            <i class="fa fa-star fa-lg"></i>
                                        </li>
                                        <li class="star" data-value='4' title="Excellent">
                                            <i class="fa fa-star fa-lg"></i>
                                        </li>
                                        <li class="star" data-value='5' title="very Excellent">
                                            <i class="fa fa-star fa-lg"></i>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-footer">
                                    <a href="#" class="card-link Add-to-cart">Add To Card</a>
                                    <a href="info-product.html" class="card-link info-product">Info</a>  
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <div class="card wow animate__bounceInRight" data-wow-duration="2s" data-wow-delay=".1s">
                            <img class="card-img-top" src="{{ asset('media/card3.jpg') }}" alt="Card image cap">
                            <div class="body">
                                <h4 class="card-title">product name</h4>
                                <h6 class="card-subtitle mb-2 text-muted">123000 <span>S.P</span></h6>
                                <p class="card-text">Some quick example text to build on the product name</p>
                                <div class="rating">
                                    <ul id="stars" class="list-unstyled">
                                        <li class="star" data-value='1' title="poor">
                                            <i class="fa fa-star fa-lg"></i>
                                        </li>
                                        <li class="star" data-value='2' title="bad">
                                            <i class="fa fa-star fa-lg"></i>
                                        </li>
                                        <li class="star" data-value='3' title="Good">
                                            <i class="fa fa-star fa-lg"></i>
                                        </li>
                                        <li class="star" data-value='4' title="Excellent">
                                            <i class="fa fa-star fa-lg"></i>
                                        </li>
                                        <li class="star" data-value='5' title="very Excellent">
                                            <i class="fa fa-star fa-lg"></i>
                                        </li>
                                    </ul>
                                </div> 
                                <div class="card-footer">
                                    <a href="#" class="card-link Add-to-cart">Add To Card</a>
                                    <a href="info-product.html" class="card-link info-product">Info</a>  
                                </div> 
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-1">
                        <div class="card wow animate__fadeInUp" data-wow-duration="2s" data-wow-delay=".1s">
                            <img class="card-img-top" src="{{ asset('media/card4.jpg') }}" alt="Card image cap">
                            <div class="body">
                                <h4 class="card-title">product name</h4>
                                <h6 class="card-subtitle mb-2 text-muted">123000 <span>S.P</span></h6>                                    
                                <p class="card-text">Some quick example text to build on the product name</p>
                                <div class="rating">
                                    <ul id="stars" class="list-unstyled">
                                        <li class="star" data-value='1' title="poor">
                                            <i class="fa fa-star fa-lg"></i>
                                        </li>
                                        <li class="star" data-value='2' title="bad">
                                            <i class="fa fa-star fa-lg"></i>
                                        </li>
                                        <li class="star" data-value='3' title="Good">
                                            <i class="fa fa-star fa-lg"></i>
                                        </li>
                                        <li class="star" data-value='4' title="Excellent">
                                            <i class="fa fa-star fa-lg"></i>
                                        </li>
                                        <li class="star" data-value='5' title="very Excellent">
                                            <i class="fa fa-star fa-lg"></i>
                                        </li>
                                    </ul>
                                </div> 
                                <div class="card-footer">
                                    <a href="#" class="card-link Add-to-cart">Add To Card</a>
                                    <a href="info-product.html" class="card-link info-product">Info</a>  
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-1">
                        <div class="card wow animate__fadeInUp" data-wow-duration="2s" data-wow-delay=".1s">
                            <img class="card-img-top" src="{{ asset('media/card4.jpg') }}" alt="Card image cap">
                            <div class="body">
                                <h4 class="card-title">product name</h4>
                                <h6 class="card-subtitle mb-2 text-muted">123000 <span>S.P</span></h6>                                    
                                <p class="card-text">Some quick example text to build on the product name</p>
                                <div class="rating">
                                    <ul id="stars" class="list-unstyled">
                                        <li class="star" data-value='1' title="poor">
                                            <i class="fa fa-star fa-lg"></i>
                                        </li>
                                        <li class="star" data-value='2' title="bad">
                                            <i class="fa fa-star fa-lg"></i>
                                        </li>
                                        <li class="star" data-value='3' title="Good">
                                            <i class="fa fa-star fa-lg"></i>
                                        </li>
                                        <li class="star" data-value='4' title="Excellent">
                                            <i class="fa fa-star fa-lg"></i>
                                        </li>
                                        <li class="star" data-value='5' title="very Excellent">
                                            <i class="fa fa-star fa-lg"></i>
                                        </li>
                                    </ul>
                                </div> 
                                <div class="card-footer">
                                    <a href="#" class="card-link Add-to-cart">Add To Card</a>
                                    <a href="info-product.html" class="card-link info-product">Info</a>  
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-4 col-sm-12">
                        <div class="card wow animate__fadeInUp" data-wow-duration="2s" data-wow-delay=".1s">
                            <img class="card-img-top" src="{{ asset('media/card8.jpg') }}" alt="Card image cap">
                            <div class="body">
                                <h4 class="card-title">product name</h4>
                                <h6 class="card-subtitle mb-2 text-muted">123000 <span>S.P</span></h6>                                    
                                <p class="card-text">Some quick example text to build on the product name</p>
                                <div class="rating">
                                    <ul id="stars" class="list-unstyled">
                                        <li class="star" data-value='1' title="poor">
                                            <i class="fa fa-star fa-lg"></i>
                                        </li>
                                        <li class="star" data-value='2' title="bad">
                                            <i class="fa fa-star fa-lg"></i>
                                        </li>
                                        <li class="star" data-value='3' title="Good">
                                            <i class="fa fa-star fa-lg"></i>
                                        </li>
                                        <li class="star" data-value='4' title="Excellent">
                                            <i class="fa fa-star fa-lg"></i>
                                        </li>
                                        <li class="star" data-value='5' title="very Excellent">
                                            <i class="fa fa-star fa-lg"></i>
                                        </li>
                                    </ul>
                                </div> 
                                <div class="card-footer">
                                    <a href="#" class="card-link Add-to-cart">Add To Card</a>
                                    <a href="info-product.html" class="card-link info-product">Info</a>  
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-4 col-sm-12">
                        <div class="card wow animate__fadeInUp" data-wow-duration="2s" data-wow-delay=".1s">
                            <img class="card-img-top" src="{{ asset('media/card16.jpg') }}" alt="Card image cap">
                            <div class="body">
                                <h4 class="card-title">product name</h4>
                                <h6 class="card-subtitle mb-2 text-muted">123000 <span>S.P</span></h6>                                    
                                <p class="card-text">Some quick example text to build on the product name</p>
                                <div class="rating">
                                    <ul id="stars" class="list-unstyled">
                                        <li class="star" data-value='1' title="poor">
                                            <i class="fa fa-star fa-lg"></i>
                                        </li>
                                        <li class="star" data-value='2' title="bad">
                                            <i class="fa fa-star fa-lg"></i>
                                        </li>
                                        <li class="star" data-value='3' title="Good">
                                            <i class="fa fa-star fa-lg"></i>
                                        </li>
                                        <li class="star" data-value='4' title="Excellent">
                                            <i class="fa fa-star fa-lg"></i>
                                        </li>
                                        <li class="star" data-value='5' title="very Excellent">
                                            <i class="fa fa-star fa-lg"></i>
                                        </li>
                                    </ul>
                                </div> 
                                <div class="card-footer">
                                    <a href="#" class="card-link Add-to-cart">Add To Card</a>
                                    <a href="info-product.html" class="card-link info-product">Info</a>  
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-4 col-sm-12">
                        <div class="card wow animate__fadeInUp" data-wow-duration="2s" data-wow-delay=".1s">
                            <img class="card-img-top" src="{{ asset('media/card13.jpg') }}" alt="Card image cap">
                            <div class="body">
                                <h4 class="card-title">product name</h4>
                                <h6 class="card-subtitle mb-2 text-muted">123000 <span>S.P</span></h6>                                    
                                <p class="card-text">Some quick example text to build on the product name</p>
                                <div class="rating">
                                    <ul id="stars" class="list-unstyled">
                                        <li class="star" data-value='1' title="poor">
                                            <i class="fa fa-star fa-lg"></i>
                                        </li>
                                        <li class="star" data-value='2' title="bad">
                                            <i class="fa fa-star fa-lg"></i>
                                        </li>
                                        <li class="star" data-value='3' title="Good">
                                            <i class="fa fa-star fa-lg"></i>
                                        </li>
                                        <li class="star" data-value='4' title="Excellent">
                                            <i class="fa fa-star fa-lg"></i>
                                        </li>
                                        <li class="star" data-value='5' title="very Excellent">
                                            <i class="fa fa-star fa-lg"></i>
                                        </li>
                                    </ul>
                                </div> 
                                <div class="card-footer">
                                    <a href="#" class="card-link Add-to-cart">Add To Card</a>
                                    <a href="info-product.html" class="card-link info-product">Info</a>  
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>


    <!-- end filter product -->




        <!-- start Various products  -->
        <div class="Various-products text-center">
            <div class="container">
                <h2> Various products<span>.</span> </h2>
                <p> In this site there are many different products that you need </p>
                <ul class="list-unstyled row">
                    <li data-class="all" class="active col-md wow animate__slideInLeft" data-wow-duration="1s" data-wow-delay=".1s"> all</li>
                    <li data-class=".Electricals" class="col-md wow animate__slideInLeft" data-wow-duration="1s" data-wow-delay=".1s"> Electricals</li>
                    <li data-class=".electronics" class="col-md wow animate__slideInLeft" data-wow-duration="1s" data-wow-delay=".1s"> electronics</li>
                    <li data-class=".Clothes" class="col-md wow animate__slideInRight" data-wow-duration="1s" data-wow-delay=".1s"> Clothes </li>
                    <li data-class=".Houseware" class="col-md wow animate__slideInRight" data-wow-duration="1s" data-wow-delay=".1s"> Houseware</li>
                    <li data-class=".food-products" class="col-md wow animate__slideInRight" data-wow-duration="1s" data-wow-delay=".1s"> food products</li>
                </ul>
                
            </div>
            <div class="images">
                <div class="row">
                    <div class="col-sm-3 electronics">
                        <a href="info-prduct.html"><img  src="{{ asset('media/electronics.jpg') }}" alt="" height="300px"></a>
                    </div>
                    <div class="col-sm-3 Electricals">
                        <a href="info-prduct.html"><img  src="{{ asset('media/elc1.jpg') }}" alt="" height="300px"></a>
                    </div>
                    <div class="col-sm-3 food-products">
                        <a href="info-prduct.html"><img  class="logos" src="{{ asset('media/food2.jpg') }}" alt="" height="300px"></a>
                    </div>
                    <div class="col-sm-3 electronics">
                        <a href="info-prduct.html"><img   src="{{ asset('media/electronics5.jpg') }}" alt="" height="300px"></a>
                    </div>
                    <div class="col-sm-3 Clothes">
                        <a href="info-prduct.html"><img  src="{{ asset('media/Clothes2.jpg') }}" alt="" height="300px"></a>
                    </div>
                    <div class="col-sm-3 electronics">
                        <a href="info-prduct.html"><img  src="{{ asset('media/electronics3.jpg') }}" alt="" height="300px"></a>
                    </div>
                    <div class="col-sm-3 Houseware">
                        <a href="info-prduct.html"><img  src="{{ asset('media/house1.jpg') }}" alt="" height="300px"></a>
                    </div>
                    <div class="col-sm-3 food-products">
                        <a href="info-prduct.html"><img  src="{{ asset('media/food.jpg') }}" alt="" height="300px"></a>
                    </div>
                    <div class="col-sm-3 Clothes">
                        <a href="info-prduct.html"><img  src="{{ asset('media/Clothes1.jpg') }}" alt="" height="300px"></a>
                    </div>
                    <div class="col-sm-3 electronics">
                        <a href="info-prduct.html"><img  src="{{ asset('media/electronics4.jpg') }}" alt="" height="300px"></a>
                    </div>
                    <div class="col-sm-3 Electricals">
                        <a href="info-prduct.html"><img  src="{{ asset('media/electronics1.jpg') }}" alt="" height="300px"></a>
                    </div>
                    <div class="col-sm-3 Clothes">
                        <a href="info-prduct.html"><img  src="{{ asset('media/Clothes.jpg') }}" alt="" height="300px"></a>
                    </div>
                    <div class="col-sm-3 Electricals">
                        <a href="info-prduct.html"><img  src="{{ asset('media/elc4.jpg') }}" alt="" height="300px"></a>
                    </div>
                    <div class="col-sm-3 Houseware">
                        <a href="info-prduct.html"></a><img  src="{{ asset('media/houes2.jpg') }}" alt="" height="300px"></a>
                    </div>
                    <div class="col-sm-3 Electricals">
                        <a href="info-prduct.html"><img  src="{{ asset('media/elc2.jpg') }}" alt="" height="300px"></a>
                    </div>
                    <div class="col-sm-3 Electricals">
                        <a href="info-prduct.html"><img  src="{{ asset('media/elc5.jpg') }}" alt="" height="300px"></a>
                    </div>
                </div>
            </div>
         </div>
        <!-- end Various products -->

         <!-- start your-success-area -->
        <section class="your-success-area" style="background: url('{{ asset('media/slider-1.jpg') }}')">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-xs-12 wow animate__bounceInLeft" data-wow-duration="1s" data-wow-delay=".1s">
                        <h4>You Save <span>50%</span></h4>
                        <h2>Your Success</h2>
                        <h5>Black T-shirt <br>ONLY $20</h5>
                        <a class="btn" href="#" style="text-decoration: none;;">SHOP NOW</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- end your-success-area -->



        <!-- Swiper -->
        <div class="swiper-container">
            <h2 class="text-center text-capitalize">Product You Like it<span>.</span> </h2>
            <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="card" width="100%" height="100%">
                    <img class="card-img-top" src="{{ asset('media/Clothes2.jpg') }}" width="100%"   alt="Card image cap">
                    <div class="body">
                        <h4 class="card-title">product name</h4>
                        <h6 class="card-subtitle mb-2 text-muted">123000 <span>S.P</span></h6>
                        <p class="card-text">Some quick example text to build on the product name</p>
                        <div class="rating">
                            <ul id="stars" class="list-unstyled">
                                <li class="star" data-value='1' title="poor">
                                    <i class="fa fa-star fa-lg"></i>
                                </li>
                                <li class="star" data-value='2' title="bad">
                                    <i class="fa fa-star fa-lg"></i>
                                </li>
                                <li class="star" data-value='3' title="Good">
                                    <i class="fa fa-star fa-lg"></i>
                                </li>
                                <li class="star" data-value='4' title="Excellent">
                                    <i class="fa fa-star fa-lg"></i>
                                </li>
                                <li class="star" data-value='5' title="very Excellent">
                                    <i class="fa fa-star fa-lg"></i>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="card-link Add-to-cart">Add To Card</a>
                            <a href="info-product.html" class="card-link info-product">Info</a>  
                        </div>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                 <div class="card">
                    <img class="card-img-top" src="{{ asset('media/electronics4.jpg') }}" alt="Card image cap">
                    <div class="body">
                        <h4 class="card-title">product name</h4>
                        <h6 class="card-subtitle mb-2 text-muted">123000 <span>S.P</span></h6>
                        <p class="card-text">Some quick example text to build on the product name</p>
                        <div class="rating">
                            <ul id="stars" class="list-unstyled">
                                <li class="star" data-value='1' title="poor">
                                    <i class="fa fa-star fa-lg"></i>
                                </li>
                                <li class="star" data-value='2' title="bad">
                                    <i class="fa fa-star fa-lg"></i>
                                </li>
                                <li class="star" data-value='3' title="Good">
                                    <i class="fa fa-star fa-lg"></i>
                                </li>
                                <li class="star" data-value='4' title="Excellent">
                                    <i class="fa fa-star fa-lg"></i>
                                </li>
                                <li class="star" data-value='5' title="very Excellent">
                                    <i class="fa fa-star fa-lg"></i>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="card-link Add-to-cart">Add To Card</a>
                            <a href="info-product.html" class="card-link info-product">Info</a>  
                        </div>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                 <div class="card">
                    <img class="card-img-top" src="{{ asset('media/elc3.jpg') }}" alt="Card image cap">
                    <div class="body">
                        <h4 class="card-title">product name</h4>
                        <h6 class="card-subtitle mb-2 text-muted">123000 <span>S.P</span></h6>
                        <p class="card-text">Some quick example text to build on the product name</p>
                        <div class="rating">
                            <ul id="stars" class="list-unstyled">
                                <li class="star" data-value='1' title="poor">
                                    <i class="fa fa-star fa-lg"></i>
                                </li>
                                <li class="star" data-value='2' title="bad">
                                    <i class="fa fa-star fa-lg"></i>
                                </li>
                                <li class="star" data-value='3' title="Good">
                                    <i class="fa fa-star fa-lg"></i>
                                </li>
                                <li class="star" data-value='4' title="Excellent">
                                    <i class="fa fa-star fa-lg"></i>
                                </li>
                                <li class="star" data-value='5' title="very Excellent">
                                    <i class="fa fa-star fa-lg"></i>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="card-link Add-to-cart">Add To Card</a>
                            <a href="info-product.html" class="card-link info-product">Info</a>  
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="swiper-slide">
                <div class="card">
                    <img class="card-img-top" src="{{ asset('media/elc5.jpg') }}" alt="Card image cap">
                    <div class="body">
                        <h4 class="card-title">product name</h4>
                        <h6 class="card-subtitle mb-2 text-muted">123000 <span>S.P</span></h6>
                        <p class="card-text">Some quick example text to build on the product name</p>
                        <div class="rating">
                            <ul id="stars" class="list-unstyled">
                                <li class="star" data-value='1' title="poor">
                                    <i class="fa fa-star fa-lg"></i>
                                </li>
                                <li class="star" data-value='2' title="bad">
                                    <i class="fa fa-star fa-lg"></i>
                                </li>
                                <li class="star" data-value='3' title="Good">
                                    <i class="fa fa-star fa-lg"></i>
                                </li>
                                <li class="star" data-value='4' title="Excellent">
                                    <i class="fa fa-star fa-lg"></i>
                                </li>
                                <li class="star" data-value='5' title="very Excellent">
                                    <i class="fa fa-star fa-lg"></i>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="card-link Add-to-cart">Add To Card</a>
                            <a href="info-product.html" class="card-link info-product">Info</a>  
                        </div>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="card">
                    <img class="card-img-top" src="{{ asset('media/electronics3.jpg') }}" alt="Card image cap">
                    <div class="body">
                        <h4 class="card-title">product name</h4>
                        <h6 class="card-subtitle mb-2 text-muted">123000 <span>S.P</span></h6>
                        <p class="card-text">Some quick example text to build on the product name</p>
                        <div class="rating">
                            <ul id="stars" class="list-unstyled">
                                <li class="star" data-value='1' title="poor">
                                    <i class="fa fa-star fa-lg"></i>
                                </li>
                                <li class="star" data-value='2' title="bad">
                                    <i class="fa fa-star fa-lg"></i>
                                </li>
                                <li class="star" data-value='3' title="Good">
                                    <i class="fa fa-star fa-lg"></i>
                                </li>
                                <li class="star" data-value='4' title="Excellent">
                                    <i class="fa fa-star fa-lg"></i>
                                </li>
                                <li class="star" data-value='5' title="very Excellent">
                                    <i class="fa fa-star fa-lg"></i>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="card-link Add-to-cart">Add To Card</a>
                            <a href="info-product.html" class="card-link info-product">Info</a>  
                        </div>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="card">
                    <img class="card-img-top" src="{{ asset('media/electronics5.jpg') }}" alt="Card image cap">
                    <div class="body">
                        <h4 class="card-title">product name</h4>
                        <h6 class="card-subtitle mb-2 text-muted">123000 <span>S.P</span></h6>
                        <p class="card-text">Some quick example text to build on the product name</p>
                        <div class="rating">
                            <ul id="stars" class="list-unstyled">
                                <li class="star" data-value='1' title="poor">
                                    <i class="fa fa-star fa-lg"></i>
                                </li>
                                <li class="star" data-value='2' title="bad">
                                    <i class="fa fa-star fa-lg"></i>
                                </li>
                                <li class="star" data-value='3' title="Good">
                                    <i class="fa fa-star fa-lg"></i>
                                </li>
                                <li class="star" data-value='4' title="Excellent">
                                    <i class="fa fa-star fa-lg"></i>
                                </li>
                                <li class="star" data-value='5' title="very Excellent">
                                    <i class="fa fa-star fa-lg"></i>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="card-link Add-to-cart">Add To Card</a>
                            <a href="info-product.html" class="card-link info-product">Info</a>  
                        </div>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">Slide 7</div>
            <div class="swiper-slide">Slide 8</div>
            <div class="swiper-slide">Slide 9</div>
            <div class="swiper-slide">Slide 10</div>
            </div>
           
            <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
        <!-- Swiper JS -->

        <!-- start offers -->
        <section class="Offers">
            <div class="container-fluid">
                <h2 class="text-center">Offers<span>.</span></h2>
                <p class="text-center">The best offers available from companies</p>
                <div class="row">
                    <div class="col-sm">
                        <div class="card">
                            <img class="card-img-top" src="{{ asset('media/elc3.jpg') }}" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title">BMW 2020 </h4>
                                <h6 class="card-subtitle mb-2 text-muted"><del>125200000 <span>S.P</span></del></h6>
                                <h6 class="card-subtitle mb-2">124100000  <span>S.P</span></h6>
                                <h4 class="number-pieces" style="color: #555;"> Half the price <span class="badge badge-danger rounded">2</span> </h4>
                                <p class="card-text">Some quick example text to build on the product name</p>
                                <div class="card-footer">
                                    <a href="#" class="card-link Add-to-cart">Add To Card</a>
                                    <a href="info-product.html" class="card-link info-product">Info</a>  
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="card">
                            <img class="card-img-top" src="{{ asset('media/offers2.jpg') }}" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title">Samsoung S20 </h4>
                                <h6 class="card-subtitle mb-2 text-muted"><del>12300000 <span>S.P</span></del></h6>
                                <h6 class="card-subtitle mb-2">11300000 <span>S.P</span></h6>
                                <h4 class="number-pieces" style="color: #555;"> Two pieces instead of one <span class="badge badge-danger rounded">2</span> </h4>
                                <p class="card-text">Some quick example text to build on the product name</p>
                                <div class="card-footer">
                                    <a href="#" class="card-link Add-to-cart">Add To Card</a>
                                    <a href="info-product.html" class="card-link info-product">Info</a>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">

                    </div>
                    <div class="col-sm">
                        
                    </div>
                </div>
            </div>
        </section>
        <!-- end offers -->



        <hr>


          <!-- start chooes us -->
        <div class="chooes-us">
            <div class="container-fluid">
                <div class="row">
                    <div class="info col-md-6">
                        <img src="{{ asset('media/why-us.jpg') }}" alt="">
                    </div>
                    <div class="info col-md-6 wow slideInLeft" data-wow-duration="2s" data-wow-delay="5s">
                        <h2>Why Chooes Us</h2>
                        <p></p>
                        <ul class="list-unstyled">
                            <li>Ease of purchase.</li>
                            <li>Speed ??????in response.</li>
                            <li>Safety and reliability.</li>
                            <li>Variety of products.</li>
                            <li>The many and varied offers.</li>
                        </ul>
                        <a href="#" class="card-link">view more </a>
                    </div>
                </div>
            </div>
        </div>

    <!-- ens chooes us -->

        

        <!-- start about web site -->
        <div class="about-website text-center">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6 col-lg-3">
                            <i class="fa fa-user"></i>
                            <span> 700 </span>
                            <p>number of visitos</p>
                        </div>
                        <div class="col-sm-6 col-lg-3">  
                            <i class="fa fa-heart"></i>
                            <span> 150 </span>
                            <p>amazing tours</p>
                        </div>
                        <div class="col-sm-6 col-lg-3"> 
                            <i class="fa fa-comments"></i>
                            <span> 332 </span>
                            <p> partners </p>
                        </div>
                        <div class="col-sm-6 col-lg-3">  
                            <i class="fa fa-briefcase"></i>
                            <span> 14 </s>
                            <p>  the companies</p>
                        </div>
                    </div>
                </div>
            </div>

         
    
            <!-- end about web site -->

          
              <!-- start contact us -->
        <div class="contact-us">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-12 text-left">
                        you think we're cool? let's work together
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <a href="#"> contact us </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- end contact us  -->

            <!-- start footer -->

            <div class="footer-top">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3 col-xs-12">
                                <h2>Galaxy<span style="color: #f4b900;">Market</span></h2>
                                <p class="p">Before we talk destination, we shine a spotlight across your organization to fully understand its people, processes</p>
                                <div class="footer-info">
                                    <h4>
                                        <i class="fa fa-map-marker"></i> Postal Address:
                                    </h4>
            
                                    <p>PO Box 16122 Collins Street West Victoria 8007 Australia</p>
                                    <h4>>
                                        <i class="fa fa-phone"></i>Business Phone:
                                    </h4>
                                    <a href="#">
                                        <p>+963- 0997-741-497</p>
                                    </a>
                                </div>
                            </div>
            
                            <div class="col-md-3 col-xs-6">
                                <h2>TOP RATED <span style="color: #f4b900;">PRODUCTS</span></h2>
                                <div class="media">
                                    <a class="pull-left" href="#">
                                        <img class="media-object" src="{{ asset('media/card7.jpg') }}" width="80px" height="80px">
                                    </a>
                                    <div class="media-body">
                                        <h4>Creator Of Quality</h4>
                                        <h5>??125.00</h5>
                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                    </div>
                                </div>
            
                                <div class="media">
                                    <a class="pull-left" href="#">
                                        <img class="media-object" src="{{ asset('media/card5.jpg') }}" width="80px" height="80px">
                                    </a>
                                    <div class="media-body">
                                        <h4>Creator Of Quality</h4>
                                        <h5>??125.00</h5>
                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                    </div>
                                </div>
            
                                <div class="media">
                                    <a class="pull-left" href="#">
                                        <img class="media-object" src="{{ asset('media/card4.jpg') }}" width="80px" height="80px">
                                    </a>
                                    <div class="media-body">
                                        <h4>Creator Of Quality</h4>
                                        <h5><del>??109.00  </del> ??125.00</h5>
                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
            
                            <div class="col-md-3 col-xs-6">
                                <h2>OUr <span style="color: #f4b900;">PRODUCTS</span></h2>
                                <div class="media">
                                    <a class="pull-left" href="#">
                                        <img class="media-object" src="{{ asset('media/card3.jpg') }}" width="80px" height="80px">
                                    </a>
                                    <div class="media-body">
                                        <h4>Creator Of Quality</h4>
                                        <h5>??125.00</h5>
                                    </div>
                                </div>
            
                                <div class="media">
                                    <a class="pull-left" href="#">
                                        <img class="media-object" src="{{ asset('media/card2.jpg') }}" width="80px" height="80px">
                                    </a>
                                    <div class="media-body">
                                        <h4>Creator Of Quality</h4>
                                        <h5>??125.00</h5>
                                    </div>
                                </div>
            
                                <div class="media">
                                    <a class="pull-left" href="#">
                                        <img class="media-object" src="{{ asset('media/card1.jpg') }}" width="80px" height="80px">
                                    </a>
                                    <div class="media-body">
                                        <h4>Creator Of Quality</h4>
                                        <h5><del>??109.00  </del> ??125.00</h5>
                                    </div>
                                </div>
                            </div>
            
                            <div class="col-md-3 col-xs-12">
                                <h2>TOP RATED <span>PRODUCTS</span></h2>
                                <ul class="footer-gallery">
                                    <li>
                                        <a href="#"><img src="{{ asset('media/gallery-1.png') }}" alt=""></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="{{ asset('media/gallery-2.png') }}" alt=""></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="{{ asset('media/gallery-3.png') }}" alt=""></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="{{ asset('media/gallery-4.png') }}" alt=""></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="{{ asset('media/gallery-5.png') }}" alt=""></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="{{ asset('media/gallery-6.png') }}" alt=""></a>
                                    </li>
            
                                </ul>
                                <a href="#" class="view"><i class="fa fa-arrow-circle-o-right"></i>View More images</a>
                                <h6>Subscribe to rss</h6>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Type your email">
                                    <span class="input-group-btn">
                                    <button class="btn btn-default" type="button"><i class="fa fa-rss" aria-hidden="true"></i></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                
                <div class="footer-bottom">
                    <div class="container">
                        <h4 class="f-text"> Copyright ?? 2020 . Powered By <span style="color:#f4b900 ;">Obada Kahlous</h4></span>
                    </div>
                    <div id="scroolup">
                        <i class="fa fa-angle-double-up"></i>
                    </div>
                </div>

            <!-- end footer -->
    
            <section class="loading-overlay">
                <div class="loader">Loading...</div>
            </section>

        <script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/swiper-bundle.min.js') }}"></script>
        <script src="{{ asset('js/jquery.nicescroll.js') }}"></script>
        <script src="{{ asset('js/main-interface.js') }}"></script>
        <script src="{{ asset('js/wow.min.js') }}"></script>
        @include('js.shared_js')
        <script>
            new WOW().init();
        </script>
    

    </body>
</html>