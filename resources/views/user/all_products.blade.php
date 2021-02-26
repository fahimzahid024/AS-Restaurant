@extends('layouts.test')
@section('content')

    <!-- -----------------product section-------------------- -->
    <section id="variety" class="variety pt-4">

        <div class="container">
            <div class="section-title">
                <h2 style="color: #fdc134;" class="text-center font-weight-bold">
                    Products
                </h2>
            </div>
            <div class="row">

                @if (!$product->isEmpty())
                    @foreach ($product as $item)
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
                        {{ $product-> links()}}
                       </div>
                 </div>


            </div>

        </div>
    </section>
    <!-- -----------------End product section-------------------- -->
@endsection
