@extends('layouts.test')
@section('content')
    @php
    $cartProduct = \Cart::getContent()
    @endphp

    <section class="cart-section">

        <div class="container cart-page">
            @if (Session('message'))
                <div class="alert bg-success" role="alert">
                    <a href="#" class="close" data-dismiss="alert">×</a>
                    {{ Session('message') }}
                </div>

            @endif
            <table class="table table-bordered">
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
                @if (count(\Cart::getContent()) > 0)
                    @foreach ($cartProduct as $item)
                        <tr>
                            <td>
                                <div class="cart-info">
                                    <img src="/images/{{ $item->attributes->image }}" alt="">
                                    <div>
                                        <p>{{ $item->name }}</p>
                                        <small>{{ $item->price }}</small>
                                        <br>
                                        <a href="{{ route('item.remove', $item->id) }}">Remove</a>
                                    </div>
                                </div>
                            </td>
                            <td><input type="number" value="{{ $item->quantity }}"></td>
                            <td>{{ \Cart::get($item->id)->getPriceSum() }}</td>
                        </tr>
                    @endforeach

                @else
                    <li class="list-group-item">Your Cart is Empty</li>
                @endif

            </table>

            <div class="total-price">
                <table>
                    <tr>
                        <td>Total:</td>
                        <td>${{ \Cart::getTotal() }}</td>
                    </tr>
                </table>
            </div>

            <div>
                @if (count(\Cart::getContent()) == 0)
                    <a href="{{ route('empty-cart') }}"><button id="order-button" class="btn btn-warning" style="">Order Now
                        </button></a>
                @else
                    <a href="{{ route('order-now') }}"><button id="order-button" class="btn btn-warning" style="">Order Now
                        </button></a>{{--  --}}
                @endif
            </div>

        </div>

    </section>
@endsection
