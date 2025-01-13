@extends('layouts.app')
@section('content')


<script>
function confirmDelete(productId) {
    if (confirm('Are you sure you want to delete this product?')) {
        document.getElementById(`delete-form-${productId}`).submit();
    }
}

</script>
<div class="container">



<a href="{{ route('products.create') }}" class="btn btn-secondary"  >Create New Product</a>

<h1>List of Products</h1>
ducts</h1>

    <!-- Category Filter Dropdown -->
    <form method="GET"  action="{{ route('products.index') }}" class="mb-3">
        <div class="form-group row">
            <label for="category" class="col-form-label col-sm-2">Category</label>
            <div class="col-sm-4">
                <select name="category" id="category" class="form-control" onchange="this.form.submit()">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->category}}" {{ request('category') == $category->category? 'selected' : '' }}>
                            {{ $category->category}}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div><input type="submit" value="Submit"></div>
    </form>
<table class="table table container">
<thead><tr>
    <th>Sl No</th>
<th>Name</th>
<th>Category</th>
<th>Stock</th>
<th>Images</th>
<th>Edit</th>
<th>Delete</th>

</tr></thead>
<tbody>
    @forelse ($products as $key=> $product )
    <tr>


        <td>{{ ($products->currentPage()-1)*$products->perPage()+$key+1   }}
            
    
    </td>
       
        <td>{{$product->name}}</td>
        <td>{{$product->category}}</td>
        <td>{{$product->stock}}</td>

<td>
        @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="200">
            @else
                <p>No image available.</p>
            @endif
        </td>
        
        <td>
        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a></td>
<td>
        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;" id="delete-form-{{ $product->id }}">
    @csrf
    @method('DELETE')
    <button type="button" class="btn btn-danger" onclick="confirmDelete('{{ $product->id }}')">Delete</button>
</form>    
</td>
    </tr>
    @empty
    <tr>

    <td colspan="5" class="text-center">No Products Found</td>
    </tr>
    
    @endforelse
</tbody>


</table>
<div class="d-flex justify-center">

{{ $products->links()}}
</div>


</div>
@endsection
