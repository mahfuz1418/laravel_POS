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
                        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                        </div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>SL NO</th>
                                                <th>Product Name</th>
                                                <th>Product Category</th> 
                                                <th>Product Code</th>
                                                <th>Selling Price</th>
                                                <th>Product Image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                
                                        <tbody>
                                            @foreach($product_info as $product)     
                                            <tr>
                                                <td>{{ $loop->iteration}}</td>
                                                <td>{{ $product->product_name }}</td>
                                                <td>{{ $product->category->cat_name }}</td>
                                                <td>{{ $product->product_code }}</td>
                                                <td>{{ $product->selling_price }}</td>

                                                <td> <img height="70" width="70" src="{{ asset('uploads/product') }}/{{ $product->product_image  }}" alt=""></td>

                                                <td>
                                                    <a href="{{ route('product.show', ['product' => $product->id]) }}" class="btn btn-warning"><i class="fa-solid fa-eye"></i> </a>
                                                    <a href="{{ route('product.edit', ['product' => $product->id]) }}" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i> </a>
                                                    <form action="{{ route('product.destroy', ['product' => $product->id]) }}" method="post">
                                                        @csrf
                                                        @method("DELETE")
                                                        <button class="btn btn-danger"><i class="fa-solid fa-user-minus"></i></button>
                                                    </form>

                                                    
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div  style="margin-top: 20px">
                                        <a class="btn btn-warning" href="{{ route('product.export') }}">Export Product</a> <br> <br>
                                        <form action="{{ route('product.import') }}" method="post"  enctype="multipart/form-data">
                                            @csrf
                                            <input class="form-control" type="file" name="import_file" id=""> 
                                            <button href="" class="btn btn-info">Import Product</button>
                                        </form>
                                    </div>
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


{{-- @section('script')
    
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
@endsection --}}