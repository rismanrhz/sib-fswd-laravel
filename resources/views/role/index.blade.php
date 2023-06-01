@extends('layouts.main')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Role</h1>
        <a class="btn btn-primary mb-1" href="{{ route('role.create') }}" role="button">Add</a>
        <div class="card mb-4">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                         @foreach($role as $data)
                       <tr>
                           <td>{{ $loop->iteration }}</td>
                           <td>
                               {{ $data['name'] }}
                           </td>
                           <td>
                               <form onsubmit="return confirm('Are you sure? ');" action="{{ route('role.destroy', $data->id) }}" method="POST">
                                    <a href="{{ route('role.edit', $data->id)}}" class="btn btn-warning" >edit</a>

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">Delete</button>
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