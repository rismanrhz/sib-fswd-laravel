@extends('layouts.main')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Product</h1>
         <a class="btn btn-primary mb-1" href="{{ route('product.create') }}" role="button">Add</a>
        <div class="card mb-4">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Sale Price</th>
                            <th>Brand</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach($products as $product)
                       <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <center>
                                    @if ($product->image == null)
                                        <span class="badge bg-primary">No Image</span>
                                    @else
                                        <img src="{{ asset('storage/product/' . $product->image) }}" class="img-fluid" style="max-width: 100px;" alt="{{ $product->image }}">
                                    @endif
                                </center>
                            </td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->name }}</td>
                            <td>Rp. {{ number_format($product->price, 0, 2) }}</td>
                            <td>Rp. {{ number_format($product->sale_price, 0, 2) }}</td>
                            <td>
                               {{ $product->brands }}
                            </td>
                            <td>
                                <form onsubmit="return confirm('Are you sure? ');" action="{{ route('product.destroy', $product->id) }}" method="POST">
                                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                    </tr>
                       @endforeach 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection