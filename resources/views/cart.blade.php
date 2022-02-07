@extends('layouts.app')

@section('content')
  <div class="container">
    <h2>Products</h2>
    <div class="row">
        @if($errors->any())
        @foreach ($errors->all() as $error)
            <span class="d-block invalid-feedback">{{ $error }}</span>
        @endforeach
        @endif
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
                <td><img src="{{ $value['image'] }}" width="60"></td>
                <td>{{ $value['name'] }}</td>
                <td>${{ $value['price'] }}</td>
                <td>
                  <form action="{{ route('cart.update', $value['id']) }}" method="post">
                    @csrf
                    <div class="d-flex justify-content-between align-items-center gap-2">
                      <input type="number" step="1" name="qty" class="form-control" value="{{ $value['qty'] }}" />
                      <button type="submit" class="btn btn-outline-secondary btn-sm"><i class="fa fa-rotate-right"> Update</i><span></span></button>
                    </div>
                  </form>
                </td>
                <td>
                    <form action="{{ route('cart.destroy', $value['id']) }}" method="post">
                    @csrf
                    @method('DELETE')
                  <button class="btn btn-danger">Remove</button>

                    </form>
                </td>
              </tr>
            @endforeach
          @else
            <div class="alert alert-warning">There is no product in Cart</div>

          @endif

        </tbody>
      </table>
      <hr>
      <div class="card-footer">
        <a href="{{ url('/') }}" class="btn btn-warning">Continue Shopping</a>
        <span style="margin-left: 300px;">Total Price: ${{  isset($cart->totalPrice) ? $cart->totalPrice : 0 }}</span>
        <button class="btn btn-info float-end">Checkout</button>
      </div>
    </div>
  </div>




@endsection
