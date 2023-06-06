@extends('project.pos_dashboard')
@section('main')

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Advance Salary</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Inventory</a></li>
                        <li class="active">Advance Salary</li>
                    </ol>
                </div>
            </div>
            <div class="row ">                
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">Advance Salay</h3></div>
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

                            @php
                                $emp_info = App\Models\Employee::get();
                            @endphp
                            <form action="{{ route('store.advance.salary') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="emp_id">Employee Name <span class="text-danger">*</span></label>
                                    <select name="emp_id" id="emp_id" class="form-control">
                                        <option value="" selected>Select Employe Name</option>
                                        @foreach ($emp_info as $emp) 
                                            <option value="{{ $emp->id }}">{{ $emp->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="phone">Month <span class="text-danger">*</span></label>
                                    <select name="month" id="month" class="form-control">
                                        <option value="January">January</option>
                                        <option value="February">February</option>
                                        <option value="March">March</option>
                                        <option value="April">April</option>
                                        <option value="May">May</option>
                                        <option value="June">June</option>
                                        <option value="July">July</option>
                                        <option value="August">August</option>
                                        <option value="September">September</option>
                                        <option value="October">October</option>
                                        <option value="November">November</option>
                                        <option value="December">December</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="year">Year <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="year" placeholder="Year" name="year">
                                </div>

                                <div class="form-group">
                                    <label for="advance_salary">Advance Salary <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="advance_salary" placeholder="Advance Salary" name="advance_salary">
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


@endsection
