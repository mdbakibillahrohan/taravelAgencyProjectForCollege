<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Agency Website</title>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

    <!-- font awesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
</head>

<body>

    <!-- header section starts -->
    <header>

        <div id="menu-bar" class="fas fa-bars">

        </div>


        <a href="#" class="logo"><img src="{{ asset('frontend/img/Logo.png') }}" alt=""></a>

        <nav class="navbar">
            <a href="#home">home</a>
            <a href="#book">book</a>
            <a href="#package">package</a>
            <a href="#services">services</a>
            <a href="#gallery">gallery</a>
            <a href="#review">review</a>
            <a href="#contact">contact</a>
        </nav>

        <div class="icons">
            <i class="fas fa-search" id="search-btn"></i>
            <i class="fas fa-user" id="login-btn"></i>
        </div>

        <form action="" class="search-bar-container">
            <input type="search" id="search-bar" placeholder="search hare....">
            <label for="search-bar" class="fas fa-search"></label>
        </form>
    </header>

    <!-- header section ends -->

    <!-- login form container  -->

    <div class="login-form-container">
        <i class="fas fa-times" id="form-close"></i>
        <form action="">
            <h3>login</h3>
            <input type="email" class="box" placeholder="enter your email">
            <input type="password" class="box" placeholder="enter your password">
            <input type="submit" value="login now" class="btn">
            <input type="checkbox" id="remember">
            <label for="remember">remember me</label>
            <p>forgot password? <a href="">click hare</a></p>
            <p>don't have an account <a href="">register now</a></p>
        </form>
    </div>


    <!-- ---home section start  -->
    <sectio class="home" id="home">
        <div class="content">
            <h3>Adventure is worthwhile</h3>
            <p>discover new place with us, adventure awaits</p>
            <a href="#" class="btn">discover more</a>
        </div>


        <div class="control">
            <span class="vid-btn active" data-src="{{ asset('frontend/img/vid-clip-1.mp4') }}"></span>
            <span class="vid-btn" data-src="{{ asset('frontend/img/vid-clip-2.mp4') }}"></span>
            <span class="vid-btn" data-src="{{ asset('frontend/img/vid-clip-3.mp4') }}"></span>
            <span class="vid-btn" data-src="{{ asset('frontend/img/vid-clip-4.mp4') }}"></span>
            <span class="vid-btn" data-src="{{ asset('frontend/img/vid-clip-5.mp4') }}"></span>
        </div>

        <div class="video-container">
            <video src="{{ asset('frontend/img/vid-clip-1.mp4') }}" id="video-slider" loop autoplay muted></video>
        </div>

    </sectio>
    <!-- ---home section end -->

    <!-- book section starts  -->

    <section class="book" id="book">
        <h1 class="heading">book now</h1>

        <div class="row">

            <div class="image">
                <img src="{{ asset('frontend/img/book-img.avif') }}" alt="">
            </div>


            <form action="">
                <div class="inputBox">
                    <h3>where to go</h3>
                    <input type="text" placeholder="place name">
                </div>

                <div class="inputBox">
                    <h3>how many</h3>
                    <input type="number" placeholder="number of guest">
                </div>

                <div class="inputBox">
                    <h3>arrivals</h3>
                    <input type="date">
                </div>

                <div class="inputBox">
                    <h3>leaving</h3>
                    <input type="date">
                </div>

                <input type="submit" class="btn" value="submit now">
            </form>

        </div>
    </section>
    <!-- book section end -->


    <!-- package section starts  -->

    <section class="package" id="package">
        <h1 class="heading">packages</h1>

        <div class="box-container">

            @php
                $i = 1;
            @endphp
            @foreach ($Packages as $Package)
                <?php
                if ($i == 8) {
                    break;
                } else {
                    $i++;
                }
                ?>
                <div class="box">
                    <img src="{{ asset('storage/' . $Package->package_image) }}" alt="">
                    <div class="content">
                        <h3><i class="fas fa-map-marker-alt"></i>{{ $Package->package_location }}</h3>
                        <p>{{ $Package->package_title }}</p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>

                        <div class="price">{{ $Package->package_new_price }}
                            <span>{{ $Package->package_old_price }}</span>
                        </div>
                        <a href="#" class="btn">book now</a>
                    </div>
                </div>
            @endforeach

        </div>
    </section>

    <!-- package section end -->


    <!-- service section starts  -->
    <section class="services" id="services">
        <h1 class="heading">Services</h1>

        <div class="box-container">
            <div class="box">
                <i class="fas fa-hotel"></i>
                <h3>affordable hotels</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maxime voluptates deserunt nobis!
                    Aperiam,vitae?</p>
            </div>

            <div class="box">
                <i class="fas fa-utensils"></i>
                <h3>food and drinks</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maxime voluptates deserunt nobis!
                    Aperiam,vitae?</p>
            </div>

            <div class="box">
                <i class="fas fa-bullhorn"></i>
                <h3>seafty guide</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maxime voluptates deserunt nobis!
                    Aperiam,vitae?</p>
            </div>

            <div class="box">
                <i class="fas fa-globe-asia"></i>
                <h3>around the world</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maxime voluptates deserunt nobis!
                    Aperiam,vitae?</p>
            </div>

            <div class="box">
                <i class="fas fa-plane"></i>
                <h3>fastest travel</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maxime voluptates deserunt nobis!
                    Aperiam,vitae?</p>
            </div>

            <div class="box">
                <i class="fas fa-hiking"></i>
                <h3>adventure</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maxime voluptates deserunt nobis!
                    Aperiam,vitae?</p>
            </div>

        </div>
    </section>

    <!-- service section end -->

    <!-- gallery section starts  -->

    <section class="gallery" id="gallery">
        <h1 class="heading">gallery</h1>

        <div class="box-container">
            @php
                $i = 1;
            @endphp
            @foreach ($GalleryImages as $GalleryImage)
                <?php
                if ($i == 8) {
                    break;
                } else {
                    $i++;
                }
                ?>
                <div class="box">
                    <img src="{{ asset('storage/' . $GalleryImage->gallery_image) }}" alt="">
                    <div class="content">
                        <h3>{{ $GalleryImage->gallery_title }}</h3>
                        <p>{{ $GalleryImage->gallery_description }}</p>
                        <a href="#" class="btn">see more</a>
                    </div>
                </div>
            @endforeach


        </div>
    </section>

    <!-- gallery section end  -->


    <!-- review section starts  -->
    <section class="review" id="review">
        <h1 class="heading">review</h1>

        <div class="swiper review-slider">

            <div class="swiper-wrapper">

                @foreach ($Reviewers as $Reviewer)
                    <div class="swiper-slide">
                        <div class="box">
                            <img src="{{ asset('storage/' . $Reviewer->reviewer_image) }}" alt="">
                            <h3>{{ $Reviewer->reviewer_name }}</h3>
                            <p>{{ $Reviewer->reviewer_comments }}</p>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                        </div>
                    </div>
                @endforeach





            </div>


        </div>



    </section>

    <!-- review section end -->

    <!-- contact section starts  -->

    <section class="contact" id="contact">

        <h1 class="heading">contact</h1>


        <div class="row">
            <div class="image">
                <img src="{{ asset('frontend/img/contact.png') }}" alt="">
            </div>

            <form method="post" action="{{ route('contact.store') }}">
                @csrf
                <div class="inputbox">
                    <input name="name" type="text" placeholder="name">
                    <input style="text-transform: lowercase;" name="email" type="email" placeholder="email">
                </div>
                <div class="inputbox">
                    <input name="number" type="number" placeholder="number">
                    <input name="subject" type="text" placeholder="subject">
                </div>
                <textarea name="message" id="" cols="30" rows="10"></textarea>
                <input type="submit" class="btn" value="sent message">
            </form>
        </div>
    </section>

    <!-- contact section end -->


    <!-- footer sectin starts  -->

    <section class="footer">

        <div class="box-container">

            <div class="box">
                <h3>about us</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos doloremque deserunt quae
                    consequuntur consectetur fuga voluptates qui illum odio debitis?</p>
            </div>

            <div class="box">
                <h3>branch location</h3>
                <a href="">Bangladesh</a>
                <a href="">usa</a>
                <a href="">australia</a>
                <a href="">india</a>
            </div>

            <div class="box">
                <h3>quick links</h3>
                <a href="">home</a>
                <a href="">book</a>
                <a href="">package</a>
                <a href="">services</a>
                <a href="">gallery</a>
                <a href="">review</a>
                <a href="">contact</a>
            </div>

            <div class="box">
                <h3>follow us</h3>
                <a href="">facebook</a>
                <a href="">instagram</a>
                <a href="">twitter</a>
                <a href="">linkedin</a>
            </div>

        </div>

        <h1 class="credit">created by <span>mr.khan</span>all rights reserved!</h1>

    </section>

    <!-- footer sectin end -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>


    <!-- custom js file link  -->
    <script src="{{ asset('frontend/js/script.js') }}"></script>
</body>

</html>
