@extends('project.pos_dashboard')
@section('main')
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Invoice</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Pages</a></li>
                                    <li class="active">Invoice</li>
                                </ol>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <!-- <div class="panel-heading">
                                        <h4>Invoice</h4>
                                    </div> -->
                                    <div class="panel-body">
                                        <div class="clearfix">
                                            <div class="pull-left">
                                                <h4 class="text-right">Error IT</h4>
                                                
                                            </div>
                                            <div class="pull-right">
                                                <h4>Invoice # <br>
                                                    <strong>2015-04-23654789</strong>
                                                </h4>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                
                                                <div class="pull-left m-t-30">
                                                    <address>
                                                      <strong>Name: {{ $pending_orders->name }}</strong><br>
                                                      Address: {{ $pending_orders->address }}<br>
                                                      City: {{ $pending_orders->city }}<br>
                                                      Phone: {{ $pending_orders->phone }}
                                                      </address>
                                                </div>
                                                <div class="pull-right m-t-30">
                                                    <p><strong>Order Date: </strong> {{ $pending_orders->order_date }}</p>
                                                    <p class="m-t-10"><strong>Order Status: </strong> <span class="label @if ($pending_orders->order_status == 'pending')
                                                        label-pink
                                                    @else
                                                    label-success
                                                    @endif ">{{ $pending_orders->order_status }}</span></p>
                                                    <p class="m-t-10"><strong>Order ID: </strong> #123456</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-h-50"></div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table m-t-30">
                                                        <thead>
                                                            <tr><th>#</th>
                                                            <th>Item</th>
                                                            <th>Quantity</th>
                                                            <th>Unit Cost</th>
                                                            <th>Total</th>
                                                        </tr></thead>

                                                        <tbody>
                                                            @foreach($order_details as $order)
                                                                <tr>
                                                                    <td>{{ $loop->iteration }}</td>
                                                                    <td>{{ $order->product_name }}</td>
                                                                    <td>{{ $order->quantity }} </td>
                                                                    <td>{{ $order->unit_cost }} /=</td>
                                                                    <td>{{ $order->unit_cost*$order->quantity }} /=</td>
                                                                </tr>
                                                            @endforeach  
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="border-radius: 0px;">
                                            <div class="col-md-3 col-md-offset-9">
                                                
                                                <p class="text-right"><b>Sub-total:</b> {{ $pending_orders->subtotal }}</p>
                                                <hr>
                                                <p class="text-right">VAT: 10%</p>
                                                <h3 class="text-right">Total {{ $pending_orders->total }}</h3>
                                                <p class="text-right">Pay: {{ $pending_orders->pay }}</p>
                                                <p class="text-right">Due: @if ( $pending_orders->due == NULL )
                                                    0.00
                                                @else
                                                    {{ $pending_orders->due }}</p>
                                                @endif 
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="hidden-print">
                                            <div class="pull-right">
                                                <a href="#" onclick="window.print()" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>
                                                @if ($pending_orders->order_status == 'pending')
                                                     <button class="btn btn-primary  pull-right waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal" style="margin-left: 5px">Approve</button>
                                                @else
                                                    <button class="btn btn-success" disabled>Approved</button>
                                                @endif
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>




            </div> <!-- container -->
                               
                </div> <!-- content -->

                <footer class="footer text-right">
                    2015 © Moltran.
                </footer>

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            //MODAL START 

<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title">Add Customer</h4> 
            </div> 
            <div class="modal-body"> 

                <div class="row"> 
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
        <form action="{{ route('update.invoice', ['id' => $pending_orders->id]) }}" method="post" >
                        @csrf

                    <div class="col-md-4"> 
                        <div class="form-group"> 
                            <label for="field-4" class="control-label">Payment Type</label> 
                            <select name="payment_type" class="form-control" required>
                                <option value="">Select Payment Status</option>
                                <option value="Handcash">Handcash</option>
                                <option value="Check">Check</option>
                                <option value="Card">Card</option>
                                <option value="Mobile Banking">Mobile Banking</option>
                            </select>
                        </div> 
                    </div> 
                    <div class="col-md-4"> 
                        <div class="form-group"> 
                            <label for="field-5" class="control-label">Pay</label> 
                            <input type="number" class="form-control" id="field-5" value="{{ $pending_orders->pay }}" name="pay"> 
                        </div> 
                    </div> 
                    <div class="col-md-4"> 
                        <div class="form-group"> 
                            <label for="field-6" class="control-label">Due</label> 
                            <input type="number" class="form-control" id="field-6" value="{{ $pending_orders->due }}" name="due"> 
                        </div> 
                    </div> 
                </div> 
            </div> 

            <div class="modal-footer"> 
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> 
                <button type="submit" class="btn btn-info waves-effect waves-light">Submit</button> 
            </div> 
        </form>
        </div> 
    </div>
</div><!-- /.modal -->


@endsection