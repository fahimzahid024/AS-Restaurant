@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="grey-bg container-fluid">
                <section id="minimal-statistics">
                  <div class="row">
                    <div class="col-12 mt-3 mb-1">
                      <h4 class="text-uppercase text-center ">Ashiana Spices Dashboard</h4>
                      <p></p>
                    </div>
                  </div>
                  <div>
                    <h4 class='p-3'>Manage Category And Product</h4>
                  </div>
                <div class="row m-2">
                  <div class="col-xl-6 col-md-12">
                    <div class="card overflow-hidden">
                      <div class="card-content">
                        <div class="card-body cleartfix">
                          <div class="media align-items-stretch">
                            <div class="align-self-center">
                                <a href="{{ url('category') }}" style="text-decoration: none;"><i class="fab fa-cuttlefish p-3"></i></a>
                            </div>
                            <div class="media-body">
                                @php
                                  $total = DB::table('categories')->count('category_name');
                              @endphp
                              <a href="{{ url('category') }}" style="text-decoration: none;"><h4>Total Categories</h4></a>
                              <a href="{{ url('category') }}" style="text-decoration: none;"><span>Manage Category</span></a>
                            </div>
                            <div class="align-self-center">
                              <h1>{{ $total }}</h1>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              
                  <div class="col-xl-6 col-md-12">
                    <div class="card">
                      <div class="card-content">
                        <div class="card-body cleartfix">
                          <div class="media align-items-stretch">
                            <div class="align-self-center">
                                <a href="{{ url('product') }}" style="text-decoration: none;"><i class="fab fa-pinterest-square p-3"></i> </a>
                            </div>
                            <div class="media-body">
                                @php
                                    $totalProduct = DB::table('products')->count('product_name');
                                @endphp
                              <a href="{{ url('product') }}" style="text-decoration: none;"><h4>Total Products</h4></a>
                              <a href="href="{{ url('product') }}" style="text-decoration: none;""><span>Manage Product</span></a>
                            </div>
                            <div class="align-self-center"> 
                              <h1>{{ $totalProduct }}</h1>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div>
                    <h4 class='p-3'>Order Management</h4>
                </div>
                <div class="row m-2">
                  <div class="col-xl-6 col-md-12">
                    <div class="card mb-2">
                      <div class="card-content">
                        <div class="card-body cleartfix">
                          <div class="media align-items-stretch">
                            <div class="media-body">
                              <a href="{{ url('manage-order') }}"style="text-decoration: none;"><h4>Manage Order</h4></a>
                            </div>
                            <div class="align-self-center">
                                <i class="fas fa-truck-container"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              
                  <div class="col-xl-6 col-md-12">
                    <div class="card">
                      <div class="card-content">
                        <div class="card-body cleartfix">
                          <div class="media align-items-stretch">
                            @php
                                $totalOrder = DB::table('customers')->where('status',0)->count('status');
                            @endphp
                            <div class="media-body">
                                <a href="{{ url('manage-order') }}"style="text-decoration: none;"><h4>Pending Order</h4></a>
                              </div>
                            <div class="ml-5">
                                    <h4>{{ $totalOrder }}</h4>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
              </div>
        </div>
    </div>
</div>
@endsection
