@extends('layouts.app')
@section('admin-content')
<div class="container">
    <br><br>
    @if (Session('message'))
        <div class="alert bg-success" role="alert">
            <a href="#" class="close" data-dismiss="alert">×</a>
            {{ Session('message') }}
        </div>

    @endif

    <div class="table-responsive">
        <table id="customer-table" class="table table-success table-striped">
            <thead>
                <tr>
                    <th width="30">ID</th>
                    <th>Customer Name</th>
                    <th>Customer Phone</th>
                    <th>Customer Email</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
    
            </tbody>
        </table>
    </div>
</div>
{{-- <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
      	<h4 class="modal-title" id="myModalLabel"></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        
      </div>
      <div class="modal-body">
       <form method="post" data-toogle="validator">
       	@csrf {{ method_field('POST') }}
         <div class="form-group">
         <input type="hidden" name="id" id="id">
           <label for="exampleInputEmail1">Title</label>
           <input type="text" class="form-control" name="title" id="title" placeholder="Title" required="" autofocus="">
         </div>
         <div class="form-group">
           <label for="exampleInputEmail1">Author </label>
           <input type="text" class="form-control" name="author" id="author" placeholder="Author" required="" autofocus="">
         </div>
         <div class="form-group">
           <label for="exampleInputEmail1">Details </label>
           <textarea class="form-control" row='3' name="details" id="details" required></textarea>
         </div>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="insertbutton"></button>
      </div>
      </form>
    </div>
  </div>
</div> --}}
@endsection

@push('scripts')
<script>
    var table1 = $('#customer-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('all.customer') }}",
        columns: [{
                data: 'customer_id',
                name: 'customer_id'
            },
            {
                data: 'customerName',
                name: 'customerName'
            },
            {
                data: 'CustomerPhoneNumber',
                name: 'CustomerPhoneNumber'
            },
            {
                data: 'CustomerEmail',
                name: 'CustomerEmail'
            },
            {
              data: 'status', 
              name: 'status',
              render: function ( data, type, full, meta ) {
              // return data ? "Pending" : "Delivered" ;
              return data ? '<a class="btn btn-outline-primary">Delivered</a>' : '<a class="btn btn-outline-danger">Pending</a>' ;

            }
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            }
        ]
    });

    function addForm() {
        save_method = "add";
        $('input[name=_method]').val('POST');
        $('#modal-form').modal('show');
        $('#modal-form form')[0].reset();
        $('.modal-title').text('Add Category');
        $('#insertbutton').text('Add Category');
    }
    
    //show single data ajax part here
    function showData(id){
      let url = "{{ route('manage-order-list', ':id') }}";
      url = url.replace(':id', id);
      document.location.href=url;
    }
    function deleteData(id){
      let url = "{{ route('delete-customer', ':id') }}";
      url = url.replace(':id', id);
      document.location.href=url;
    }


    
</script>
@endpush