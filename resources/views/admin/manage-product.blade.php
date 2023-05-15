@extends('admin.dashboard')
@section('title', 'Manage Product')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Product Details</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body p-0">
        <table class="table">
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th>Name</th>
              <th>Description</th>
              <th>Price</th>
              <th>Stock</th>
              <th>Category</th>
              <th>Image</th>
              <th>3D Image</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            @foreach($product as $product)
            <tr>
              <td class="count"></td>
              <td>{{$product->name}}</td>
              <td>{{$product->description}}</td>
              <td>{{$product->price}}</td>
              <td>{{$product->stock}}</td>
              <td>{{$product->category->name}}</td>
              <td><img src="/product/{{$product->image}}" style="width:100px;height: 100px;"></td>
              <td><img src="/product/{{$product->vimage}}" style="width:100px;height: 100px;"></td>
              <td>
                <a href="{{url('update_product', $product->id)}}">
                  <button type="button" class="btn btn-outline-info"><i class="fa fa-edit"></i> Edit</button>
                </a>
              </td>
              <td>
                <a onclick="return confirm('Are you sure to delete it?')" href="{{url('delete_product', $product->id)}}">
                  <button type="button" class="btn btn-outline-info"><i class="fa fa-trash"></i> Delete</button>
                </a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</div>
@endsection('content')