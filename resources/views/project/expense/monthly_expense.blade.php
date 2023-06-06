@extends('project.pos_dashboard')
@section('main')
<div class="content-page">
   <!-- Start content -->
   <div class="content">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title text-danger">Date: {{ date('d M Y') }}</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Moltran</a></li>
                        <li><a href="#">Tables</a></li>
                        <li class="active">Today Expense</li>
                    </ol>
                </div>
            </div>

            <div>
                <a href="{{ route('january.expense') }}" class="btn btn-info">January</a>
                <a href="{{ route('february.expense') }}" class="btn btn-danger">February</a>
                <a href="{{ route('march.expense') }}" class="btn btn-primary">March</a>
                <a href="{{ route('april.expense') }}" class="btn btn-secondary">April</a>
                <a href="{{ route('may.expense') }}" class="btn btn-warning">May</a>
                <a href="{{ route('june.expense') }}" class="btn btn-success">June</a>
                <a href="{{ route('july.expense') }}" class="btn btn-danger">July</a>
                <a href="{{ route('august.expense') }}" class="btn btn-primary">August</a>
                <a href="{{ route('september.expense') }}" class="btn btn-secondary">September</a>
                <a href="{{ route('october.expense') }}" class="btn btn-warning">October</a>
                <a href="{{ route('november.expense') }}" class="btn btn-success">November</a>
                <a href="{{ route('december.expense') }}" class="btn btn-info">December</a>
            </div>
            <br>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="display: flex; justify-content: space-between">
                            <h3 class="panel-title" >Today Expense</h3>

                        </div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>SL NO</th>
                                                <th>Details</th>
                                                <th>Amount</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>    
                                        <tbody>
                                            @foreach($monthly_expense as $data)     
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $data->details }}</td>  
                                                    <td>{{ $data->amount }}</td>  
                                                    <td>{{ $data->date }}</td>  
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        
                                    </table>
                                   
                                    <h3>Total Expense: <span class="text-danger">{{ $total }} tk</span> </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div> <!-- End Row -->
        </div>
   </div>
</div>



@endsection

@section('script')
    
        <script>
            $(document).ready(function(){
                $('.delete').click(function(){
                    Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.assign($(this).val())
                                // Swal.fire(
                                // 'Deleted!',
                                // 'Your file has been deleted.',
                                // 'success'
                                // )    
                    }
                    })
                })
            })

        </script>
@endsection
