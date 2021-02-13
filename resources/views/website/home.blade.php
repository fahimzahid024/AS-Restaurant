@extends('layouts.test')
@section('content')
    <!-- ----------- Hero Section ------------- -->
    <section id="hero">
        <div class="hero-container">
            <div class="hero-logo">
                @if (Session('message'))
                    <div class="alert bg-success" role="alert">
                        <a href="#" class="close" data-dismiss="alert">×</a>
                        {{ Session('message') }}
                    </div>

                @endif
                <h1 class="font-weight-bold">Take Away</h1>
            </div>
            <h2 class="font-weight-bold">DELICIOUS INDIAN CUISINE </h2>
            <div class="actions">
                <a href="" class="btn-get-started bg-warning">View Our Menu</a>
            </div>
            
        </div>

    </section>
    <!-- ----------- End Hero Section ------------- -->

    <section id="product" style="background: black">
        <div class="container" id="product-container" style="background: black;">
            <div class="row justify-content-center pb-5">
                <div class="col-md-7 heading-section text-center">
                    <h2 class="font-weight-bold text-color glow" style=" background:black; color: rgb(255, 255, 255); padding-top: 5px;">
                        Categories
                    </h2>
                </div>
            </div>
            <?php  ?>
            @csrf
            <div class="row" style="background: black" id="categoryData">
                 
                {{-- dir:include.category.blade.php --}}
               
            </div>
        </div>

        </div>


    </section>

    <hr>




    <!-- -------------Variety----------------------- -->
    {{-- <section id="variety" class="variety pt-4">

        <div class="container">
            <div class="section-title">
                <h2 style="color: #fdc134;" class="text-center font-weight-bold">
                    Recently Add Product
                </h2>
                <br><br>



            </div>
            <div class="row" id="ProductData">
                @if(!$getData->isEmpty())
                    @foreach ($getData as $item)
                    <div class="col-md-4">
                        <a href="{{ route('view.more', $item->product_id) }}">
                            <div class="card">
                            <img src="{{ asset('/images/'.$item->product_image) }}" height="270px" alt="">
                            <div class="card-body mt-1">
                                <h5 class="card-title">{{ $item->product_name }}</h5>
                                <p class="card-text">
                                </p>
                            </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                @else 
                    <h1>Not found any product </h1>
                @endif
                


            </div>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <a href="" class="btn btn-prod d-block">
                        View all Products
                        <i class="fas fa-carrot"></i>
                    </a>
                </div>
            </div>
            <div class="contact-us ">
                <p style="font-size:20px; color:white; padding:25px; text-align:center;">If you would like to make an
                    enquiry
                    or have a
                    question, please get in touch with us, we are always happy to hear from you.</p>
                <div class="row justify-content-center pb-5">
                    <div class="col-md-7 heading-section text-center">
                        <a href=""><button class="btn btn-secondary">
                                Contect Us
                            </button></a>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- -------------End Variety----------------------- -->

    <!-- -----------------product section-------------------- -->

    <!-- -----------------End product section-------------------- -->
@endsection
