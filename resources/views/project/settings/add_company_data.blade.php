@extends('project.pos_dashboard')
@section('main')

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Add Company Data</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Inventory</a></li>
                        <li><a href="#">Company</a></li>
                        <li class="active">Add Company Data</li>
                    </ol>
                </div>
            </div>
            <div class="row ">                
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">Add Company Data</h3></div>
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
                            <form action="{{ route('setting.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Company Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter Company Name" name="company_name">
                                </div>

                                <div class="form-group">
                                    <img  style="width: 70px; height: 70px; border-radius: 50%; border: 2px solid gray" src="{{ asset('uploads/demo.png') }}" id="image" ><br>
                                    <label for="photo">Company Logo</label>
                                    <input type="file" class="form-control" id="photo"  name="company_logo" accept="image/*" onchange="readURL(this)" >
                                </div>

                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                                </div>
   
                                <div class="form-group">
                                    <label for="phone">Phone  </label>
                                    <input type="text" class="form-control" id="phone" placeholder="Enter Phone" name="phone">
                                </div>

                                <div class="form-group">
                                    <label for="address">Address  </label>
                                    <input type="text" class="form-control" id="address" placeholder="Enter address" name="address">
                                </div>

                                <div class="form-group">
                                    <label for="country">Country  </label>
                                    <input type="text" class="form-control" id="country" placeholder="Enter Country" name="country">
                                </div>
   
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control" id="city" placeholder="Enter city" name="city">
                                </div>

                                <div class="form-group">
                                    <label for="zip_code">City</label>
                                    <input type="number" class="form-control" id="zip_code" placeholder="Enter ZIP Code" name="zip_code">
                                </div>

                               
                                
                                <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
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