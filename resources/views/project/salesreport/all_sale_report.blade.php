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
                        <li class="active">Sales Report</li>
                    </ol>
                </div>
            </div>

            <form action="{{ route('date.sales.report') }}" method="post">
                @csrf
                <input type="date" name="date" id="" class="form-control" style="width: 200px; display:inline-block;">
                <button class="btn btn-info " >Search</button>
            </form>
            <br>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="display: flex; justify-content: space-between">
                            <h3 class="panel-title text-danger" >Sales Report</h3>
                            <a href="{{ route('all.sales.report') }}" class="btn btn-primary">All Sales Report</a>
                        </div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>SL NO</th>
                                                <th>Order Date</th>
                                                <th>Total Products</th>
                                                <th>Total Amount</th>
                                                <th>Total Pay</th>
                                                <th>Total Due</th>
                                            </tr>
                                        </thead>    
                                        <tbody>
                                            @foreach($sales_report as $data)     
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $data->order_date }}</td>  
                                                    <td>{{ $data->total_product }}</td>  
                                                    <td>{{ $data->total }} /= </td>  
                                                    <td>{{ $data->pay }} /= </td>  
                                                    <td> 
                                                        @if ($data->due == NULL)
                                                            0.00 /=
                                                        @else
                                                            {{ $data->due }} /= 
                                                        @endif 
                                                    </td>  
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        
                                    </table>
                                    <h3>Total Sell: <span class="text-danger">{{ $total_sales }} tk</span> </h3>
                                    <h4>Total pay: <span class="text-danger">{{ $total_pay }} tk</span> </h4>
                                    <h4>Total due: <span class="text-danger">{{ $total_due }} tk</span> </h4>
                                    
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
