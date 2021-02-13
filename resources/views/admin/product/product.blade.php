@extends('layouts.app')
@section('admin-content')
<div class="container">
    <br><br>
    <a onclick="addForm()" class="btn btn-sm btn-danger text-white" style="float: right;">Add New</a>

    <div class="table-responsive">
        <table id="product-table" class="table table-success table-striped">
            <thead>
                <tr>
                    <th width="30">ID</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
    
            </tbody>
        </table>
    </div>
</div>

@include('all-form.product-form');

@endsection

@push('scripts')
<script>
    var table1 = $('#product-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('all.product') }}",
        columns: [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'product_name',
                name: 'product_name'
            },
            {
                data: 'product_price',
                name: 'product_price'
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
        $('.modal-title').text('Add Product');
        $('#insertbutton').text('Add Product');
    }
    // Insert data by Ajax
    $(function() {
        $('#modal-form form').on('submit', function(e) {
            if (!e.isDefaultPrevented()) {
                var id = $('#id').val();
                if (save_method == 'add') url = "{{ url('product') }}";
                else url = "{{ url('product') . '/' }}" + id;
                $.ajax({
                    url: url,
                    type: "POST",
                    data: new FormData($("#modal-form form")[0]),
                    contentType: false,
                    processData: false,
                    success: function(data) {
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
            url: "{{ url('product') }}" + '/' + id + "/edit",
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('#modal-form').modal('show');
                $('.modal-title').text('Edit Product');
                $('#insertbutton').text('Update Product');
                // console.log(data);
                $('#id').val(data.id);
                $('#product_name').val(data.product_name);
                $('#cat_id').val(data.cat_id);
                $('#product_price').val(data.product_price);
                $('#product_des').val(data.product_des);
                // $('#product_image').val(data.product_image);
            },
            error: function() {
                alert("Nothing Data");
            }
        });
    }
    




    // //show single data ajax part here
    function showData(id) {
        $.ajax({
            url: "{{ url('product') }}" + '/' + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('#single-data').modal('show');
                $('.modal-title').text('Details');
                $('#productId').text(data.id);
                $('#productName').text(data.product_name);
                $('#productCategory').text(data.cat_id);
                $('#productDes').text(data.product_des);
                $('#productPrice').text(data.product_price);
                $('#productStatus').text(data.product_status);
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
                        url: "{{ url('product') }}" + '/' + id,
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