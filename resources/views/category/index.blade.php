@extends('layouts.main')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Category</h1>
        <a class="btn btn-primary mb-1" href="{{ route('category.create') }}" role="button">Add</a>
        <div class="card mb-4">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                         @foreach($categories as $data)
                       <tr>
                           <td>{{ $loop->iteration }}</td>
                           <td>
                               {{ $data['name'] }}
                           </td>
                           <td>
                               <form onsubmit="return confirm('Are you sure? ');" action="{{ route('category.destroy', $data->id) }}" method="POST">
                                    <a href="{{ route('category.edit', $data->id) }}" class="btn btn-sm btn-warning">Edit</a>
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