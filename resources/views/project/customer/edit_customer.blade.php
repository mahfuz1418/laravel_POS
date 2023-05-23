@extends('project.pos_dashboard')
@section('main')

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Edit Customer Information</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Inventory</a></li>
                        <li><a href="#">Customer</a></li>
                        <li class="active">Edit Customer</li>
                    </ol>
                </div>
            </div>
            <div class="row ">                
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">Edit Customer Information</h3></div>
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
                            <form action="{{ route('update.customer', ['id' => $single_customer->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name <span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control" id="name" value="{{ $single_customer->name }}" name="name">
                                </div>
      
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" id="email" value="{{ $single_customer->email }}" name="email">
                                </div>
   
                                <div class="form-group">
                                    <label for="phone">Phone <span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control" id="phone" value="{{ $single_customer->phone }}" name="phone">
                                </div>

                                <div class="form-group">
                                    <label for="address">Address <span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control" id="address" value="{{ $single_customer->address }}" name="address">
                                </div>
   
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control" id="city" value="{{ $single_customer->city }}" name="city">
                                </div>
                                   
                                <div class="form-group">
                                    <label for="shop_name">Shop Name <span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control" id="shop_name" value="{{ $single_customer->shop_name }}" name" name="shop_name">
                                </div>

                                <div class="form-group">
                                    <label for="bank_name">Bank Name</label>
                                    <input type="text" class="form-control" id="bank_name" value="{{ $single_customer->bank_name }}" name="bank_name">
                                </div>
 
                                <div class="form-group">
                                    <label for="bank_branch">Bank Branch</label>
                                    <input type="text" class="form-control" id="bank_branch" value="{{ $single_customer->bank_branch }}" name="bank_branch">
                                </div>
 
                                <div class="form-group">
                                    <label for="account_name">Account Name</label>
                                    <input type="text" class="form-control" id="account_name"value="{{ $single_customer->account_name }}" name="account_name">
                                </div>
                                <div class="form-group">
                                    <label for="account_number">Account Number</label>
                                    <input type="number" class="form-control" id="account_number" value="{{ $single_customer->account_number }}" name="account_number">
                                </div>

                                <div class="form-group">
                                    <img  style="width: 70px; height: 70px; border-radius: 50%; border: 2px solid gray" src="{{ (!empty($single_customer->photo)) ? asset('uploads/customer/' . $single_customer->photo) : asset('uploads/demo.png') }}" id="image" ><br>
                                    <label for="photo">Photo</label>
                                    <input type="file" class="form-control" id="photo"  name="photo" accept="image/*" onchange="readURL(this)" >
                                </div>

                                
                                <button type="submit" class="btn btn-purple waves-effect waves-light">Update Customer</button>
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