<!doctype html>
<html lang="en">

<head>
    <title>Ashiana</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" 
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="{{ asset('https://kit.fontawesome.com/557e2fff86.js') }}" crossorigin="anonymous"></script>
    <link
        href="{{ asset('https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,700;0,900;1,400;1,700&display=swap') }}"
        rel="stylesheet">

    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ asset('frontend/contact/images/icons/favicon.ico') }}" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('frontend/contact/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('frontend/contact/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/contact/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('frontend/contact/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/contact/vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/contact/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/contact/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/style.css') }}">


</head>

<body>
    <section>
        {{-- <div class="cover">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 d-flex align-items-center">
                        <p class="md-0 phone pl-md-2">
                            <a href="#" class="mr-2">
                                <i class="fas fa-phone mr-1">+8801778874376</i>
                            </a>
                            <a href="#" class="mr-2">
                                <i class="fas fa-paper-plane mr-1">email@gmail.com</i>
                            </a>
                        </p>
                    </div>
                    <div class="col-md-6 d-flex justify-content-md-end">
                        <div class="social-icon mr-4">
                            <p class="mb-0 d-flex">
                                <a href="#" class="d-flex align-items-center justify-content-center">
                                    <i class="fab fa-facebook"></i>
                                </a>
                                <a href="#" class="d-flex align-items-center justify-content-center">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="#" class="d-flex align-items-center justify-content-center">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </p>
                        </div>
                        <div class="reg">
                            <a href="#" class="mr-2 mb-0">Sign-Up</a>
                            <a href="#">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- -----Nav------ -->
        <nav class="navbar navbar-expand-lg main-navbar bg-color main-navbar-color" id="main-navbar">
            <div class="container">
                <a href="" class="navbar-brand">  {{-- {{ route('index') }} --}}
                    <img src="{{ asset('frontend/images/ashiana.png') }}" height="100px" alt="">
                </a>
                <div class="order-lg-last btn-group">
                    <a href=""><i class="fas fa-shopping-cart fa-2x"></i></a> {{-- {{ route('show-cart') }} --}}
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNav"
                    aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation"><i
                        class="fas fa-bars"></i></button>
                <div class="collapse navbar-collapse" id="myNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-link">
                            <a href="" class="nav-link">Home</a>{{-- {{ route('index') }} --}}
                        </li>
                        <li class="nav-link">
                            <a href="#product-container" class="nav-link">Categories</a>
                        </li>
                        <li class="nav-link">
                            <a href="" class="nav-link">About Us</a>{{-- {{ route('about-us') }} --}}
                        </li>
                        <li class="nav-link">
                            <a href="" class="nav-link">Contact</a>{{-- {{ route('contact-us') }} --}}
                        </li>

                    </ul>

                </div>
            </div>
        </nav>
        <!-- -------End Nav-------- -->
    </section>

    @yield('content')



    <!-- -----------------End of team section-------------------- -->

    <!-- ------------------footer start ---------------------------- -->
    <!-- Footer -->
    <footer>
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 footer-about wow fadeInUp">
                        <img class="logo-footer" src="{{ asset('frontend/images/ashiana.png') }}" alt="logo-footer"
                            data-at2x="assets/img/logo.png">
                        <p id="footer-p">
                            Following government COVID-19 guidelines we are open between 12-2:00pm every day & between
                            5:30-10:00pm every evening.

                        </p>
                        <p id="footer-p">
                            Ashiana Spice was created with great cuisine, outstanding service and our customers in mind.
                            For nearly 10 years we have been continuously growing our restaurant and we are proud to
                            consistently deliver on our promise to you.
                        </p>
                    </div>
                    <div class="col-md-4 offset-md-2 footer-contact wow fadeInDown">
                        <h3>Contact</h3>
                        <p id="footer-contact-botton"><i class="fas fa-map-marker-alt"></i> We are situated on 7 Baldock
                            Street, Royston. SG8 5AY.
                        </p>
                        <p id="footer-contact-botton"> Feel free to give us a ring and we will answer as soon as
                            possible.</p>
                        <p id="footer-contact-botton"><i class="fas fa-phone"></i> Phone: (+88) 01763 246060</p>
                        <p id="footer-contact-botton"><i class="fas fa-phone"></i> Phone: (+88) 01763 246090</p>
                        <p id="footer-contact-botton"><i class="fas fa-envelope"></i> Email: <a
                                href="bookings@ashiana-spice.co.uk">bookings@ashiana-spice.co.uk</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 footer-copyright">
                        &copy; by <a href=""> Ashiana Spice 2019
                            All Rights Reserved </a>
                    </div>
                    <div class="col-md-6 footer-social">
                        <a href=""><i class="fab fa-facebook-f"></i></a>
                        <a style="text-decoration: none;" href="bookings@ashiana-spice.co.uk"><i
                                class="far fa-envelope"></i>
                            bookings@ashiana-spice.co.uk
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ------------------end of footer-------------------------------- -->




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    {{-- 
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="{{ asset('https://code.jquery.com/jquery-3.3.1.slim.min.js') }}"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js') }}"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script> 
    <script src="{{ asset('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js') }}"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.1/bootbox.min.js') }}"></script>
   --}}
   <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>
        var token = $('input[name="_token"]').val();
        load_more('',token);
        function load_more(id="",token){
            $.ajax({
                url: "{{ route('load-more-data') }}",
                method:'POST',
                data:{id:id,_token:token,test:'something'},
                success:function(data){
                    $('#removeAfterReload').remove();
                    $('#categoryData').append(data);
                }
        });
        }
        $('body').on('click','#loadMoreData',function(){
            var id = $(this).data('id');

            $('#loadMoreData').html("Loading...");
            load_more(id,token);
        })
    </script>


</body>

</html>
