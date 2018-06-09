@extends('layouts.master')

@section('content')

@if(Session::has('success'))
<div class="row">
  <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
    <div id = "charge-message" class="alert alert-success">
      {{ Session::get('success') }}
    </div>
  </div>
</div>
@endif

@foreach($products->chunk(3) as $productChunk)
<div class="row">
  @foreach($productChunk as $product)
    <div class="col-sm-6 col-md-4">
      <div class="card" style="width: 18rem;">
        <img class="card-img-top img-responsive" src="{{ $product->imagePath }}" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">{{ $product->title }}</h5>
          <p class="card-text">{{ $product->description }}</p>
          <div class="pull-left price">
            ${{ $product->price }}
          </div>
          <a href="{{ route('product.addToCart', ['id' => $product->id]) }}" class="btn btn-primary pull-right">Add to Cart</a>
        </div>
      </div>
    </div>
    @endforeach
</div>
<br>
@endforeach

@endsection
