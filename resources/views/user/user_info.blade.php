@extends('layouts.test')

@section('content')
    <div style="background-image: url('/frontend/images/hero2.jpg');">
        <div class="mt-0"></div>
        <div id="user-container" class="container">
            @if (Session('message'))
                <div class="alert bg-success" role="alert">
                    <a href="#" class="close" data-dismiss="alert">×</a>
                    {{ Session('message') }}
                </div>

            @endif
            <form action="{{ route('buyer-info') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label style="color:white">Name</label>
                    <input type="data" name="customerName" class="form-control" id="exampleInputUsername1"
                        aria-describedby="emailHelp" placeholder="full name*">

                </div>

                <div class="form-group">
                    <label style="color:white" for="exampleInputEmail1">Email</label>
                    <input name="CustomerEmail" type="email" class="form-control" id="exampleInputEmail1"
                        placeholder="email*">
                </div>

                <div class="form-group">
                    <label style="color:white" for="exampleInputPhone1">Phone <small>{without country code}</small></label>
                    <input name="CustomerPhoneNumber" type="phone" class="form-control" id="exampleInputPhone1"
                        placeholder="0 7123456789">
                        {{-- <input type="text" name="number" class="form-control" placeholder="+1 (999) 999 9999" /> --}}
                </div>

                <div class="text-center ">
                    <button id="about-btn" type="submit" style="margin-top: 30px;" class="btn btn-primary">Confirm
                        Order</button>
                </div>


            </form>
        </div>
    </div>

@endsection
