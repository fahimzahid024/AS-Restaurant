<!--Data Insert modal here-->
<!-- Modal -->
<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
  
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel"></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          
          @php
              $category = DB::table('categories')->get();
          @endphp
        </div>
        <div class="modal-body">
         <form method="post" data-toogle="validator" enctype="multipart/form-data">
             @csrf {{ method_field('POST') }}
              <div class="form-group">
              <input type="hidden" name="id" id="id">
                <label for="exampleInputEmail1">Product Name</label>
                <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Product Name*" required="" autofocus="">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Category Name </label>
                  <select class="form-control" name="cat_id" id="cat_id">
                    <option value="">Select Category</option> 
                      @foreach ($category as $item)
                          <option value="{{ $item->id }}">
                              {{ ucwords($item->category_name) }}
                          </option>
                      @endforeach
                  </select>
              </div>
              <div class="form-group">
                  <label for="exampleInputEmail1">Product Price</label>
                  <input type="text" class="form-control" name="product_price" id="product_price" placeholder="Product Price*" required="" autofocus="">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Product Description</label>
                <textarea class="form-control" row='3' name="product_des" id="product_des" required></textarea>
              </div>  
              <div class="form-group">
                <label for="exampleInputEmail1">Product Price</label>
                <input type="file" class="form-control" name="product_image" id="product_image">
              </div>
            </div>
            
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" id="insertbutton"></button>
            </div>
        </form>
      </div>
    </div>
  </div>
  
  <!--SIngle data show are here-->
  <div class="modal fade" id="single-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel" align="center"></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
   
        </div>
        <div class="modal-body">
          <ul class="list-group">
            <li class="list-group-item">ID: <span class="text-danger" id="productId"></span></li>
            <li class="list-group-item">Product Name: <span class="text-danger" id="productName"></span> </li>
            <li class="list-group-item">Category Name: <span class="text-danger" id="productCategory"></span></li>
            <li class="list-group-item">Product Description: <span class="text-danger" id="productDes"></span></li>
            <li class="list-group-item">Product Price: <span class="text-danger" id="productPrice"></span></li>
          </ul>
      </div>
    </div>
  </div>