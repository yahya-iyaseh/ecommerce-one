@extends('admin.layouts.layout')



@section('content')
  <div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Form Basics</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item">Forms</li>
        <li class="breadcrumb-item active" aria-current="page">Form Basics</li>
      </ol>
    </div>
    @if(Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    <div class="row">
      <div class="col">
        <!-- Form Basic -->
        <div class="card mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Form Basic</h6>
          </div>
          <div class="card-body">
            <form action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="categoryName">Category Name</label>
                <input type="text" id="categoryName" name="categoryName" aria-describedby="categoryName" placeholder="Enter The category Name" class="form-control @error('categoryName') isInvalid @enderror" value="{{ old('categoryName') }}">
                @error('categoryName')
                  <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div>
              <div class="form-group">
                <label for="description">Category Description</label>
                <textarea type="text" id="description" name="description" aria-describedby="description" placeholder="Enter The category Name" class="form-control @error('description') isInvalid @enderror">{{ old('description') }}</textarea>
                @error('description')
                  <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div>

              <div class="form-group">
                <div class="custom-file">
                  <input type="file" id="image" name="image" class="custom-file-input @error('image') isInvalid @enderror" value="{{ old('image') }}">
                  <label class="custom-file-label" for="image">Category Image</label>
                  @error('image')
                  <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                  @enderror
                </div>
              </div>
              <button type="submit" class="btn btn-primary w-25">Save</button>
              <a href="{{ route('admin.category.index') }}" class="btn btn-outline-dark">Return Back</a>
            </form>
          </div>
        </div>






      </div>
    </div>
  </div>
@endsection
