@extends('layouts.app')

@section('content')
  <div class="container">
    <h2>Products</h2>
    <div class="row">
      <table class="table table-hover">
        <thead>

          <tr>
            <th class="col">#</th>
            <th class="col">Image</th>
            <th class="col">Product</th>
            <th class="col">Price</th>
            <th class="col">Qty</th>
            <th class="col">Remove</th>
          </tr>
        </thead>
        <tbody>
          @if ($cart)

            @foreach ($cart->items as $key => $value)

              <tr>
                <th scope="row">1</th>
                <td><img src="{{ asset('images/noImage.png') }}" width="60"></td>
                <td>Name</td>
                <td>$3300</td>
                <td>
                  <div class="d-flex justify-content-between align-items-center gap-2">
                    <input type="text" name="qty" class="form-control" />

                    <button class="btn btn-outline-secondary btn-sm">
                      <i class="fa fa-rotate-right"></i>
                    </button>
                  </div>

                </td>
                <td>
                  <button class="btn btn-danger">Remove</button>
                </td>
              </tr>
            @endforeach
          @else
            <div class="alert alert-warning">There is no product in Cart</div>

          @endif

        </tbody>
      </table>
    </div>
  </div>




@endsection
