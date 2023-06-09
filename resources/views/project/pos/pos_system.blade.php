@extends('project.pos_dashboard')
@section('main')

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12 bg-info ">
                    <h4 class="pull-left page-title text-white">POS (Point Of Sale)</h4>
                    <ol class="breadcrumb pull-right">
                        <li class="text-white">Date: {{ date('d/m/y') }}</li>
                    </ol>
                </div>
            </div>
            <br>
            
                 <h4 class="text-info">Categories</h4>
                @foreach($categories as $category)
                    <span class="label label-success">{{ $category->cat_name }}</span>
                @endforeach

           
            <br>
            <br>
            <div class="row "> 
                <div class="col-md-4">
                    <h3 class="bg-primary text-white">Customer <button class="btn btn-warning btn-sm pull-right waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal">Add New</button> </h3>
                    <select name="customer_name" id="" class="form-control">
                        <option value="" selected disabled >Select a customer</option>
                        @foreach($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach
                    </select>
                    <br>
                        <div class="price_card text-center">
                            <div>
                               <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Total Price</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <tr>
                                            <td>asd</td>
                                            <td><input style="width: 60px" type="number" name="" id=""></td>
                                            <td>200/=</td>
                                            <td>400/=</td>
                                        </tr>
                                    </tbody>
                                
                                </table> 
                            </div>
                            
                            <div class="pricing-header bg-primary">
                                <h4 class="text-white">Quantity: 23<span class="text-white">
                                </span></h4>
                                <h4 class="text-white">Product: 34<span class="text-white">
                                </span></h4>
                                <h3 class="text-white">Total Price: 500 /=<span class="text-white">
                                    </span></h3>
                            </div>
                            <button class="btn btn-primary waves-effect waves-light w-md">Submit</button>
                        </div> <!-- end Pricing_card -->
                </div>
                <div class="col-md-8">
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Product Image</th>
                                <th>Product Name</th>
                                <th>Product Code</th>
                                <th>Product Category</th> 
                            </tr>
                        </thead>
                
                        <tbody>
                            @foreach($products as $product)     
                            <tr>
                                <td><a href=""><i class="fa-solid fa-square-plus text-primary" style="font-size: 25px"></i></a> <img height="70" width="70" src="{{ asset('uploads/product') }}/{{ $product->product_image  }}" alt=""></td>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->product_code }}</td>
                                <td>{{ $product->category->cat_name }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> <!-- col-->
            </div>
        </div>
    </div>
</div>




//MODAL START 

<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title">Add Customer</h4> 
            </div> 
            <div class="modal-body"> 
        
                <div class="row"> 
                    <div class="col-md-4"> 
                        <div class="form-group"> 
                            <label for="field-4" class="control-label">Name</label> 
                            <input type="text" class="form-control" id="field-4" name="name" placeholder="Name"> 
                        </div> 
                    </div> 
                    <div class="col-md-4"> 
                        <div class="form-group"> 
                            <label for="field-5" class="control-label">Email</label> 
                            <input type="text" class="form-control" id="field-5" placeholder="Email" name="email"> 
                        </div> 
                    </div> 
                    <div class="col-md-4"> 
                        <div class="form-group"> 
                            <label for="field-6" class="control-label">Phone</label> 
                            <input type="text" class="form-control" id="field-6" placeholder="Phone" name="phone"> 
                        </div> 
                    </div> 
                </div> 

                <div class="row"> 
                    <div class="col-md-4"> 
                        <div class="form-group"> 
                            <label for="field-6" class="control-label">Address</label> 
                            <input type="text" class="form-control" id="field-6" placeholder="Address" name="address"> 
                        </div> 
                    </div>
                    <div class="col-md-4"> 
                        <div class="form-group"> 
                            <label for="field-4" class="control-label">City</label> 
                            <input type="text" class="form-control" id="field-4" placeholder="City" name="city"> 
                        </div> 
                    </div> 
                    <div class="col-md-4"> 
                        <div class="form-group"> 
                            <label for="field-5" class="control-label">Shop Name</label> 
                            <input type="text" class="form-control" id="field-5" placeholder="Shop Name" name="shop_name"> 
                        </div> 
                    </div> 
 
                </div> 

                <div class="row"> 
                    <div class="col-md-4"> 
                        <div class="form-group"> 
                            <label for="field-4" class="control-label">Bank Name</label> 
                            <input type="text" class="form-control" id="field-4" placeholder="Bank Name" name="bank_name"> 
                        </div> 
                    </div> 
                    <div class="col-md-4"> 
                        <div class="form-group"> 
                            <label for="field-5" class="control-label">Bank Branch</label> 
                            <input type="text" class="form-control" id="field-5" placeholder="Bank Branch" name="bank_branch"> 
                        </div> 
                    </div> 
                    <div class="col-md-4"> 
                        <div class="form-group"> 
                            <label for="field-6" class="control-label">Account Name</label> 
                            <input type="text" class="form-control" id="field-6" placeholder="Account Name" name="account_name"> 
                        </div> 
                    </div> 
                </div> 

                <div class="row"> 
                    <div class="col-md-4"> 
                        <div class="form-group"> 
                            <label for="field-4" class="control-label">Account Number</label> 
                            <input type="number" class="form-control" id="field-4" placeholder="Account Number" name="account_number"> 
                        </div> 
                    </div> 
                    <div class="col-md-4"> 
                        <div class="form-group"> 
                            <label for="field-5" class="control-label">Customer Photo</label> 
                            <img  style="width: 70px; height: 70px;  border: 2px solid gray" src="{{ asset('uploads/demo.png') }}" id="image" >
                        </div> 
                    </div> 

                    <div class="col-md-4"> 
                        <div class="form-group"> 
                            <label for="field-4" class="control-label">Choose Photo</label> 
                            <input type="file" class="form-control" id="photo"  name="photo" accept="image/*" onchange="readURL(this)" >
                        </div> 
                    </div>
                </div> 

            </div> 
            <div class="modal-footer"> 
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> 
                <button type="button" class="btn btn-info waves-effect waves-light">Save changes</button> 
            </div> 
        </div> 
    </div>
</div><!-- /.modal -->

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