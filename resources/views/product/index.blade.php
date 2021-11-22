@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
        <form method="post" action="../list/add" autocomplete="off">
            <input hidden value="{{ Auth::user()->id }}" name="id">
            <div class="input-group mb-3">
                <input type="text" id="search" name="name" class="form-control" placeholder="Chocolate" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Add to shopping list</button>
                </div>
            </div>
            @csrf
        </form>
        <div class="list-group">
            @foreach ($products->sortBy(request('sort')) as $product)
                <div class="d-flex mt-3 justify-content-between">
                    <div class="list-group-item list-group-item-action d-flex justify-content-between bg-secundary">
                        <a class="text-secondary" href="#/"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="100%" fill="currentColor"
                                class="bi bi-caret-down" viewBox="0 0 16 16" data-toggle="collapse" data-target="#collapseExample{{ $product->id }}"
                                aria-expanded="false" aria-controls="collapseExample{{ $product->id }}">
                                <path
                                    d="M3.204 5h9.592L8 10.481 3.204 5zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659z" />
                            </svg>
                        </a>
                        <h3 style="margin: 0px">{{ $product->name }}</h3>
                        <div>
                            <form method="POST" action="{{ url('productEntity/destroy') }}">
                                {{ method_field('DELETE') }}
                                <input value="Delete" type="submit" class="btn btn-danger">
                                <input hidden value="{{ $product->id }}" name="id">
                                @csrf
                            </form>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="collapse " id="collapseExample{{ $product->id }}">
                    <div class="container list-group px-5 my-5">
                        <form method="POST" action="{{ url('product/update/' . $product->id) }}">
                            @csrf
                            {{ method_field('PUT') }}
                            <input hidden value="{{ $product->id }}" name="id">
                            <div class="form-floating mb-3">
                                <label for="product">Product</label>
                                <input required class="form-control" id="name" type="text" placeholder="product" data-sb-validations="required" />
                            </div>
                            <div class="form-floating mb-3">
                                <label for="newField2">Image</label>
                                <input class="form-control" id="img" type="file" placeholder="New Field 2" />
                            </div>
                            <div class="d-grid">
                                <input class="btn btn-primary btn-lg" id="submitButton" value="Change" type="submit"></button>
                            </div>
                        </form>
                    </div>

                </div>
            @endforeach
            <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

        @endsection
