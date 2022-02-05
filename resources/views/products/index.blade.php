@extends('layouts.app')

@section('content')

  <main role="main">

    <div class="container">

      <section class="jumbotron text-center">
        <div class="container">
          <h1>Album example</h1>
          <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
          <p>
            <a href="#" class="btn btn-primary my-2">Main call to action</a>
            <a href="#" class="btn btn-secondary my-2">Secondary action</a>
          </p>
      </section>


      <h2>Categories</h2>

      <a href="{{ route('product.index') }}" class="btn {{ request('category') ? 'btn-secondary' : 'btn-primary' }} m-1">All</a>
      @foreach (DB::table('categories')->get() as $value)
        <a href={{ route('product.index', $category->value) }}
          class="btn
              @if (request('category'))

               @if (request()->category->slug == $value->slug)
 btn-primary
               @else
btn-secondary
               @endif

               @else
btn-secondary
               @endif m-1">
          {{ $value->name }}</a>
      @endforeach

    </div>
    <div class="album py-5 bg-light">
      <div class="container">
        <div class="row">
          @if ($subCategories->count() > 0)
            <div class="col-md-2">
              <form action="{{ route('product.index', $category->slug) }}" method="GET">
                @foreach ($subCategories as $key => $subCategory)
                  <p><input class="d-inline form-check-input" id="subCategory{{ $key }}" type="checkbox" name="subcategory[]" value="{{ $subCategory->slug }}" @if ($subCategoriesIds != null)  @if (in_array($subCategory->id, $subCategoriesIds)) checked @endif @endif>
                    <label class="d-inline" for="subCategory{{ $key }}">{{ $subCategory->name }}</label>
                  </p>
                @endforeach
                <button type="submit" class="btn btn-outline-success mt-2">Filter</button>
              </form>
            </div>
          @endif
          <div class="row @if ($subCategories->count() > 0)col-md-10 @else col-12 @endif">
            <h2>Products</h2>
            @foreach ($products as $key => $value)
              <div class="col-sm-6 col-lg-4">
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
    </div>
    <div class="container my-5">
      <div class="d-none d-md-block">
        <div class="jumbotron">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              @for ($i = 2; $i < 9; $i += 3)
                <div class="carousel-item @if ($i == 2) active @endif">
                  <div class="row">
                    @foreach ($randomActiveProducts as $key => $value)
                      @if ($loop->index >= $i - 2 && $loop->index <= $i)

                        <div class="col-4">
                          <div class="card mb-4 shadow-sm">
                            <img src="{{ $value->image_url }}" alt="" class="bd-placeholder-img card-img-top">
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
                      @endif

                    @endforeach

                  </div>
                </div>

              @endfor
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </main>
  <footer class="text-muted">
    <div class="container">
      <p class="float-right">
        <a href="#">Back to top</a>
      </p>
      <p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
      <p>New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a href="/docs/4.6/getting-started/introduction/">getting started guide</a>.</p>
    </div>
  </footer>
@endsection
