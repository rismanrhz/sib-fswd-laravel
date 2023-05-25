@extends('layouts.main')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Category</h1>
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