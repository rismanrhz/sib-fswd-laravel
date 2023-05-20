<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
    <a href="{{ route('home.create') }}" class="btn btn-primary mt-3 mb-3">Tambah</a>
        <table class="table">
            <thead>
                <tr class="table-primary">
                    <th scope="col">ID</th>
                    <th scope="col">Aksi</th>
                    <th scope="col">Avatar</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Role</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row">1</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <a class="btn btn-primary" href="{{route('home.show', 1 )}}">Detail</a> 
                            <a class="btn btn-warning" href="{{ route('home.edit', 1) }}">Edit</a> 

                            <form action="{{ route('home.destroy', 1) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                    </td>
                    <td>
                        <img src="{{asset('avatar/rismaa.jpg')}}" width="100em" class="rounded-circle">
                    </td>
                    <td>Risma</td>
                    <td>bunga@gmail.com</td>
                    <td>08123456789</td>
                    <td>admin</td>
                </tr>          
            </tbody>
        </table>
    </div>
</body>
</html>