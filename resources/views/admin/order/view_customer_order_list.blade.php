<!doctype html>
<html lang="en">

<head>
    <title>Ashiana Admin</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet"
        href="{{ asset('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css') }}"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="{{ asset('https://kit.fontawesome.com/557e2fff86.js') }}" crossorigin="anonymous"></script>
    <link
        href="{{ asset('https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,700;0,900;1,400;1,700&display=swap') }}"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('cartList/style.css') }}">
</head>

<body>



    <!----------------start cart section----------------------->
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
                @foreach ($shopping_id as $item)
                    <tr>
                        <td>
                            <div class="cart-info">
                                <img src="{{ asset('/images/' . $item->pdt_image) }}" alt="">
                                <div>
                                    <p>{{ $item->pdt_name }}</p>
                                    <small>{{ $item->pdt_price }}</small>
                                    <br>
                                    <a href="">Remove</a>
                                </div>
                            </div>
                        </td>
                        <td>{{ $item->pdt_quantity }}</td>
                        <td>{{ $item->pdt_subtotal }}</td>
                    </tr>
                @endforeach

            </table>

            <div class="total-price">
                <table>
                    <tr>
                        <td>Total:</td>
                        <td>$ {{ $item->pdt_total }}</td>
                    </tr>
                </table>

            </div>
            <div class="container">
                <a href="{{ route('order-done', $item->cart_id) }}"><button class="btn btn-primary"
                        style="font-size: 15px; align-items: center; background: orange;">Done</button></a>
                <a href="{{ url('manage-order') }}"><button class="btn btn-secondery"
                        style="font-size: 15px; align-items: center; ">Back</button></a>
            </div>

        </div>

    </section>
    <!---------------End cart section------------------->




    <!-- -----------------End of team section-------------------- -->

    <!-- ------------------footer start ---------------------------- -->




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('https://code.jquery.com/jquery-3.3.1.slim.min.js') }}"
        integrity="sha384-q8i/X+965DzO0rGF8kKXvvmYtT4zNGqicXRjvuAnmmbvPZXvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js') }}"
        integrity="sha384-UO2eT0CpHqdSXgi164MCGG3u5RKXaBGVBabmxQTVRAAVEwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="{{ asset('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js') }}"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
