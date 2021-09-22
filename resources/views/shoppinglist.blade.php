@extends('layouts.app')

@section('content')
<div class="container">
    <div class="list-group" >
    @foreach ($products as $product)
    @if($product->on_list == TRUE)
    <div class="d-flex mt-3 ">
        <a href="#" data-toggle="collapse" data-target="#collapseExample{{$product->id}}" aria-expanded="false" aria-controls="collapseExample{{$product->id}}" class="list-group-item list-group-item-action">{{$product->name}}</a>
    </div>
    <div class="collapse" id="collapseExample{{$product->id}}" >
    <div class="card card-body" style="border-radius: 0%">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
        </div>
        <div class="card-footer text-muted">
        Requested by: {{$product->user->name}} - {{$product->updated_at->diffForHumans()}}
        </div>
    </div>
    @endif
    @endforeach
</div>
@endsection
