@extends('project.pos_dashboard')
@section('main')
<div class="content-page">
   <!-- Start content -->
   <div class="content">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Datatable</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Moltran</a></li>
                        <li><a href="#">Tables</a></li>
                        <li class="active">Datatable</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="display: flex; justify-content: space-between">
                            <h3 class="panel-title">All Attendence</h3>
                            <a class="btn btn-danger" href="{{ route('attendence.create') }}">Take Attendence</a>

                        </div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>SL NO</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($attendence as $data)     
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $data->att_date }}</td>
                                                <td>
                                                   
                                                    <a href="{{ route('show.attendence', ['att_date' => $data->att_date]) }}" class="btn btn-warning"><i class="fa-solid fa-eye"></i></a>
                                                    <a href="{{ route('edit.attendence', ['att_date' => $data->att_date]) }}" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                                                    
                                                    <button value="{{ route('delete.attendence', ['att_date' => $data->att_date]) }}" class="btn btn-danger delete"><i class="fa-solid fa-circle-minus"></i></button>
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