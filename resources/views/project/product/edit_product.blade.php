@extends('project.pos_dashboard')
@section('main')

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Add Product</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Inventory</a></li>
                        <li><a href="#">Product</a></li>
                        <li class="active">Add Product</li>
                    </ol>
                </div>
            </div>
            <div class="row ">                
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">Add Product</h3></div>
                        <div class="panel-body">
                            <form action="{{ route('product.update', ['product' => $product->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="product_name">Product Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="product_name" value="{{ $product->product_name }}" name="product_name">
                                </div>
                                @error('product_name')
                                    <div class="error">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="cat_id">Category <span class="text-danger">*</span></label>
                                    <select name="cat_id" id="cat_id" class="form-control">
                                        @foreach ($category as $cat) 
                                            <option value="{{ $cat->id }}" @selected( $product->cat_id == $cat->id )>{{ $cat->cat_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('cat_id')
                                    <div class="error">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="sup_id">Supplier <span class="text-danger">*</span></label>
                                    <select name="sup_id" id="sup_id" class="form-control">
                                        <option value="{{ $product->sup_id }}" selected>{{ $product->supplier->name }}</option>
                                        @foreach ($supplier as $sup) 
                                            <option  value="{{ $sup->id }}">{{ $sup->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('sup_id')
                                    <div class="error">{{ $message }}</div>
                                @enderror     
                                
                                <div class="form-group">
                                    <label for="product_code">Product Code <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="product_code" value="{{ $product->product_code }}" name="product_code">
                                </div>
                                @error('product_code')
                                    <div class="error">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="product_godown">Product Godown <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="product_godown" value="{{ $product->product_godown }}" name="product_godown">
                                </div>
                                @error('product_godown')
                                    <div class="error">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="product_route">Product Route <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="product_route" value="{{ $product->product_route }}" name="product_route">
                                </div>
                                @error('product_route')
                                    <div class="error">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="buying_date">Buying Date <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="buying_date" name="buying_date" value="{{ $product->buying_date }}">
                                </div>
                                @error('buying_date')
                                    <div class="error">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="buying_price">Buying Price <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="buying_price" value="{{ $product->buying_price }}" name="buying_price">
                                </div>
                                @error('buying_price')
                                    <div class="error">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="selling_price">Selling Price <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="selling_price" value="{{ $product->selling_price }}" name="selling_price">
                                </div>
                                @error('selling_price')
                                    <div class="error">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="expire_date">Expire Date <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="expire_date" name="expire_date" value="{{ $product->expire_date }}">
                                </div>
                                @error('expire_date')
                                    <div class="error">{{ $message }}</div>
                                @enderror


                                <div class="form-group">
                                    <img  style="width: 300px;  border: 2px solid gray" src="{{ asset('uploads/product/'. $product->product_image) }}" id="image" ><br>
                                    <label for="product_image">Product Image  <span class="text-danger">*</span> </label>
                                    <input type="file" class="form-control" id="product_image"  name="product_image" accept="image/*" onchange="readURL(this)" >
                                </div>
                                @error('product_image')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                                
                                
                                <button type="submit" class="btn btn-purple waves-effect waves-light">Update Product</button>
                            </form>
                        </div><!-- panel-body -->
                    </div> <!-- panel -->
                </div> <!-- col-->
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#image')
                    .attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    
</script>
@endsection