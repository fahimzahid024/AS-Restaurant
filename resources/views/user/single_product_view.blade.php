@extends('layouts.test')
@section('content')
    @foreach ($single_product as $item)
        <!---------------single product details------>
        <section class="view-product">
            @include('includes.message')
            <div class="container" id="container">
                <div class="row">
                    <div class="col-md-5">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="img-view" style="height: 300px; width:350px;"
                                        src="{{ asset('/images/' . $item->product_image) }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h2>{{ $item->product_name }}</h2>
                        <p class="prices" data-price={{ $item->product_price }}>USD $ {{ $item->product_price }}</p>
                        <p><b>Availability : In Stack</b></p>
                        <form action="{{ route('add-to-cart', $item->id) }}" method="POST">{{--  --}}
                            @csrf
                            <label>Qty : </label>
                            <input type="number" class="qty" onchange="changePrice()" name="qty" value="1">
                            <br><button type="submit" class="btn btn-default carts">add-to-cart</button>
                        </form>
                    </div>

                </div>
            </div>
        </section>

        <!---------------single product details------>
    @endforeach


@endsection
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
    function changePrice() {
        const quentity = $('.qty').val();
        if (quentity > 0) {
            const price = $('.prices').data('price');
            const amount = quentity * price;
            $('.prices').html(`USD $${amount}`);
        } else {
            $('.qty').val(1);
        }
    }

    $(".qty").keypress(function(evt) {
        evt.preventDefault();
        console.log('hello world');
        changePrice();
    });

</script>
