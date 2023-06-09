@extends('project.pos_dashboard')
@section('main')
<div class="content-page">
   <!-- Start content -->
   <div class="content">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Attendence</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Moltran</a></li>
                        <li><a href="#">Tables</a></li>
                        <li class="active">Attendence</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="display: flex; justify-content: space-between">
                            <h3 class="panel-title">Update Attendence</h3>
                            <a class="btn btn-danger" href="{{ route('attendence.create') }}">Take Attendence</a>
                        </div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>SL No</th>
                                                <th>Name</th>
                                                <th>Photo</th>
                                                <th>Attendence</th>
                                            </tr>
                                        </thead>
                                
                                        <tbody>

                                <form action="{{ route('Update.attendence', ['att_date' => $att_date]) }}" method="post">
                                       @csrf
                                            @foreach($employee as $data)     
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $data->name }}</td>
                                                    <td> <img height="70" width="70" src="{{ asset('uploads/employee/'.$data->photo) }}" alt=""></td>
                                                    <input type="hidden" name="id[]" value="{{ $data->id }}">
                                                    <td>
                                                        <input type="radio" name="attendence[{{ $data->id }}]" id="" value="Present" @checked($data->attendence == 'Present') >Present

                                                        <input type="radio" name="attendence[{{ $data->id }}]" id="" value="Absent" @checked($data->attendence == 'Absent')>Absent   
                                                    </td>
                                                    <input type="hidden" name="att_date" value="{{ date('d/m/y') }}">
                                                    <input type="hidden" name="att_month" value="{{ date('F') }}">
                                                    <input type="hidden" name="att_year" value="{{ date('Y') }}">
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <button class="btn btn-success">Update Attendence</button>
                                </form>
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

