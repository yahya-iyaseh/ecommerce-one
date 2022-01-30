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
            <form action="{{ route('admin.category.update', $category->id) }}" method="post" enctype="multipart/form-data">
              @csrf
              @method('PUT')
             @include('admin.category._form', ['button' => 'Update'])
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
