@extends('layouts.test')
@section('content')



    <section id="variety" class="variety pt-4">

        <div class="container">
            <div class="section-title">
                <h2 style="color: #fdc134;" class="text-center font-weight-bold">
                    Recently Add Product
                </h2>
                <br><br>



            </div>
            <div class="row" id="ProductData"> 
                @if(!$products->isEmpty())
                    @foreach ($products as $item)
                    <div class="col-md-4">
                        <a href="{{ route('view.more', $item->id) }}">
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
                    <!--  -->
                    @endforeach
                @else 
                    <h1>Not found any product </h1>
                @endif

                <div class="container my-4 float-left">
                    <div class="text-center">
                        {{ $products-> links()}}
                       </div>
                 </div>
                


            </div>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <a href="{{ route('all-product') }}" class="btn btn-prod d-block">
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
                        <a href=""><button class="btn btn-secondary">{{-- {{ route('contact-us') }} --}}
                                Contect Us
                            </button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
