@extends('layouts.app')

@section('content')


  <div class="container">
    <div class="card">
      <div class="row">
        <aside class="col-md-3 border-right">
          <div class="gallery-wrap">
            <a href="#">
              <img src="{{ $product->image_url }}" alt="asdfsdsafsdf" class="img-big-wrap" height="200" style="width: 100%;">
            </a>
          </div>
        </aside>

        <aside class="col-md-9">
          <section class="card-body p-5">
            <h3 class="title h3 mb-3">{{ $product->name }}</h3>
            <p class="price-detail-wrap mb-3">
              <span class="price h3 text-danger">
                <span class="currency">USD $</span>&nbsp;{{ $product->price }}
              </span>
            </p>
            <h3 class="h5">Description</h3>
            <div class=" mb-3">
              <p>{!! $product->description !!}</p>
            </div>
            <h3 class="h5">Additional Information</h3>
            <div>
              <p>{!! $product->additional_info !!}</p>
            </div>
            <hr>
            <div class="row">
              <a href="#" class="btn btn-lg btn-outline-primary text-uppercase w-25">Add to Cart</a>
            </div>
          </section>
        </aside>
      </div>
    </div>
    @if ($products->count() > 0)
      <div class="jumbotron">
        <div class="row">
          @foreach ($products as $key => $value)
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img src="{{ $value->image_url }}" alt="" class="bd-placeholder-img card-img-top" width="100%">
                <div class="card-body d-flex flex-column justify-content-between">
                  <p class="card-text"><b>{{ $value->name }}.</b></p>
                  <p class="card-text mt-2">{{ \Str::limit($value->description, 120) }}.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="{{ route('prodcut.show', $value->id) }}" type="button" class="btn btn-sm btn-outline-success">View</a>
                      <button type="button" class="btn btn-sm btn-outline-primary">Add to Cart</button>
                    </div>
                    <small class="text-muted">{{ $value->created_at->diffForHumans() }}</small>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
  </div>

  @endif

@endsection
