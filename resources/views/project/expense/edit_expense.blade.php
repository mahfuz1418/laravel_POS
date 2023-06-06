@extends('project.pos_dashboard')
@section('main')

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Update Expense</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Inventory</a></li>
                        <li><a href="#">Expense</a></li>
                        <li class="active">Update Expense</li>
                    </ol>
                </div>
            </div>
            <div class="row ">                
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="display: flex; justify-content: space-between">
                            <h3 class="panel-title">Update Expense Data</h3>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="panel-body">
                            <form action="{{ route('expense.update', [ 'expense' => $expense->id ]) }}" method="POST" >
                                @csrf
                                @method("PUT")
                                <div class="form-group">
                                    <label for="name">Expense Details</label>
                                    <textarea class="form-control" name="details" id="details" cols="30" rows="5">{{ $expense->details }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="name">Expense Amount</label>
                                    <input type="number" name="amount" value="{{ $expense->amount }}" class="form-control">
                                </div>

                                <input type="hidden" name="date" value="{{ date('d/m/y') }}">
                                <input type="hidden" name="month" value="{{ date('F') }}">
                                <input type="hidden" name="year" value="{{ date('Y') }}">

                                
                                <button type="submit" class="btn btn-purple waves-effect waves-light">Update Expense</button>
                            </form>
                        </div><!-- panel-body -->
                    </div> <!-- panel -->
                </div> <!-- col-->
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#image')
                    .attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    
</script>
@endsection