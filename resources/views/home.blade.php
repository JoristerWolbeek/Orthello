@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Welcome {{ Auth::user()->name }}!</h2>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title">Shopping list</h5>
                <p class="card-text">This section shows you all the products currently on the shopping list, you can add, change or delete entries</p>
                <a href="{{url("/list")}}" class="btn btn-primary">Go to shopping list</a>
            </div>
        </div>
    </div>
    @foreach ($products as $product)
        @if ($product->updated_at >= auth::user()->last_login)
            
        @endif
    @endforeach
</div>
@endsection
