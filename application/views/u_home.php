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

    <!-- title page -->

    <div class="d-flex justify-content-center align-items-center h-100 ">
        <div class="judul">
            <img style="border-radius: 10px; width: 200px; height: auto;" src="assets/img/logoc.png" class="card-img-top p-2 mb-3" alt="">
        </div>
    </div>

    <!-- end title page -->

    <!-- konten1 -->
    <div class="background">
        <div class="container py-3">
            <div class="d-flex justify-content-around align-items-start">
                <div class="col-lg-6">
                    <div class="card text-bg-info" style="border-radius: 1rem;">
                        <div class="card-body">
                            <div class="d-flex flex-row">
                                <div class="d-flex p-2">
                                    <img src="assets/img/user.png" style="border-radius: 50px; width: 150px; height: auto;" alt="">
                                </div>
                                <div class="d-flex flex-column mb-3">
                                    <h4 class="p-2">Halo, <?= $this->session->userdata('username') ?></h4>
                                    <h4 class="p-2"><?= $this->session->userdata('nik') ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end -->

    <!-- logout modal -->

    <div class="modal fade" id="logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Logout</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin akan logout?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a class="btn btn-primary" href="<?= base_url('c_authuser/logout') ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- end -->

    <!-- konten 2 -->
    <div class="d-flex justify-content-center align-items-center">
        <div class="row align-items-center">
            <!-- card 1 -->
            <div class="col mt-4">
                <div class="card-body">
                    <div class="card" style="width: 19rem;">
                        <div class="card-body shadow-lg text-center">
                            <i class="fas fa-pen" style="font-size: 150px;"></i>
                            <h6 class="card-subtitle mb-2 mt-3 text-muted fw-bold">Buat Pengaduan</h6>
                            <a class="btn btn-info" href="<?= base_url('c_userreport') ?>" class="card-link fw-bold text-primary">Click here</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card 1 -->
            <!-- card 2 -->
            <div class="col mt-4">
                <div class="card-body">
                    <div class="card" style="width: 19rem;">
                        <div class="card-body shadow-lg text-center">
                            <i class="fas fa-folder" style="font-size: 150px;"></i>
                            <h6 class="card-subtitle mb-2 mt-3 text-muted fw-bold">Pengaduan Anda</h6>
                            <a class="btn btn-info" href="<?= base_url('c_uaduan') ?>" class="card-link fw-bold text-primary">Click here</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card 2 -->
        </div>
    </div>
    <!-- end konten 2 -->
    <!-- konten 3 -->
    <div class="d-flex justify-content-center align-items-center">
        <div class="row align-items-center mb-5">
            <!-- card 1 -->
            <div class="col mt-4">
                <div class="card-body">
                    <div class="card" style="width: 19rem;">
                        <div class="card-body shadow-lg text-center">
                            <i class="fas fa-cog" style="font-size: 150px;"></i>
                            <h6 class="card-subtitle mb-2 mt-3 text-muted fw-bold">Setting akun</h6>
                            <a class="btn btn-info" href="<?= base_url('c_uset') ?>" class="card-link fw-bold text-primary">Click here</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card 1 -->
            <!-- card 2 -->
            <div class="col mt-4">
                <div class="card-body">
                    <div class="card" style="width: 19rem;">
                        <div class="card-body shadow-lg text-center">
                            <i class="fas fa-power-off" style="font-size: 150px;"></i>
                            <h6 class="card-subtitle mb-2 mt-3 text-muted fw-bold">Logout</h6>
                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#logout">
                                Click Here
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card 2 -->
        </div>
    </div>
    <!-- end konten 3 -->

    <!-- ajax -->

    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $("#kategori").change(function() {
                var url = "<?php echo site_url('c_uhome/get_sub_kategori'); ?>/" + $(this).val();
                $('#subkategori_nama').load(url);
                return false;
            })
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>