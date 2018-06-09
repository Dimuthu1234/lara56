@extends('layouts.master')

@section('content')
  @if(Session::has('cart'))
  <div class="row">
    <div class="col-sm-8 col-md-8 col-md-offset-3 col-sm-offset-3">
        <ul class="list-group">
            @foreach($products as $product)
              <li class="list-group-item">
                <strong>{{ $product['item']['title'] }}</strong>
                <span class="badge badge-pill badge-success pull-right">{{ $product['qty'] }}</span>
                <span class="badge badge-pill badge-success">${{ $product['price'] }}</span>
                <div class="btn-group pull-right">
                    <button type="button" name="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                      <li><a href="#">Reduce by 1</a></li>
                      <li><a href="#">Reduce All</a></li>
                    </ul>
                </div>
              </li>
            @endforeach
        </ul>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-8 col-md-8 col-md-offset-3 col-sm-offset-3">
        <strong>Total : ${{ $totalPrice }}</strong>
    </div>
  </div>
<hr>
  <div class="row">
    <div class="col-sm-8 col-md-8 col-md-offset-3 col-sm-offset-3">
        <a href="{{ route('checkout') }}" type="button" name="button" class="btn btn-primary">Checkout</a>
    </div>
  </div>
  @else
  <div class="row">
    <div class="col-sm-8 col-md-6 col-md-offset-3 col-sm-offset-3">
        <h2>No Item in Cart!</h2>
    </div>
  </div>
  @endif
@endsection
