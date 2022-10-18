<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bergabung Jadi Mitra</title>
    <link rel="stylesheet" href="{{ asset('mazer') }}/assets/css/main/app.css" />
    <link rel="shortcut icon" href="{{ asset('mazer') }}/assets/images/logo/favicon.svg" type="image/x-icon" />
    <link rel="shortcut icon" href="{{ asset('mazer') }}/assets/images/logo/favicon.png" type="image/png" />
</head>

<body>
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-md-8 offset-md-2 text-center">
                <h2>Bergabung Menjadi Mitra</h2>
                <p>Isi formulir dibawah ini dengan benar!</p>
            </div>
            <div class="col-md-4 offset-md-4">
                <form action="{{ route('frontend.mitra.register.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" placeholder="Nama Mitra"
                                name="name">
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="file" class="form-control form-control-xl" placeholder="Logo" name="logo">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            @error('logo')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" placeholder="Deskripsikan Kamu!" name="description">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            @error('description')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg">Kirim Formulir</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
