@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Welcome {{ Auth::user()->name }}!</h2>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="100%" fill="currentColor" class="bi bi-cart4"
                                viewBox="0 0 16 16">
                                <path
                                    d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                            </svg> Shopping list</h5>
                        <p class="card-text">This section shows you all the products currently on the shopping list, you can add, change or
                            delete entries</p>
                        <a href="{{ url('/list') }}" class="btn btn-primary">Go to shopping list</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-12">
                <h5 class="mt-4"> <span class="p-2 text-primary"> Version 1.1</span> - Nov 25 2021</h5>
                <ul class="list-unstyled mt-3">
                    <li class="text-muted ml-3"><i class="mdi mdi-circle-medium mr-2"></i>New colour palette</li>
                    <li class="text-muted ml-3"><i class="mdi mdi-circle-medium mr-2"></i>Disabled notifaction due to a bug</li>
                    <li class="text-muted ml-3"><i class="mdi mdi-circle-medium mr-2"></i>Added product <a href={{ url('productEntity') }}>register</a> see all
                        products in database.</li>
                </ul>

                <h5 class="mt-4"> <span class="p-2 text-primary"> Version 1.0.0</span> - Oct 1 2021</h5>
                <ul class="list-unstyled mt-3">
                    <li class="text-muted ml-3"><i class="mdi mdi-circle-medium mr-2"></i>Initial Released</li>
                </ul>
            </div>
        </div>
    </div>

@endsection
