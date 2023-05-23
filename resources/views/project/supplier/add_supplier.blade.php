@extends('project.pos_dashboard')
@section('main')

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Add Supplier</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Inventory</a></li>
                        <li><a href="#">Supplier</a></li>
                        <li class="active">Add Supplier</li>
                    </ol>
                </div>
            </div>
            <div class="row ">                
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">Add Supplier</h3></div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="panel-body">
                            <form action="{{ route('store.supplier') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name <span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
                                </div>
      
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                                </div>
   
                                <div class="form-group">
                                    <label for="phone">Phone <span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control" id="phone" placeholder="Enter phone" name="phone">
                                </div>

                                <div class="form-group">
                                    <label for="address">Address <span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control" id="address" placeholder="Enter address" name="address">
                                </div>
   
                                <div class="form-group">
                                    <label for="city">City <span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control" id="city" placeholder="Enter city" name="city">
                                </div>

                                <div class="form-group">
                                    <label for="supplier_type">Supplier Type <span class="text-danger">*</span> </label>
                                    <select name="supplier_type" id="supplier_type" class="form-control">
                                        <option value="distributor">Distributor</option>
                                        <option value="whole_seller">Whole Seller</option>
                                        <option value="brochure">Brochure</option>
                                    </select>
                                </div>
                                   
                                <div class="form-group">
                                    <label for="shop_name">Shop Name <span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control" id="shop_name" placeholder="Enter Shop name" name="shop_name">
                                </div>

                                <div class="form-group">
                                    <label for="bank_name">Bank Name</label>
                                    <input type="text" class="form-control" id="bank_name" placeholder="Enter Bank Name" name="bank_name">
                                </div>
 
                                <div class="form-group">
                                    <label for="bank_branch">Bank Branch</label>
                                    <input type="text" class="form-control" id="bank_branch" placeholder="Enter Bank Branch" name="bank_branch">
                                </div>
 
                                <div class="form-group">
                                    <label for="account_name">Account Name</label>
                                    <input type="text" class="form-control" id="account_name" placeholder="Enter Account Name" name="account_name">
                                </div>
                                <div class="form-group">
                                    <label for="account_number">Account Number</label>
                                    <input type="number" class="form-control" id="account_number" placeholder="Enter Account Number" name="account_number">
                                </div>

                                <div class="form-group">
                                    <img  style="width: 70px; height: 70px; border-radius: 50%; border: 2px solid gray" src="{{ asset('uploads/demo.png') }}" id="image" ><br>
                                    <label for="photo">Photo <span class="text-danger">*</span> </label>
                                    <input type="file" class="form-control" id="photo"  name="photo" accept="image/*" onchange="readURL(this)" >
                                </div>

                                
                                <button type="submit" class="btn btn-purple waves-effect waves-light">Add Supplier</button>
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