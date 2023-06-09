@extends('project.pos_dashboard')
@section('main')

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Update employee</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Inventory</a></li>
                        <li><a href="#">Employee</a></li>
                        <li class="active">Update Employee</li>
                    </ol>
                </div>
            </div>
            <div class="row ">
                <!-- Basic example -->
                
                
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">Update Employee</h3></div>
                        <div class="panel-body">
                            <form action="{{ route('update.employee' , ['id' => $single_employee->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" value="{{ $single_employee->name }}" name="name" >
                                </div>
                                @error('name')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="email">Email address<span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="email" value="{{ $single_employee->email }}" name="email">
                                </div>
                                @error('email')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="phone">Phone<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="phone" value="{{ $single_employee->phone }}"name="phone">
                                </div>
                                @error('phone')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="address">Address<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="address" value="{{ $single_employee->address }}" name="address">
                                </div>
                                @error('address')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control" id="city" value="{{ $single_employee->city }}" name="city">
                                </div>
                                @error('city')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                                
                                <div class="form-group">
                                    <label for="nid_no">NID</label>
                                    <input type="number" class="form-control" id="nid_no" value="{{ $single_employee->nid_no }}" name="nid_no">
                                </div>
                                @error('nid_no')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="experience">Experience</label>
                                    <input type="text" class="form-control" id="experience" value="{{ $single_employee->experience }}" name="experience">
                                </div>
                                @error('experience')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="salary">Salary<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="salary" value="{{ $single_employee->salary }}" name="salary">
                                </div>
                                @error('salary')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="vacation">Vacation</label>
                                    <input type="text" class="form-control" id="vacation" value="{{ $single_employee->vacation }}" name="vacation">
                                </div>
                                <div class="form-group">
                                    <img  style="width: 70px; height: 70px; border-radius: 50%; border: 2px solid gray" src="{{ (!empty($single_employee->photo)) ? asset('uploads/employee/'.$single_employee->photo)  : asset('uploads/demo.png') }}" id="image" ><br>
                                    <label for="photo">Photo <span class="text-danger">*</span> </label>
                                    <input type="file" class="form-control" id="photo"  name="photo" accept="image/*" onchange="readURL(this)" >
                                </div>
                                @error('photo')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                                
                                
                                <button type="submit" class="btn btn-purple waves-effect waves-light">Update</button>
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