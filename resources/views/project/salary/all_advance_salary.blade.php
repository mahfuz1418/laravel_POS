@extends('project.pos_dashboard')
@section('main')
<div class="content-page">
   <!-- Start content -->
   <div class="content">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">All Advance Salary</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Moltran</a></li>
                        <li><a href="#">Tables</a></li>
                        <li class="active">All Advance Salary</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="display: flex; justify-content: space-between">
                            <h3 class="panel-title" >All Advance Salary</h3>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#staticBackdrop">Trash <i class="fa-solid fa-trash"></i></button>
                        </div>

                        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header ">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                <h5 class="modal-title " id="staticBackdropLabel">Trash Bin</h5>
                                </div>
                                {{-- <div class="modal-body">
                                    <table class="table">
                                        <thead>
                                          <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Photo</th>
                                            <th>Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          @foreach ($trash_supplier as $trash)
                                            <tr>
                                              <td>{{ $trash->name }}</td>
                                              <td>{{ $trash->address }}</td>
                                              <td><img height="40" width="40" src="{{ asset('uploads/supplier') }}/{{ $trash->photo  }}" alt=""></td>
                                              <td>
                                                  <a href="{{ route('restore.supplier', ['id' => $trash->id]) }}" class="btn btn-info"><i class="fa-solid fa-rotate"></i></a>
                                                  <a href="{{ route('delete.supplier', ['id' => $trash->id]) }}" class="btn btn-danger"><i class="fa-solid fa-user-minus"></i></a>
                                              </td>
                                            </tr>
                                          @endforeach  
                                        </tbody>
                                      </table>
                                </div> --}}
                            </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Photo</th>
                                                <th>Salary</th>
                                                <th>Month</th>
                                                <th>Advance</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>    
                                        <tbody>
                                            @foreach($employee as $data)     
                                            <tr>
                                                <td>{{ $data->name }}</td>
                                                <td>{{ $data->email }}</td>
                                                <td> <img height="70" width="70" src=" {{ (!empty($data->photo)) ? asset('uploads/employee/'. $data->photo) : asset('uploads/demo.png') }}" alt=""></td>
                                                <td>{{ $data->salary }}</td>
                                                <td >{{ $data->month }}</td>
                                                <td>{{ $data->advance_salary }}</td>
                                                <td>
                                                    <a href="{{ route('edit.advance.salary', ['id' => $data->id]) }}" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i> </a>
                                                    <button value="{{ route('destroy.advance.salary', ['id' => $data->id]) }}" class="btn btn-danger delete"><i class="fa-solid fa-user-minus"></i></button>
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
