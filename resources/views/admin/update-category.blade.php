@extends('admin.index')
@section('title', 'Update Category')
@section('content')
        <div class="row justify-content-center">
            <div class="col-md-6">
            <div class="card card-default card-info">
    <div class="card-header">
    <h3 class="card-title">Update Category Details</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
            <form method="POST" action="{{url('/edit_category', $category->id)}}" enctype="multipart/form-data">
                @csrf
                @method('patch')
            <div class="card-body">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter category name" value="{{$category->name}}" required>
            </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
            <button type="submit" class="btn btn-info">Update category</button>
            </div>
            </form>
            </div>
            </div>
        </div>
      </div><!-- /.container-fluid -->
@endsection('content')