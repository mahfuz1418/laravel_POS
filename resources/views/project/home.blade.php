@extends('project.pos_dashboard')
@section('main')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Welcome !</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Moltran</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
            @php
                 $date = date('d/m/y'); 

                 $total_attend   = DB::table('attendences')
                                    ->where('att_date', date('d_m_y'))
                                    ->where('attendence', 'Present')
                                    ->count();
                 $total_attends   = DB::table('attendences')
                                    ->join('employees', 'attendences.emp_id', 'employees.id')
                                    ->where('att_date', date('d_m_y'))->get();
                 $total_sales    = DB::table('orders')->where('order_date', $date)->sum('total');
                 $total_pay      = DB::table('orders')->where('order_date', $date)->sum('pay');
                 $total_due      = DB::table('orders')->where('order_date', $date)->sum('due');
                 $total_order    = DB::table('orders')->where('order_date', $date)->count();
                 $pending_order  = DB::table('orders')->where('order_status', 'pending')->where('order_date', $date)->count();
                 $approved_order = DB::table('orders')->where('order_status', 'approved')->where('order_date', $date)->count();
                 $total_employee = DB::table('employees')->count();

                 $total_expence  = DB::table('expenses')->where('date', $date)->sum('amount');
            @endphp
            <!-- Start Widget -->
            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-3">
                    <div class="mini-stat clearfix bx-shadow">
                        <span class="mini-stat-icon bg-info"><i class="ion-social-usd"></i></span>
                        <div class="mini-stat-info text-right text-muted" >
                            <span class="counter">{{ $total_sales }} </span> 
                            Total Sales
                        </div>

                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-3">
                    <div class="mini-stat clearfix bx-shadow">
                        <span class="mini-stat-icon bg-info"><i class="ion-social-usd"></i></span>
                        <div class="mini-stat-info text-right text-muted" >
                            <span class="counter">{{ $total_pay }} </span> 
                            Total Pay
                        </div>

                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-3">
                    <div class="mini-stat clearfix bx-shadow">
                        <span class="mini-stat-icon bg-info"><i class="ion-social-usd"></i></span>
                        <div class="mini-stat-info text-right text-muted" >
                            <span class="counter">{{ $total_due }} </span> 
                            Total Due
                        </div>

                    </div>
                </div>
                
                <div class="col-md-6 col-sm-6 col-lg-3">
                    <div class="mini-stat clearfix bx-shadow">
                        <span class="mini-stat-icon bg-purple"><i class="ion-ios7-cart"></i></span>
                        <div class="mini-stat-info text-right text-muted">
                            <span class="counter">{{ $total_order }}</span>
                            Total Orders
                        </div>
                    </div>
                </div>


            </div> 
            <!-- End row-->


            <!-- Start Widget -->
            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-3">
                    <div class="mini-stat clearfix bx-shadow">
                        <span class="mini-stat-icon bg-purple"><i class="ion-ios7-cart"></i></span>
                        <div class="mini-stat-info text-right text-muted">
                            <span class="counter">{{ $pending_order }}</span>
                            Pending Orders
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-3">
                    <div class="mini-stat clearfix bx-shadow">
                        <span class="mini-stat-icon bg-purple"><i class="ion-ios7-cart"></i></span>
                        <div class="mini-stat-info text-right text-muted">
                            <span class="counter">{{ $approved_order }}</span>
                            Approved Orders
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-3">
                    <div class="mini-stat clearfix bx-shadow">
                        <span class="mini-stat-icon bg-primary"><i class="ion-android-contacts"></i></span>
                        <div class="mini-stat-info text-right text-muted">
                            <span class="counter">{{ $total_employee }}</span>
                            Total Employee
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 col-sm-6 col-lg-3">
                    <div class="mini-stat clearfix bx-shadow">
                        <span class="mini-stat-icon bg-primary"><i class="ion-social-buffer"></i></span>
                        <div class="mini-stat-info text-right text-muted">
                            <span class="counter">{{ $total_expence }}</span>
                            Total Expence
                        </div>
                    </div>
                </div>

                
            </div> 

            <div class="row">
                <div class="col-md-6 col-sm-6 ">
                    <div class="mini-stat clearfix bx-shadow">
                        <span class="mini-stat-icon bg-primary"><i class="ion-android-hand"></i></span>
                        <div class="mini-stat-info text-right text-muted">
                            <span class="counter">{{ $total_attend }}</span>
                            Total Attend Today
                        </div>
                        <div>
                            <div class="panel panel-default panel-fill">
                                <div class="panel-heading"> 
                                    <h3 class="panel-title">Attendene List</h3> 
                                </div> 
                                <div class="panel-body"> 
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Attendence Date</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($total_attends as $attend)
                                                    <tr>
                                                        <td>1</td>
                                                        <td>{{ $attend->name }}</td>
                                                        <td>{{ $attend->att_date }}</td>
                                                        <td>
                                                            @if ($attend->attendence == 'Present')
                                                                <span class="label label-info">{{ $attend->attendence }}</span>
                                                            @else
                                                                <span class="label label-danger">{{ $attend->attendence }}</span>
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
                </div>
            </div>
            <!-- End row-->

        </div> <!-- container -->
                   
    </div> <!-- content -->

    <footer class="footer text-right">
        2015 © Moltran.
    </footer>

</div>
@endsection