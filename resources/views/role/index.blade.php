@extends('layouts.main')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Role</h1>
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
                               {{ $data['role'] }}
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