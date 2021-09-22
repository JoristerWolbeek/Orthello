@extends('layouts.app')

@section('content')
<div class="container">
    <div class="list-group" >
    @foreach ($products as $product)
    @if($product->on_list == TRUE)
    <div class="d-flex mt-3 justify-content-between">
        <div class="list-group-item list-group-item-action d-flex justify-content-between bg-primary" >
            <a class="text-secondary" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="100%" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16" data-toggle="collapse" data-target="#collapseExample{{$product->id}}" aria-expanded="false" aria-controls="collapseExample{{$product->id}}">
            <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
            </svg></a>
            <h2>{{$product->name}}</h2>
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
        <div class="card-footer bg-primary">
            <p style="color: #495057;">Requested by: {{$product->user->name}} - {{$product->updated_at->diffForHumans()}}</p>
        </div>
    </div>
    @endif
    @endforeach
</div>
@endsection
