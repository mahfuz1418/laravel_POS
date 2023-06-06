@extends('project.pos_dashboard')
@section('main')

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Update Supplier</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Inventory</a></li>
                        <li><a href="#">Supplier</a></li>
                        <li class="active">Update Supplier</li>
                    </ol>
                </div>
            </div>
            <div class="row ">                
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">Update Advance Salary </h3></div>
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
                            <form action="{{ route('update.advance.salary', ['id' => $employee_data->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="emp_id">Employee Name <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" disabled value="{{ $employee_data->employee->name }}">
                                </div>

                                <div class="form-group">
                                    <label for="phone">Month <span class="text-danger">*</span></label>
                                    <select name="month" id="month" class="form-control">
                                        <option value="January" @selected($employee_data->month === 'January')>January</option>
                                        <option value="February" @selected($employee_data->month === 'February')>February</option>
                                        <option value="March" @selected($employee_data->month === 'March')>March</option>
                                        <option value="April" @selected($employee_data->month === 'April')>April</option>
                                        <option value="May" @selected($employee_data->month === 'May')>May</option>
                                        <option value="June" @selected($employee_data->month === 'June')>June</option>
                                        <option value="July" @selected($employee_data->month === 'July')>July</option>
                                        <option value="August" @selected($employee_data->month === 'August')>August</option>
                                        <option value="September" @selected($employee_data->month === 'September')>September</option>
                                        <option value="October" @selected($employee_data->month === 'October')>October</option>
                                        <option value="November" @selected($employee_data->month === 'November')>November</option>
                                        <option value="December" @selected($employee_data->month === 'December')>December</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="year">Year <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="year" value="{{ $employee_data->year }}" name="year">
                                </div>

                                <div class="form-group">
                                    <label for="advance_salary">Advance Salary <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="advance_salary" value="{{ $employee_data->advance_salary }}" name="advance_salary">
                                </div>

                                <button type="submit" class="btn btn-purple waves-effect waves-light">Update Salary Data </button>
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