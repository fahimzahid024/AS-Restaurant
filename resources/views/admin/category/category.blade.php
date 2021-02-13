@extends('layouts.app')
@section('admin-content')
<div class="container">
    <br><br>
    <a onclick="addForm()" class="btn btn-sm btn-danger text-white" style="float: right;">Add New</a>

    <div class="table-responsive">
        <table id="category-table" class="table table-success table-striped">
            <thead>
                <tr>
                    <th width="30">ID</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
    
            </tbody>
        </table>
    </div>
</div>

@include('all-form.category-form');
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
    var table1 = $('#category-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('all.category') }}",
        columns: [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'category_name',
                name: 'category_name'
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
    // Insert data by Ajax
    $(function() {
        $('#modal-form form').on('submit', function(e) {
            if (!e.isDefaultPrevented()) {
                var id = $('#id').val();
                if (save_method == 'add') url = "{{ url('category') }}";
                else url = "{{ url('category') . '/' }}" + id;
                $.ajax({
                    url: url,
                    type: "POST",
                    data: new FormData($("#modal-form form")[0]),
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        // console.log(data);
                        $('#modal-form').modal('hide');
                        table1.ajax.reload();
                        swal({
                            title: "Good job!",
                            text: "Category inserted successfully!",
                            icon: "success",
                            button: "Great!",
                        });
                    },
                    error: function(data) {
                        console.log(data);
                        swal({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something Wrong!'
                        })
                    }
                });
                return false;
            }
        });
    });

    //edit ajax request are here
    function editForm(id) {
        save_method = 'edit';
        $('input[name=_method]').val('PATCH');
        $('#modal-form form')[0].reset();
        $.ajax({
            url: "{{ url('category') }}" + '/' + id + "/edit",
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('#modal-form').modal('show');
                $('.modal-title').text('Edit Post');
                $('#insertbutton').text('Update Post');
                $('#id').val(data.id);
                $('#category_name').val(data.category_name);
            },
            error: function() {
                swal({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something Wrong!'
                })
            }
        });
    }

    //show single data ajax part here
    function showData(id) {
        $.ajax({
            url: "{{ url('category') }}" + '/' + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('#single-data').modal('show');
                $('.modal-title').text('Details');
                $('#categoryid').text(data.id);
                $('#categoryname').text(data.category_name);
                console.log(data);
            },
            error: function() {
                swal({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Ghorar DIm!'
                });
            }
        });
    }

    function deleteData(id) {
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "{{ url('category') }}" + '/' + id,
                        type: "POST",
                        data: {
                            '_method': 'DELETE',
                            '_token': csrf_token
                        },
                        success: function(data) {
                            table1.ajax.reload();
                            swal({
                                title: "Delete Done!",
                                text: "You clicked the button!",
                                icon: "success",
                                button: "Done",
                            });
                        },
                        error: function() {
                            swal({
                                title: 'Oops...',
                                text: data.message,
                                type: 'error',
                                timer: '1500'
                            })
                        }
                    });
                } else {
                    swal("Your imaginary file is safe!");
                }
            });
    }
</script>
@endpush