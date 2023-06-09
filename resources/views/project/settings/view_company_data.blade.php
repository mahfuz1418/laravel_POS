@extends('project.pos_dashboard')
@section('main')

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">View Company data</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Inventory</a></li>
                        <li><a href="#">Company</a></li>
                        <li class="active">View Company Data</li>
                    </ol>
                </div>
            </div>
            <div class="row ">
                <!-- Basic example -->
                
                
                <div class="col-md-2"></div>
                <div class="col-md-8">

                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">View Company Information </h3></div>
                        <div class="panel-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3"> <label>Company Name :  </label> </div>
                                        <div class="col-md-9"><label for="">{{ $company_data->company_name }}</label> </div>
                                    </div>
                    
                                </div>

                                <div class="form-group">
                                    <div class="row ">
                                        <div class="col-md-3"> <label for="photo">Company Logo : </label> </div>
                                        <div class="col-md-9">
                                            <img  style="width: 70px; height: 70px; border: 2px solid gray; " src="{{ (!empty($company_data->company_logo)) ? asset('uploads/company/'. $company_data->company_logo) : asset('uploads/demo.png') }}" id="image" ><br>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                </div>

                                <div class="form-group">
                                    <div class="row ">
                                        <div class="col-md-3"> <label>Email :</label> </div>
                                        <div class="col-md-9"><label for="email">
                                            @if ($company_data->email == NULL)
                                               <p class="text-danger">No email found</p> 
                                            @else
                                                {{ $company_data->email }}
                                            @endif
                                        
                                        </label></div>
                                    </div>
                                    
                                    
                                </div>
       
                                <div class="form-group">
                                    <div class="row ">
                                        <div class="col-md-3"> <label>Phone :</label> </div>
                                        <div class="col-md-9"><label for="phone"> 
                                            @if ($company_data->phone == NULL)
                                            <p class="text-danger">No phone found</p> 
                                         @else
                                             {{ $company_data->phone }}
                                         @endif
                                        </label></div>
                                    </div>
                                    
                                    
                                </div>

                                <div class="form-group">
                                    <div class="row ">
                                        <div class="col-md-3"> <label>Address :</label> </div>
                                        <div class="col-md-9"> <label for="address"> 
                                            @if ($company_data->address == NULL)
                                            <p class="text-danger">No address found</p> 
                                         @else
                                             {{ $company_data->address }}
                                         @endif
                                        </label></div>
                                    </div>
                                   
                                    
                                </div>

                                <div class="form-group">
                                    <div class="row ">
                                        <div class="col-md-3"> <label>City :</label> </div>
                                        <div class="col-md-9"><label for="city"> 
                                            @if ($company_data->city == NULL)
                                            <p class="text-danger">No city found</p> 
                                         @else
                                             {{ $company_data->city }}
                                         @endif
                                        </label></div>
                                    </div>
                                    
                                    
                                </div>

                                

                                <div class="form-group">
                                    <div class="row ">
                                        <div class="col-md-3"> <label>Country :</label> </div>
                                        <div class="col-md-9"><label >
                                            @if ($company_data->country == NULL)
                                            <p class="text-danger">No country name found</p> 
                                            @else
                                                {{ $company_data->country }}
                                            @endif 
                                        </label></div>
                                    </div>
                                    
                                    
                                </div>

                                <div class="form-group">
                                    <div class="row ">
                                        <div class="col-md-3"> <label>Zip Code :</label> </div>
                                        <div class="col-md-9"><label > 
                                            @if ($company_data->zip_code == NULL)
                                                <p class="text-danger">No zip code found</p> 
                                            @else
                                                {{ $company_data->zip_code }}
                                            @endif 
                                        </label></div>
                                    </div>
                                    
                                    
                                </div>

                                
                                <a href="{{ route('setting.edit' , ['setting' => $company_data->id]) }}" class="btn btn-info">Edit Now</a>
                        </div><!-- panel-body -->
                    </div> <!-- panel -->
                </div> <!-- col-->
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>
</div>





@endsection