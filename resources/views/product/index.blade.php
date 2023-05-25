@extends('layouts.main')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Product</h1>
        <div class="card mb-4">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Category</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Sale Price</th>
                            <th>Brand</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach($products as $data)
                       <tr>
                           <td>{{ $loop->iteration }}</td>
                           <td>
                               {{ $data['category'] }}
                           </td>
                           <td>
                               {{ $data['name'] }}
                           </td>
                           <td>
                               {{ $data['price'] }}
                           </td>
                           <td>
                               {{ $data['sale_price'] }}
                           </td>
                           <td>
                               {{ $data['brands'] }}
                           </td>
                           <td>
                               <a href="#" class="btn btn-warning ">Edit</a>
                                <a href="#" class="btn btn-danger ">Delete</a>
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