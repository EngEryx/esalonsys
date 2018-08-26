@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Products</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i>Available Products
                    <div class="pull-right">
                        <a href="{{route('admin.products.add')}}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Add New Item</a>
                    </div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Item Name</th>
                            <th>Item Type</th>
                            <th>Short Description</th>
                            <th>Price</th>
                            <th>Added On</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($products->count() == 0)
                            <tr class="text-center">
                                <td colspan="6">No Products available</td>
                            </tr>
                        @else
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->item_type_text}}</td>
                                    <td>{{$product->short_description}}</td>
                                    <td>{{$product->price_text}}</td>
                                    <td>{{ $product->created_at }}</td>
                                    <td>
                                        {!! $product->action_buttons !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        @endif
                    </table>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-8 -->
        <div class="col-lg-4">

        </div>
        <!-- /.col-lg-4 -->
    </div>
    <!-- /.row -->
@endsection

@section('javascripts')
    <script>
        function deleteSalonItem(id,url){
            console.log(id);
            swal({
                title: "Are you sure?",
                text: "The record will be deleted permanently.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        axios.post(url)
                            .then(res => {
                                swal("Poof! The record has been deleted!", {
                                    icon: "success",
                                });
                                setTimeout(function(){
                                    window.location.reload();
                                }, 2000);
                            })
                            .catch(err => {
                                console.log(err);
                                swal("The record could not be deleted. Try again.");
                            });
                    } else {
                        swal("Your record is safe!");
                    }
                });
        }
    </script>
    @endsection