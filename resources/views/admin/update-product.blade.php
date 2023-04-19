@extends('admin.index')
@section('title', 'Update Product')
@section('content')
        <div class="row justify-content-center">
            <div class="col-md-6">
            <div class="card card-default card-info">
    <div class="card-header">
    <h3 class="card-title">Update Product Details</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
            <form method="POST" action="{{url('/edit_product', $product->id)}}" enctype="multipart/form-data">
                @csrf
            <div class="card-body">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter product name" value="{{$product->name}}" required>
            </div>

            <div class="form-group">
                <label>Description</label>
                <input type="text" class="form-control" name="description" placeholder="Enter product description" value="{{$product->description}}" required>
            </div>

            <div class="form-group">
                <label>Price</label>
                <input type="number" class="form-control" name="price" placeholder="Enter product price" value="{{$product->price}}" required>
            </div>

            <div class="form-group">
                <label>Stock</label>
                <input type="number" class="form-control" name="stock" placeholder="Enter product stock" value="{{$product->stock}}" required>
            </div>

            <div class="form-group">
                <label>Category</label>
                <select class="form-control select2" style="width: 100%;" name="category" required>
                    <option value="{{$product->category_id}}" selected="selected">{{$product->category->name}}</option>
                    @foreach($category as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group row">
              <div class="col-md-4">
                <label>Current Image</label>
                <img src="/product/{{$product->image}}" style="height:100px; width:100px" required>
              </div>
            </div>

            <div class="form-group">
              <label>Change Image</label>
              <input type="file" name="image">
            </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
            <button type="submit" class="btn btn-info">Update product</button>
            </div>
            </form>
            </div>
            </div>
        </div>
      </div><!-- /.container-fluid -->
@endsection('content')