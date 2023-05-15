@extends('admin.dashboard')
@section('title', 'Category')
@section('content')
<div class="row justify-content-center">
  <div class="col-md-4">
    <form action="{{url('/add_category')}}" method="POST">
      @csrf
      <div class="input-group input-group">
        <input type="text" class="form-control" name="category" placeholder="Write category name">
        <span class="input-group-append">
          <button type="submit" class="btn btn-block btn-info">Add Category</button>
        </span>
      </div>
    </form>
  </div>
</div>

<div class="row justify-content-center pt-3">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Furniture Categories</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body p-0">
        <table class="table table-striped">
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th>Category</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $data)
            <tr>
              <td class="count"></td>
              <td>{{$data->name}}</td>
              <td>
                <a href="{{url('update_category', $data->id)}}">
                  <button type="button" class="btn btn-outline-info"><i class="fa fa-edit"></i> Edit</button>
                </a>
              </td>
              <td>
                <a onclick="return confirm('Are you sure to delete it?')" href="{{url('delete_category', $data->id)}}">
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
</div>
@endsection('content')