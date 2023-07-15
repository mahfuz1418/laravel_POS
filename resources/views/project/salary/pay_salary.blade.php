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
                        <li><a href="#">Moltran</a></li>
                        <li><a href="#">Tables</a></li>
                        <li class="active">Pay Salary</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="display: flex; justify-content: space-between">
                            <h3 class="panel-title" >Pay Salary</h3>
                            <h5 class="text-danger text-uppercase">{{ date("F Y") }}</h5>
                        </div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Photo</th>
                                                <th>Join Date</th>
                                                <th>Salary</th>
                                                <th>Month</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>    
                                        <tbody>
                                            @foreach($employee as $data)     
                                    
                                            <tr>
                                                <td>{{ $data->name }}</td>
                                                <td> <img height="70" width="70" src=" {{ (!empty($data->photo)) ? asset('uploads/employee/'. $data->photo) : asset('uploads/demo.png') }}" alt=""></td>
                                                <td>{{ \Carbon\Carbon::parse($data->created_at)->format('d/M/Y')}}</td>  
                                                <td>{{ $data->salary }}</td>  
                                                <td>{{ date('F', strtotime('-1 month')) }}</td>
                                                <td>
                                                    @if ( $data->salary_status == 'paid' && $data->salary_month == date('F', strtotime('-1 month')) )
                                                        <span class="badge badge-success">{{ $data->salary_status }}</span>
                                                    @else
                                                        <span class="badge badge-danger"> UNPAID </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (date('m') > \Carbon\Carbon::parse($data->created_at)->format('m'))
                                                        <a href="{{ route('pay.now', ['id' => $data->id]) }}" class="btn btn-info btn-sm"> Pay Now </a>
                                                        <a href="{{ route('advance.salary', ['id' => $data->id]) }}" class="btn btn-warning btn-sm"> Advance Salary </a>
                                                    @else
                                                        <a class="btn btn-danger btn-sm" disabled>Unpayable</a>
                                                        <a href="{{ route('advance.salary', ['id' => $data->id]) }}" class="btn btn-warning btn-sm"> Advance Salary </a>
                                                    @endif
                                                    
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

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
