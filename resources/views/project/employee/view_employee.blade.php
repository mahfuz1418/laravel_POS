@extends('project.pos_dashboard')
@section('main')

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">View employee data</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Inventory</a></li>
                        <li><a href="#">Employee</a></li>
                        <li class="active">View Employeem Data</li>
                    </ol>
                </div>
            </div>
            <div class="row ">
                <!-- Basic example -->
                
                
                <div class="col-md-2"></div>
                <div class="col-md-8">

                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">View Employee</h3></div>
                        <div class="panel-body">

                                <div class="form-group">
                                    <div class="row ">
                                        <div class="col-md-2"> <label>Name :</label> </div>
                                        <div class="col-md-10"><label for="">{{ $single_employee->name }}</label> </div>
                                    </div>
                    
                                </div>

                                <div class="form-group">
                                    <div class="row ">
                                        <div class="col-md-2"> <label for="photo">Photo : </label> </div>
                                        <div class="col-md-10">
                                            <img  style="width: 70px; height: 70px; border: 2px solid gray; " src="{{ asset('uploads/employee') }}/{{ $single_employee->photo }}"  id="image" ><br>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                </div>

                                <div class="form-group">
                                    <div class="row ">
                                        <div class="col-md-2"> <label>Email :</label> </div>
                                        <div class="col-md-10"><label for="email">{{ $single_employee->email }}</label></div>
                                    </div>
                                    
                                    
                                </div>
       
                                <div class="form-group">
                                    <div class="row ">
                                        <div class="col-md-2"> <label>Phone :</label> </div>
                                        <div class="col-md-10"><label for="phone"> {{ $single_employee->phone }}</label></div>
                                    </div>
                                    
                                    
                                </div>

                                <div class="form-group">
                                    <div class="row ">
                                        <div class="col-md-2"> <label>Address :</label> </div>
                                        <div class="col-md-10"> <label for="address"> {{ $single_employee->address }}</label></div>
                                    </div>
                                   
                                    
                                </div>

                                <div class="form-group">
                                    <div class="row ">
                                        <div class="col-md-2"> <label>City :</label> </div>
                                        <div class="col-md-10"><label for="city"> {{ $single_employee->city }}</label></div>
                                    </div>
                                    
                                    
                                </div>

                                

                                <div class="form-group">
                                    <div class="row ">
                                        <div class="col-md-2"> <label>NID :</label> </div>
                                        <div class="col-md-10"><label for="nid_no"> {{ $single_employee->nid_no }}</label></div>
                                    </div>
                                    
                                    
                                </div>

                                <div class="form-group">
                                    <div class="row ">
                                        <div class="col-md-2"> <label>Experience :</label> </div>
                                        <div class="col-md-10"><label for="experience"> {{ $single_employee->experience }}</label></div>
                                    </div>
                                    
                                    
                                </div>

                                <div class="form-group">
                                    <div class="row ">
                                        <div class="col-md-2"> <label>Salary :</label> </div>
                                        <div class="col-md-10"><label for="salary"> {{ $single_employee->salary }} /= (Per Month)</label></div>
                                    </div>
                                    
                                   
                                </div>

                                <div class="form-group">
                                    <div class="row ">
                                        <div class="col-md-2">  <label for="vacation">Vacation : </label> </div>
                                        <div class="col-md-10"> <label for="">{{ $single_employee->vacation }}</label> </div>
                                    </div>
                                </div>
                                <a href="{{ route('edit.employee' , ['id' => $single_employee->id]) }}" class="btn btn-info">Edit Now</a>
                        </div><!-- panel-body -->
                    </div> <!-- panel -->
                </div> <!-- col-->
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>
</div>





@endsection