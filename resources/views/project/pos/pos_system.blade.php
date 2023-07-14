@extends('project.pos_dashboard')
@section('main')

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12 bg-primary ">
                    <h4 class="pull-left page-title text-white">POS (Point Of Sale)</h4>
                    <ol class="breadcrumb pull-right">
                        <li class="text-white">Date: {{ date('d/m/y') }}</li>
                    </ol>
                </div>
            </div>
            <br>
            
                 <h4 class="text-info">Categories</h4>
                @foreach($categories as $category)
                    <span class="label label-danger">{{ $category->cat_name }}</span>
                @endforeach

           
            <br>
            <br>
            <div class="row "> 
                <div class="col-md-6">
                    
                    <br>
                        <div class="price_card text-center">
                            <div>
                               <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    @php
                                       $show_cart = Cart::content();
                                    @endphp
                                    <tbody>
                                        @foreach($show_cart as $show)
                                            <tr>
                                                <td>{{ $show->name }}</td>
                                                <td>
                                                    <form action="{{ route('update.cart', $show->rowId ) }}" method="post">
                                                    @csrf
                                                    <input  style="width: 40px" type="number" name="qty" min="1" value="{{ $show->qty }}">
                                                    <button type="submit" style="margin-top: -2px" class="btn btn-success"><i class="fa-solid fa-check"></i></button>
                                                    </form>
                                                </td>
                                                <td>{{ $show->price }}</td>
                                                <td>{{ $show->price*$show->qty }}</td>
                                                <td>
                                                    <a href="{{ route('remove.cart', $show->rowId) }}" class="text-danger btn"><i class="fa-solid fa-trash-can"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        
                                    </tbody>
                                
                                </table> 
                            </div>
                            
                            <div class="pricing-header bg-primary">
                                <h4 class="text-white">Quantity: {{ Cart::count() }}<span class="text-white">
                                </span></h4>
                                <h4 class="text-white">Sub Total: {{ Cart::subtotal() }}<span class="text-white">
                                </span></h4>
                                <h4 class="text-white">Vat: {{ Cart::tax() }}<span class="text-white">
                                </span><span style="font-size: 14px; font-weight:normal">(Included 10% vat)</span></h4>
                                <hr>
                                <h3 class="text-white">Total Price: {{ Cart::total() }} /=<span class="text-white">
                                    </span></h3>
                                    <br>
                            </div>
                            <br>

                            <h3 class="bg-primary text-white">Add Customer <button class="btn btn-warning btn-sm pull-right waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal" style="margin: 0">Add New</button> </h3> 
                            <form action="{{ route('view.invoice') }}" method="post">
                                @csrf
                                <select name="customer_name" id="" class="form-control">
                                    <option value="" selected disabled >Select a customer</option>
                                    @foreach($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                    @endforeach
                                </select>
                                @error('customer_name')
                                    <p class="text-danger" style="text-align:left">Please Select a customer before submit</p>
                                @enderror

                                <button class="btn btn-primary waves-effect waves-light w-md">Create Invoice</button>
                            </form>
                            
                        </div> <!-- end Pricing_card -->
                </div>

                <div class="col-md-6">
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Product Image</th>
                                <th>Product Name</th>
                                <th>Product Code</th>
                                <th>Product Category</th> 
                                <th>Add</th> 
                            </tr>
                        </thead>
                
                        <tbody>
                            @foreach($products as $product)   
                            <tr>
                                    <form action="{{ route('add.cart') }}" method="post">
                                    @csrf
                                            <input type="hidden" name="id" value="{{ $product->id }}">
                                            <input type="hidden" name="name" value="{{ $product->product_name }}">
                                            <input type="hidden" name="qty" value="1">
                                            <input type="hidden" name="price" value="{{ $product->selling_price }}">

                                            <td><img height="70" width="70" src="{{ asset('uploads/product') }}/{{ $product->product_image  }}" alt=""></td>
                                            <td>{{ $product->product_name }}</td>
                                            <td>{{ $product->product_code }}</td>
                                            <td>{{ $product->category->cat_name }}</td>
                                            <td><button type="submit" class="btn"><i class="fa-solid fa-square-plus text-primary" style="font-size: 25px"></i></button> </td>
                                    </form>  
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
        <form action="{{ route('store.customer') }}" method="post" enctype="multipart/form-data">
            @csrf
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
                            <input type="email" class="form-control" id="field-5" placeholder="Email" name="email"> 
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
                <button type="submit" class="btn btn-info waves-effect waves-light">Submit</button> 
            </div> 
        </form>
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