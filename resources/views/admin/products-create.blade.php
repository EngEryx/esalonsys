@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add Products & Services</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i>Add New Salon Item
                    <div class="pull-right">
                        <a href="{{route('admin.products')}}" class="btn btn-primary btn-xs"><i class="fa fa-list"></i> All Products & Services</a>
                    </div>
                </div>
                <!-- /.panel-heading -->
                <form method="post" action="{{route('admin.products.save')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group{{$errors->has('name') ? ' has-error' : ''}}">
                                    <label for="name">Item Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="" value="{{old('name')}}" required>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group{{$errors->has('item_type') ? ' has-error' : ''}}">
                                    <label for="name">Item Type</label>
                                    <select name="item_type" class="form-control" required>
                                        <option selected disabled>-- Select Item Type --</option>
                                        <option value="1">Product</option>
                                        <option value="2">Service</option>
                                    </select>
                                    @if ($errors->has('item_type'))
                                     <span class="help-block">
                                        <strong>{{ $errors->first('item_type') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group{{$errors->has('price') ? ' has-error' : ''}}">
                                    <label for="name">Price</label>
                                    <input type="number" min="0" name="price" class="form-control" placeholder="" value="{{old('price')}}" required>
                                    @if ($errors->has('price'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group{{$errors->has('img_url') ? ' has-error' : ''}}">
                                    <label for="name">Image</label>
                                    <input type="file" name="img_url" required />
                                    @if ($errors->has('img_url'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('img_url') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group{{$errors->has('short_description') ? ' has-error' : ''}}">
                                    <label for="short_desc">Short Description</label>
                                    <input type="text" class="form-control" name="short_description" value="{{old('short_description')}}" required />
                                    @if ($errors->has('short_description'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('short_description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group{{$errors->has('long_description') ? ' has-error' : ''}}">
                                    <label for="short_desc">Long Description</label>
                                    <textarea type="text" class="form-control" name="long_description" required>{{old('long_description')}}</textarea>
                                    @if ($errors->has('long_description'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('long_description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"> Save Item</i></button>
                            </div>
                        </div>
                    </div>
                </form>
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