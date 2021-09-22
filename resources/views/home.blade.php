@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title">Shopping list</h5>
                <p class="card-text">This section shows you all the products currently on the shopping list, you can add, change or delete entries</p>
                <a href="{{url("/list")}}" class="btn btn-primary">Go to shopping list</a>
            </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title">Product index</h5>
                <p class="card-text">This section shows you all the products the database cuurently knows. You can add, change or delete entries.</p>
                <a href="#" class="btn btn-primary">Go to product index</a>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
