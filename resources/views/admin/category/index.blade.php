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

  <div class="row">


    <div class="col-11 mb-4 mx-auto">
      <a href="{{ route('admin.category.create') }}" class="btn btn-info mb-2">Create</a>

      <!-- Simple Tables -->
      <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Categories</h6>
        </div>
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th>Category Number</th>
                <th>Category Name</th>
                <th>Category Description</th>
                <th>Image</th>
                <th class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
              @if (count($categories) > 0)
                @foreach ($categories as $key => $category)
                  <tr>
                    <td><a href="#">{{ $key + 1 }}</a></td>
                    <td>{{ $category->name }}</td>
                    <td>{{ substr($category->description, 0, 30) }}...</td>
                    <td><img src="{{ Storage::url($category->image) }}" alt="{{ $category->image }}" width="100"></td>
                    <td>
                      <div class="row">
                        <div class="col"> <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-sm btn-outline-primary w-100 mb-1"><i class="far fa-edit"></i></a>
                        </div>
                        <div class="col">
                          <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST" onsubmit="return confirmDelete()">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-outline-danger btn-sm w-100 mb-1"><i class="far fa-trash-alt"></i></button>

                          </form>
                        </div>
                      </div>


                    </td>

                  </tr>
                @endforeach
              @else
                <div class="alert alert-warning" role="alert">There are no Categories</div>
              @endif

            </tbody>
          </table>
        </div>
        <div class="card-footer">

          {{ $categories->links() }}
        </div>
      </div>
    </div>
  </div>


  <script>
        confirmDelete = ()=>{
            return confirm('Are you sure you want to delete', 'Delete Category');
        }
  </script>
@endsection
