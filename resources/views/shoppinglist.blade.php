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
            <a class="text-secondary" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="100%" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16" data-toggle="collapse" data-target="#collapseExample{{$product->id}}" aria-expanded="false" aria-controls="collapseExample{{$product->id}}">
            <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
            </svg></a>
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
</div>
@endsection
