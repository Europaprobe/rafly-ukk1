<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <style>
        body {
            background-color: white;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }

        a:link {
            text-decoration: none;
        }
    </style>
</head>

<body>

    <!-- navbar -->

    <div class="d-flex mb-3">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <img style="border-radius: 10px; width: 100px; height: auto;" src="assets/img/logoc.png" class="card-img-top p-2" alt="">
            </div>
        </nav>
    </div>

    <!-- end navbar -->

    <!-- title page -->

    <div class="d-flex justify-content-center align-items-center h-100">
        <div class="judul">
            <div class="h2 text-white text-center">Account Seting</div>
        </div>
    </div>

    <!-- end title page -->

    <!-- konten 1 -->
    <div class="background mb-5">
        <div class="container py-2">
            <div class="d-flex justify-content-center align-items-center">
                <div class="col-xl-12">
                    <div class="card bg-white text-dark" style="border-radius: 1rem;">
                        <div class="card-body p-1">
                            <div class="mb-md-1 mt-md-1">
                                <div class="card-body text-center">
                                    <h2 class="text-black">Account Setting</h2>
                                    <?= $this->session->flashdata('massage'); ?>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="<?= base_url('C_uset/edit_data/') . $user['id'] ?>" method="post">
                                    <div class="form-outline form-white mb-3 shadow p-3 mb-5 bg-body-tertiary rounded">
                                        <label for="name">Nama</label>
                                        <div class="d-flex justify-content-evenly">
                                            <input type="text" class="form-control" id="name" name="name" aria-describedby="name" value="<?= $user['name'] ?>" disabled="disabled">
                                            <input type="text" class="form-control" name="name1" aria-describedby="name">
                                        </div>
                                    </div>

                                    <div class="form-outline form-white mb-3 shadow p-3 mb-5 bg-body-tertiary rounded">
                                        <label for="nik">NIK</label>
                                        <div class="d-flex justify-content-evenly">
                                            <input type="number" class="form-control" id="nik" name="nik" aria-describedby="nik" value="<?= $user['nik'] ?>" disabled="disabled">
                                            <input type="number" class="form-control" name="nik1" aria-describedby="name">
                                        </div>
                                    </div>


                                    <div class="form-outline form-white mb-3 shadow p-3 mb-5 bg-body-tertiary rounded">
                                        <label for="user">Username</label>
                                        <div class="d-flex justify-content-evenly">
                                            <input type="text" class="form-control" id="user" name="username" aria-describedby="nik" value="<?= $user['username'] ?>" disabled="disabled">
                                            <input type="text" class="form-control" name="username1" aria-describedby="name">
                                        </div>
                                    </div>

                                    <div class="form-outline form-white mb-3 shadow p-3 mb-5 bg-body-tertiary rounded">
                                        <label for="password">Password</label>
                                        <div class="d-flex justify-content-evenly">
                                            <input type="password" class="form-control" id="password" name="password" aria-describedby="password" value="<?= $user['password'] ?>" disabled="disabled">
                                            <input type="text" class="form-control" name="password1" aria-describedby="name">
                                        </div>
                                    </div>

                                    <div class="form-outline form-white mb-3 shadow p-3 mb-5 bg-body-tertiary rounded">
                                        <label for="telp">Telepon</label>
                                        <div class="d-flex justify-content-evenly">
                                            <input type="number" class="form-control" id="telp" name="telp" aria-describedby="nik" value="<?= $user['telp'] ?>" disabled="disabled">
                                            <input type="text" class="form-control" name="telp1" aria-describedby="name">
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-sm-evenly">
                                        <button class="btn btn-primary mt-5" type="submit">Simpan</button>
                                        <a href="<?= base_url('c_uhome') ?>" class="btn btn-primary mt-5">Back</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end konten 1 -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>