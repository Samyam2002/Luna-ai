@extends('admin.index')
@section('title', 'Add Product')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card card-default card-info">
            <div class="card-header">
                <h3 class="card-title">Add Products</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="{{url('/add_product')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter product name" required>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" name="description" placeholder="Enter product description" required>
                    </div>

                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" class="form-control" name="price" placeholder="Enter product price" required>
                    </div>

                    <div class="form-group">
                        <label>Stock</label>
                        <input type="number" class="form-control" name="stock" placeholder="Enter product stock" required>
                    </div>

                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control select2" style="width: 100%;" name="category" required>
                            <option value="" selected="selected">--Select product category--</option>
                            @foreach($category as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Product Image (in .png)</label>
                        <input type="file" name="image" required>
                    </div>

                    <div class="form-group">
                        <label>3D Product Image (in .glb)</label>
                        <input type="file" name="vimage" required>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Add product</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection('content')