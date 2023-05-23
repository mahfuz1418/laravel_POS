@extends('project.pos_dashboard')
@section('main')

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">View Customer data</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Inventory</a></li>
                        <li><a href="#">Employee</a></li>
                        <li class="active">View Customer Data</li>
                    </ol>
                </div>
            </div>
            <div class="row ">
                <!-- Basic example -->
                
                
                <div class="col-md-2"></div>
                <div class="col-md-8">

                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">View Customer Information </h3></div>
                        <div class="panel-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3"> <label>Name :  </label> </div>
                                        <div class="col-md-9"><label for="">{{ $single_customer->name }}</label> </div>
                                    </div>
                    
                                </div>

                                <div class="form-group">
                                    <div class="row ">
                                        <div class="col-md-3"> <label for="photo">Photo : </label> </div>
                                        <div class="col-md-9">
                                            <img  style="width: 70px; height: 70px; border: 2px solid gray; " src="{{ (!empty($single_customer->photo)) ? asset('uploads/customer/'. $single_customer->photo) : asset('uploads/demo.png') }}" id="image" ><br>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                </div>

                                <div class="form-group">
                                    <div class="row ">
                                        <div class="col-md-3"> <label>Email :</label> </div>
                                        <div class="col-md-9"><label for="email">
                                            @if ($single_customer->email == NULL)
                                               <p class="text-danger">No email found</p> 
                                            @else
                                                {{ $single_customer->email }}
                                            @endif
                                        
                                        </label></div>
                                    </div>
                                    
                                    
                                </div>
       
                                <div class="form-group">
                                    <div class="row ">
                                        <div class="col-md-3"> <label>Phone :</label> </div>
                                        <div class="col-md-9"><label for="phone"> {{ $single_customer->phone }}</label></div>
                                    </div>
                                    
                                    
                                </div>

                                <div class="form-group">
                                    <div class="row ">
                                        <div class="col-md-3"> <label>Address :</label> </div>
                                        <div class="col-md-9"> <label for="address"> {{ $single_customer->address }}</label></div>
                                    </div>
                                   
                                    
                                </div>

                                <div class="form-group">
                                    <div class="row ">
                                        <div class="col-md-3"> <label>City :</label> </div>
                                        <div class="col-md-9"><label for="city"> {{ $single_customer->city }}</label></div>
                                    </div>
                                    
                                    
                                </div>

                                

                                <div class="form-group">
                                    <div class="row ">
                                        <div class="col-md-3"> <label>Shop Name :</label> </div>
                                        <div class="col-md-9"><label >
                                            @if ($single_customer->shop_name == NULL)
                                            <p class="text-danger">No shop name found</p> 
                                            @else
                                                {{ $single_customer->shop_name }}
                                            @endif 
                                        </label></div>
                                    </div>
                                    
                                    
                                </div>

                                <div class="form-group">
                                    <div class="row ">
                                        <div class="col-md-3"> <label>Bank Name :</label> </div>
                                        <div class="col-md-9"><label > 
                                            @if ($single_customer->bank_name == NULL)
                                                <p class="text-danger">No bank name found</p> 
                                            @else
                                                {{ $single_customer->bank_name }}
                                            @endif 
                                        </label></div>
                                    </div>
                                    
                                    
                                </div>

                                <div class="form-group">
                                    <div class="row ">
                                        <div class="col-md-3"> <label>Bank Branch Name :</label> </div>
                                        <div class="col-md-9">
                                            <label for="salary">
                                                @if ($single_customer->bank_branch == NULL)
                                                    <p class="text-danger">No bank branch name found</p> 
                                                @else
                                                    {{ $single_customer->bank_branch }}
                                                @endif 
                                            </label>   
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row ">
                                        <div class="col-md-3">  <label for="vacation">Account Name : </label> </div>
                                        <div class="col-md-9"> <label for="">
                                            @if ($single_customer->account_name == NULL)
                                                <p class="text-danger">No account name found</p> 
                                            @else
                                                {{ $single_customer->account_name }}
                                            @endif 

                                        </label> 
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row ">
                                        <div class="col-md-3">  <label for="">Account Number : </label> </div>
                                        <div class="col-md-9"> <label for="">
                                            @if ($single_customer->account_number == NULL)
                                                <p class="text-danger">No account number found</p> 
                                            @else
                                                {{ $single_customer->account_number }}
                                            @endif 
                                            </label> </div>
                                    </div>
                                </div>
                                
                                <a href="{{ route('edit.customer' , ['id' => $single_customer->id]) }}" class="btn btn-info">Edit Now</a>
                        </div><!-- panel-body -->
                    </div> <!-- panel -->
                </div> <!-- col-->
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>
</div>





@endsection