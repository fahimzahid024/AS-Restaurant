@if(!$data->isEmpty())
    @php($i=0)
    @foreach ($data as $item)
        <div class="col-md-4">
            
            <div class="card mb-3" style="max-width: 540px">
                <a href="{{ route('categroy_product', $item->category_id) }}">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img 
                            src="{{ asset('/images/'.$item->cat_image) }}"
                            alt="..."
                            class="img-fluid"
                            />
                        </div>
                        <div class="col-md-8">
                            <div class="card-body" style="align-content: center">
                            <h5 class="card-title" style="font-weight: 800">{{ $item->category_name }}</h5>
                            <p class="card-text">
                                {{$item->cat_des}}
                            </p>
                            <p class="card-text">
                                <small class="text-muted">{{ $item->category_id }}</small>
                            </p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @php($i++)
            @php($lastId = $item->category_id)
        </div>

    @endforeach
    @if ($i == 3)
    <div id="removeAfterReload" class="container my-4">
        <div class="text-center">
             <button id="loadMoreData" type="button" data-id="{{ $lastId }}" class="btn btn-prod">View More Category</button>
           </div>
     </div>
    @endif
    
@else
    <h1>Not found any category</h1>
@endif

