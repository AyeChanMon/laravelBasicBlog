<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="card my-5">
                    <div class="card-body">
                        <p class="fs-3 fw-bold">Add New Item</p>
                        <hr>
                        @if(session("status"))
                            <p class="alert alert-success">{!! session('status')  !!}</p>
                            @endif
                        <!-- @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif -->
                        <form action="{{ route('form.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="@error('name') text-danger @enderror">Item Name</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                                @error('name')
                                    <small class="text-danger fw-fold">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="price">Price (MMK)</label>
                                        <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}">
                                        @error('price')
                                            <small class="text-danger fw-fold">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="stock">Stock (piece)</label>
                                        <input type="number" name="stock" id="stock" class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock') }}">
                                        @error('stock')
                                            <small class="text-danger fw-fold">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <button class="btn btn-primary">Save Item</button>
                        </form>
                    </div>
                </div>
            </div>
            @auth
            <div class="col-12 col-md-6">
                <div class="card my-5">
                    <div class="card-body">
                        {{ Auth::user() }}                            
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-outline-primary">Log Out</button>
                        </form>
                    </div>
                </div>
            </div>
            @endauth         
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                      @include('request-response.list');
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>