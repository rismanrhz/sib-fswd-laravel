

<!DOCTYPE html>
<html>
<head>
    <title>tambah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>   
    <div class="container">
    <h2 class="mb-3 mt-3">Edit pengguna</h2>
    <form action="edit.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="1">
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nama lengkap" value="Risma" required>
        </div>
        <div class="mb-3 row">
            <div class="col-md-6">
            <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-select" id="role" name="role" required>
                            <option value="">Pilih Role</option>
                            <option value="1">admin</option>                        </select>
                    </div>
            </div>
            <div class="col-md-6">
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="risma27">
            </div>
            </div>
        </div>
        
        <div class="mb-3 row">
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value="bunga@gmail.com">
            </div>
            <div class="col-md-6">
            <div class="mb-3">
                <label for="phone" class="form-label">Telp</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="08199987262" value="08123456789">
            </div>
            </div>
        </div>
        <div class="mb-3">
                <label for="address" class="form-label">Alamat lengkap</label>
                <textarea type="text" class="form-control" id="address" name="address" >Jakarta</textarea>
        </div>
        <div class="mb-3">
                <label for="avatar" class="form-label">Unggah Foto</label>
                <input type="hidden" name="oldImage" value=rismaa.jpg>
                <img class='img-preview'>                <input type="file" class="form-control" id="avatar" name="avatar" onchange="previewImage()">
        </div>
        <button type="submit" class="btn btn-primary mb-3">Edit</button>
    </div>
    </form>
</body>
<script>
    function previewImage(){
        const image = document.querySelector('#avatar');
        const imgPreview = document.querySelector('.img-preview');
        imgPreview.style.display = 'block';
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
</html>