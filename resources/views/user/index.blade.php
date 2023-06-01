@extends('layouts.main')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">User</h1>
        <a class="btn btn-primary mb-1" href="{{ route('user.create') }}" role="button">Add</a>
        <div class="card mb-4">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Avatar</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                         @foreach($users as $data)
                       <tr>
                           <td>{{ $loop->iteration }}</td>
                           <td>
                               <img src="https://dummyimage.com/100x100/dee2e6/6c757d.jpg">
                           </td>
                           <td>
                               {{ $data['name'] }}
                           </td>
                           <td>
                               {{ $data['email'] }}
                           </td>
                           <td>
                               {{ $data['phone'] }}
                           </td>
                           <td>
                               {{ $data->role->name }}
                           </td>
                           <td>
                               <form onsubmit="return confirm('Are you sure? ');" action="{{ route('user.destroy', $data->id) }}" method="POST">
                                    <a href="{{ route('user.edit', $data->id ) }}" class="btn btn-warning" >edit</a>

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