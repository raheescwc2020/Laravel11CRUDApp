@extends('layouts.app')
@section('content')
<div class="container">
    <h1>New Product</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
   
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
<div class="row">
        <div class="mb-1 col-md-4" >
            <label for="name" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="name" name="name"  value="{{ old('name') }}">
        </div>
</div>
<div class="row">
   

        <div class="mb-1 col-md-4">
            <label for="category" class="form-label">Category</label>
            <input type="text" class="form-control" id="category" name="category" value="{{ old('category') }}">
        </div>
</div>
<div class="row">
<div class="mb-1 col-md-4">
       


            <label for="stock" class="form-label">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock" value="{{ old('stock') }}">
        </div>
</div>

<div class="row">
<div class="mb-1 col-md-4"></div>
<label for="image">Product Image:</label>
<input type="file" name="image" id="image" required>
</div>
</div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection