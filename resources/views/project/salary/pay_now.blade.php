@extends('project.pos_dashboard')
@section('main')

    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">Pay Salary</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="#">Inventory</a></li>
                            <li class="active">Pay Salary</li>
                        </ol>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Pay Salary 
                                    <span class="pull-right text-danger">{{ date("d / M / Y") }}</span>
                                </h3>
                            </div>
                            <div class="panel-body">
                                <form action="{{ route('pay.confirm', ['id' => $employee->id]) }}" method="post">
                                    @csrf


                                    <div class="form-group">
                                        <div class="row ">
                                            <div class="col-md-4"> <label>Name :</label> </div>
                                            <div class="col-md-8"><label for="">{{ $employee->name }}</label> </div>
                                        </div>
                                    </div>
    
                                    <div class="form-group">
                                        <div class="row ">
                                            <div class="col-md-4"> <label for="photo">Photo : </label> </div>
                                            <div class="col-md-8">
                                                <img  style="width: 70px; height: 70px; border: 2px solid gray; " src="{{ asset('uploads/employee') }}/{{ $employee->photo }}"  id="image" ><br>
                                            </div>
                                        </div>     
                                    </div>
    
                                    <div class="form-group">
                                        <div class="row ">
                                            <div class="col-md-4"> <label>Month :</label> </div>
                                            <div class="col-md-8"><label >{{  date("F", strtotime("-1 month"))  }}</label></div>
                                        </div>     
                                    </div>

                                    <div class="form-group">
                                        <div class="row ">
                                            <div class="col-md-4"> <label>Salary :</label> </div>
                                            <div class="col-md-8"><label>{{ $employee->salary }}</label></div>
                                        </div>     
                                    </div>

                                    <div class="form-group">
                                        <div class="row ">
                                            <div class="col-md-4"> <label>Advance Salary :</label> </div>
                                            <div class="col-md-8"><label>{{ $advance }}</label></div>
                                        </div>     
                                    </div>

                                    <div class="form-group">
                                        <div class="row ">
                                            <div class="col-md-4"> <label>Due Salary :</label> </div>
                                            <div class="col-md-8"><label>{{ $employee->salary - $advance }}</label></div>
                                        </div>     
                                    </div>

                                    <div class="form-group">
                                        <div class="row ">
                                            <div class="col-md-4"> <label>Payment Method :</label> </div>
                                            <div class="col-md-8">
                                                <select name="payment_method" id="" class="form-control">
                                                    <option value="hand_cash">Hand Cash</option>
                                                    <option value="bank_transfer">Bank Transfer</option>
                                                </select>
                                            </div>
                                        </div>     
                                    </div>
                                    <div class="form-group">
                                        <div class="row ">
                                            <div class="col-md-4"> <label>Pay Amount :</label> </div>
                                            <div class="col-md-8"><input type="number" name="paid_amount" class="form-control"></div>
                                        </div>     
                                    </div>

                                    <button class="btn btn-success">Pay Confirm</button>
                                </form>
                            </div><!-- panel-body -->
                        </div> <!-- panel -->
                    <div class="col-md-2"></div>
                </div>
            </div>
        </div>
    </div>


@endsection
