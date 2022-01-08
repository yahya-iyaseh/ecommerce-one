@extends('admin.layouts.layout')



@section('content')
  <div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Create Category</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item">Category</li>
        <li class="breadcrumb-item active" aria-current="page">Create Category</li>
      </ol>
    </div>
    <div class="row">
      <div class="col">
        <!-- Form Basic -->
        <div class="card mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-Info">New Category</h6>
          </div>
          <div class="card-body">
            <form action="{{ route('admin.subCategory.update', $subCategory->id) }}" method="post">
                @method('PUT')
              @csrf
              <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" id="name" name="name" aria-describedby="name" placeholder="Enter The category Name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $subCategory->name) }}">
                @error('name')
                  <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div>
              <div class="form-group">
                <div class="custom-file">
                  <label for="category_id">Category Parent</label>
                  <select name="category_id" id="category_id">
                    @foreach ($categories as $category)
                      <option value="{{ $category->id }}" @if ($category->id == old('category_id', $subCategory->category_id))
                        selected
                          @endif
                    >{{ $category->name }}</option>
                    @endforeach

                  </select>
                  @error('category_id')
                    <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                  @enderror
                </div>
              </div>
              <button type="submit" class="btn btn-primary w-25">Update</button>
              <a href="{{ route('admin.subCategory.index') }}" class="btn btn-outline-dark">Return Back</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
