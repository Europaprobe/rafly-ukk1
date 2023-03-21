<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <style>
        body {
            background-color: white;
        }

        a:link {
            text-decoration: none;
        }
    </style>

</head>

<body>

    <div class="background w-100 mt-4 ">
        <div class="container py-4">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-5 col-xl-6">
                    <div class="card bg-white text-dark" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-3 mt-md-4">
                                <div class="card-body">
                                    <div class="row">
                                        <h5 class="card-title mt-3 mb-4">Daftar</h5>
                                        <form action="<?= base_url('c_authuser/reg') ?>" method="post">

                                            <div class="form-outline form-white mb-3">
                                                <input name="nik" type="number" class="form-control" placeholder="NIK" aria-label="Confirm Password">
                                                <small class='text-danger pl-3'>
                                                    <?= form_error('nik'); ?>
                                                </small>
                                            </div>

                                            <div class="form-outline form-white mb-3">
                                                <input name="username" type="text" class="form-control" placeholder="Username" aria-label="Username">
                                                <small class='text-danger pl-3'>
                                                    <?= form_error('username'); ?>
                                                </small>
                                            </div>

                                            <div class="form-outline form-white mb-3">
                                                <input name="name" type="text" class="form-control" placeholder="Nama Lengkap" aria-label="nama">
                                                <small class='text-danger pl-3'>
                                                    <?= form_error('name'); ?>
                                                </small>
                                            </div>

                                            <div class="form-outline form-white mb-3">
                                                <input name="telp" type="number" class="form-control" placeholder="Telepon" aria-label="email">
                                                <small class='text-danger pl-3'>
                                                    <?= form_error('telp'); ?>
                                                </small>
                                            </div>

                                            <div class="form-outline form-white mb-3">
                                                <input name="password1" type="password" class="form-control" placeholder="Password" aria-label="Password">
                                                <small class='text-danger pl-3'>
                                                    <?= form_error('password1'); ?>
                                                </small>
                                            </div>

                                            <div class="form-outline form-white mb-3">
                                                <input name="password2" type="password" class="form-control" placeholder="Confirm Password" aria-label="Confirm Password">
                                                <small class='text-danger pl-3'>
                                                    <?= form_error('password1'); ?>
                                                </small>
                                            </div>
                                    </div>
                                </div>
                                <button class="mt-3 mb-3 py-1 btn btn-primary col-lg-12" type="submit">Daftar</button>
                                <a href="<?= base_url() ?>c_authuser" class="py-1 btn btn-primary col-lg-12 fw-bold">Back to menu</a>
                            </div>
                            </form>
                        </div>
                        <div class="copyright text-center mb-4">
                            <span>Copyright &copy; Rafly XIIRPL 2023</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>