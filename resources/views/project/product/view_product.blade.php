@extends('project.pos_dashboard')
@section('main')

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">View Product data</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Inventory</a></li>
                        <li><a href="#">Employee</a></li>
                        <li class="active">View Product Data</li>
                    </ol>
                </div>
            </div>
            <div class="row ">
                <!-- Basic example -->
                
                
                <div class="col-md-2"></div>
                <div class="col-md-8">

                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">View Product Information </h3></div>
                        <div class="panel-body">

                                <div class="form-group">
                                    <div class="row ">
                                        <div class="col-md-3"> <label for="photo">Product Image : </label> </div>
                                        <div class="col-md-9">
                                            <img  style="width: 300px; border: 2px solid gray; " src="{{ asset('uploads/product/'. $product->product_image) }}" id="image" ><br>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3"> <label>Product Name :  </label> </div>
                                        <div class="col-md-9"><label for="">{{ $product->product_name }}</label> </div>
                                    </div>
                    
                                </div>

                               

                                <div class="form-group">
                                    <div class="row ">
                                        <div class="col-md-3"> <label>Product Category :</label> </div>
                                        <div class="col-md-9"><label for="category"> {{ $product->category->cat_name }}</label></div>

                                    </div>
                                    
                                    
                                </div>
       
                                <div class="form-group">
                                    <div class="row ">
                                        <div class="col-md-3"> <label>Supplier :</label> </div>
                                        <div class="col-md-9"><label for="supplier"> {{ $product->sup_id }}</label></div>
                                    </div>
                                    
                                    
                                </div>

                                <div class="form-group">
                                    <div class="row ">
                                        <div class="col-md-3"> <label>Product Code :</label> </div>
                                        <div class="col-md-9"> <label for="product_code"> {{ $product->product_code }}</label></div>
                                    </div>
                                   
                                    
                                </div>

                                <div class="form-group">
                                    <div class="row ">
                                        <div class="col-md-3"> <label>Product Godown :</label> </div>
                                        <div class="col-md-9"><label for="godown"> {{ $product->product_godown }}</label></div>
                                    </div>                                    
                                </div>

                                <div class="form-group">
                                    <div class="row ">
                                        <div class="col-md-3"> <label>Product Route :</label> </div>
                                        <div class="col-md-9"><label for="route"> {{ $product->product_route }}</label></div>
                                    </div>                                    
                                </div>

                                <div class="form-group">
                                    <div class="row ">
                                        <div class="col-md-3"> <label>Buying Date :</label> </div>
                                        <div class="col-md-9"><label for="buying"> {{ $product->buying_date }}</label></div>
                                    </div>                                    
                                </div>

                                <div class="form-group">
                                    <div class="row ">
                                        <div class="col-md-3"> <label>Expire Date :</label> </div>
                                        <div class="col-md-9"><label for="expire"> {{ $product->expire_date }}</label></div>
                                    </div>                                    
                                </div> 

                                <div class="form-group">
                                    <div class="row ">
                                        <div class="col-md-3"> <label>Buying Price :</label> </div>
                                        <div class="col-md-9"><label for="buying"> {{ $product->buying_price }}</label></div>
                                    </div>                                    
                                </div>

                                <div class="form-group">
                                    <div class="row ">
                                        <div class="col-md-3"> <label>Selling Price :</label> </div>
                                        <div class="col-md-9"><label for="sell"> {{ $product->selling_price }}</label></div>
                                    </div>                                    
                                </div>
                                
                                
                                <a href="{{ route('product.edit' , ['product' => $product->id]) }}" class="btn btn-info">Edit Now</a>
                        </div><!-- panel-body -->
                    </div> <!-- panel -->
                </div> <!-- col-->
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>
</div>





@endsection