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
                                                <th>Advance Salary</th>
                                                <th>Salary Date</th>
                                                <th>Month</th>
                                                <th>Year</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>    
                                        <tbody>
                                            @foreach($advance_salary as $data)     
                                    
                                            <tr>
                                                <td>{{ $data->name }}</td>
                                                <td> <img height="70" width="70" src=" {{ (!empty($data->photo)) ? asset('uploads/employee/'. $data->photo) : asset('uploads/demo.png') }}" alt=""></td>
                                                <td>{{ $data->advance_salary }}</td>  
                                                <td>{{ $data->created_at }}</td>  
                                                <td>{{ $data->month }}</td>
                                                <td>{{ $data->year }}</td>  
                                                <td>
                                                    <a href="{{ route('view.employee', ['id' => $data->id]) }}" class="btn btn-danger"><i class="fa-solid fa-user-minus"></i> </a>
                                                    <a href="{{ route('edit.employee', ['id' => $data->id]) }}" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i> </a>

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
