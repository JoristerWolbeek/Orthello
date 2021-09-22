@extends('layouts.app')

@section('content')
<div class="container">
    <form method="post" action="../list/add">
        <input hidden value="{{Auth::user()->id}}" name="id">
        <div class="input-group mb-3">
        <input type="text" name="name" class="form-control" placeholder="Chocolate" aria-label="Recipient's username" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit">Add to shoppinglist</button>
        </div>
        </div>
        @csrf
    </form>
    <div class="list-group" >
    @foreach ($products as $product)
    @if($product->on_list == TRUE)
    <div class="d-flex mt-3 justify-content-between">
        <div class="list-group-item list-group-item-action d-flex justify-content-between bg-secundary" >
            <a class="text-secondary" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="100%" fill="currentColor" class="bi bi-caret-down" viewBox="0 0 16 16" data-toggle="collapse" data-target="#collapseExample{{$product->id}}" aria-expanded="false" aria-controls="collapseExample{{$product->id}}">
            <path d="M3.204 5h9.592L8 10.481 3.204 5zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659z"/>
            </svg>
            </a>
            <h3>{{$product->name}}</h3>
            <div>
                <form method="post" action="../list/delete">
                    <input value="delete" type="submit" class="btn btn-danger">
                    <input hidden value="{{$product->id}}" name="id">
                    @csrf
                </form>
                </a>
            </div>
        </div>
    </div>
    <div class="collapse" id="collapseExample{{$product->id}}" >
        <div class="card-footer bg-secundary">
            <p>Requested by: {{$product->user->name}} - {{$product->updated_at->diffForHumans()}}</p>
        </div>
    </div>
    @endif
    @endforeach
@endsection


