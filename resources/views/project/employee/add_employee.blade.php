@extends('project.pos_dashboard')
@section('main')

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Add employee</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Inventory</a></li>
                        <li><a href="#">Employee</a></li>
                        <li class="active">Add Employee</li>
                    </ol>
                </div>
            </div>
            <div class="row ">                
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">Add Employee</h3></div>
                        <div class="panel-body">
                            <form action="{{ route('store.employee') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
                                </div>
                                @error('name')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="email">Email address <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                                </div>
                                @error('email')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="phone">Phone <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="phone" placeholder="Enter phone" name="phone">
                                </div>
                                @error('phone')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="address">Address <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="address" placeholder="Enter address" name="address">
                                </div>
                                @error('address')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control" id="city" placeholder="Enter city" name="city">
                                </div>
                                @error('city')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                                
                                <div class="form-group">
                                    <label for="nid_no">NID</label>
                                    <input type="number" class="form-control" id="nid_no" placeholder="Enter nid_no" name="nid_no">
                                </div>
                                @error('nid_no')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="experience">Experience</label>
                                    <input type="text" class="form-control" id="experience" placeholder="Enter experience" name="experience">
                                </div>
                                @error('experience')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="salary">Salary <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="salary" placeholder="Enter salary" name="salary">
                                </div>
                                @error('salary')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="vacation">Vacation</label>
                                    <input type="text" class="form-control" id="vacation" placeholder="Enter vacation" name="vacation">
                                </div>

                                <div class="form-group">
                                    <img  style="width: 70px; height: 70px; border-radius: 50%; border: 2px solid gray" src="{{ asset('uploads/demo.png') }}" id="image" ><br>
                                    <label for="photo">Photo <span class="text-danger">*</span> </label>
                                    <input type="file" class="form-control" id="photo"  name="photo" accept="image/*" onchange="readURL(this)" >
                                </div>
                                @error('photo')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                                
                                
                                <button type="submit" class="btn btn-purple waves-effect waves-light">Add Employee</button>
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