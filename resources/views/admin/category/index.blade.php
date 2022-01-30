@extends('admin.layouts.layout')
@section('content')


  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Categories</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./">Home</a></li>
      <li class="breadcrumb-item">Category</li>
      <li class="breadcrumb-item active" aria-current="page">Categories</li>
    </ol>
  </div>




  <div class="col-lg-12">
    <a href="{{ route('admin.category.create') }}" class="btn btn-info mb-2">Create</a>

    <div class="card mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Products</h6>
      </div>
      <div class="table-responsive p-3">
        <table class="table align-items-center table-flush table-hover" id="dataTableHover">
          <thead class="thead-light">
            <tr>
              <th>Image</th>

              <th>Category Name</th>
              <th>Category Description</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>
          <tfoot>
            <tr>

              <th>Image</th>
              <th>Category Name</th>
              <th>Category Description</th>
              <th class="text-center">Actions</th>
            </tr>
          </tfoot>
          <tbody>
            @if (count($categories) > 0)
              @foreach ($categories as $key => $category)
                <tr>
                  <td><img src="{{ $category->image_url }}" alt="{{ $category->image }}" width="100"></td>
                  <td>{{ $category->name }}</td>
                  <td>{{ substr($category->description, 0, 30) }}...</td>
                  <td>
                    <div class="row">
                      <div class="col"> <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-sm btn-outline-primary w-100 mb-1"><i class="far fa-edit"></i></a>
                      </div>
                      <div class="col">
                        <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete the category?);">
                          @csrf
                          @method("DELETE")
                          <button type="submit" class="btn btn-outline-danger btn-sm w-100 mb-1"><i class="far fa-trash-alt"></i></button>

                        </form>
                      </div>
                    </div>


                  </td>

                </tr>
              @endforeach
            @endif

          </tbody>
        </table>
      </div>
    </div>
  </div>


@endsection
