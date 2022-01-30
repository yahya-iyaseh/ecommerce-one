@extends('admin.layouts.layout')
@section('content')


  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Items</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./">Home</a></li>
      <li class="breadcrumb-item">Item</li>
      <li class="breadcrumb-item active" aria-current="page">Items</li>
    </ol>
  </div>


  <div class="col-lg-12">
    <a href="{{ route('admin.item.create') }}" class="btn btn-info mb-2">Create</a>

    <div class="card mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">DataTables with Hover</h6>
      </div>
      <div class="table-responsive p-3">
        <table class="table align-items-center table-flush table-hover" id="dataTableHover">
          <thead class="thead-light">
            <tr>
              <th>Image</th>
              <th>Name</th>
              <th>Description</th>
              <th>Price</th>
              <th>Category</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Image</th>
              <th>Name</th>
              <th>Description</th>
              <th>Price</th>
              <th>Category</th>
              <th>Actions</th>
            </tr>
          </tfoot>
          <tbody>
            @foreach ($items as $key => $product)
              <tr>
                <td><img src="{{ Storage::url($product->image) }}" alt="{{ $product->image }}" width="120"></td>
                <td>{{ $product->name }}</td>
                <td>{!! Str::substr($product->description, 0, 140) !!}...</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->category->name }}</td>
                <td>
                  <div class="row mt-2">
                    <div class="col-md-6"><a href="{{ route('admin.item.edit', $product->id) }}" class="btn btn-success"><i class="fas fa-pen-square"></i></a></div>
                    <div class="col-md-6">
                      <form action="{{ route('admin.item.destroy', $product->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this product?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger mt-2 mt-md-0"><i class="far fa-trash-alt"></i></button>
                      </form>
                    </div>
                  </div>

                </td>

              </tr>
            @endforeach


          </tbody>
        </table>
      </div>
    </div>
  </div>

@endsection
