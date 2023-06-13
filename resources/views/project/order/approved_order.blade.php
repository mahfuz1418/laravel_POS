@extends('project.pos_dashboard')
@section('main')
<div class="content-page">
   <!-- Start content -->
   <div class="content">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">All Product</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Moltran</a></li>
                        <li><a href="#">Tables</a></li>
                        <li class="active">Product</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="display: flex; justify-content: space-between">
                            <h3 class="panel-title">All Product</h3>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#staticBackdrop">Trash <i class="fa-solid fa-trash"></i></button>
                        </div>


  
                        <!-- Modal -->
                        {{-- <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header ">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                <h5 class="modal-title " id="staticBackdropLabel">Trash Bin</h5>
                                </div>
                                <div class="modal-body">
                                    <table class="table">
                                        <thead>
                                          <tr>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Product Code</th>
                                            <th scope="col">Product Image</th>
                                            <th>Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          @forelse ($trash_product as $trash) 
                                            <tr>
                                              <td>{{ $trash->product_name }}</td>
                                              <td>{{ $trash->product_code }}</td>
                                              <td><img height="40" width="40" src="{{ asset('uploads/product') }}/{{ $trash->product_image  }}" alt=""></td>
                                              <td>
                                                  <a href="{{ route('product.restore', ['id' => $trash->id]) }}" class="btn btn-info"><i class="fa-solid fa-rotate"></i></a>
                                                  <a href="{{ route('product.delete', ['id' => $trash->id]) }}" class="btn btn-danger"><i class="fa-solid fa-user-minus"></i></a>
                                              </td>
                                            </tr>
                                          @empty 
                                            <tr>
                                                <td class="text-danger">Trash bin empty</td>
                                            </tr>
                                          @endforelse
                                        </tbody>
                                      </table>
                                </div>
                            </div>
                            </div>
                        </div> --}}

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>SL NO</th>
                                                <th>Name</th>
                                                <th>Date</th> 
                                                <th>Quantity</th>
                                                <th>Total Amount</th>
                                                <th>Due</th>
                                                <th>Payment Type</th>
                                                <th>Order Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                
                                        <tbody>
                                            @foreach($approved_order as $approved)     
                                            <tr>
                                                <td>{{ $loop->iteration}}</td>
                                                <td>{{ $approved->name }}</td>
                                                <td>{{ $approved->order_date }}</td>
                                                <td>{{ $approved->total_product }}</td>
                                                <td>{{ $approved->total }}</td>
                                                <td>
                                                @if ($approved->due == NULL)
                                                    0
                                                @else
                                                    {{ $approved->due }}
                                                @endif 
                                                </td>
                                                <td>{{ $approved->payment_type }}</td>
                                                <td><span class="badge badge-success">{{ $approved->order_status }}</span></td>

                                                <td>
                                                     <a href="{{ route('confirm.order', ['id' => $approved->id]) }}" class="btn btn-warning"><i class="fa-solid fa-eye"></i> </a>
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

