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
    @if (Session::has('success'))
      <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    <div class="row">
      <div class="col">
        <!-- Form Basic -->
        <div class="card mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-Info">New Category</h6>
          </div>
          <div class="card-body">
            <form action="{{ route('admin.category.update', $category->id) }}" method="post" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="categoryName">Category Name</label>
                    <input type="text" id="categoryName" name="categoryName" aria-describedby="categoryName" placeholder="Enter The category Name" class="form-control @error('categoryName') is-invalid @enderror" value="{{ $category->name }}">
                    @error('categoryName')
                      <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="description">Category Description</label>
                    <textarea type="text" id="description" name="description" aria-describedby="description" placeholder="Enter The category Description"
                      class="form-control @error('description') is-invalid @enderror">{{ $category->description }}</textarea>
                    @error('description')
                      <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group mt-4">
                    <div class="custom-file ">
                      <div>
                        <input type="file" id="image" name="image" class="custom-file-input @error('image') is-invalid @enderror" value="{{ $category->image }}">
                        <label class="custom-file-label mt-0  mt-md-2" for="image">Category Image</label>
                        @error('image')
                          <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="text-center mt-0 col-12">
                    <img class="d-block mt-0 mx-auto cover center mb-2" src="{{ Storage::url($category->image) }}" alt="{{ $category->image }}" width="100">
                  </div>
                </div>
                <div class="col-12">
                  <button type="submit" class="btn btn-primary w-25">Save</button>
                  <a href="{{ route('admin.category.index') }}" class="btn btn-outline-dark">Return Back</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
