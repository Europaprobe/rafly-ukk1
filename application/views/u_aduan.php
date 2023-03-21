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
    <link href="<?= base_url() ?>assets/templates/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse p-2" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <h2 class="text-dark">Citizen!</h2>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <!-- end navbar -->

    <div class="d-flex justify-content-center align-items-center">
        <div class="judul">
            <div class="h2 text-white text-center">List Pengaduan!</div>
            <p class="text-white fw-light text-center">Memastikan bahwa semua data yang anda laporkan sudah lengkap.</p>
        </div>
    </div>

    <!-- konten 2 -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="font-weight-bold text-dark">Data Pengaduan</h6>
            </div>
            <div class="card-body py-4">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th width="10%">Tanggal</th>
                                <th width="10%">Kategori</th>
                                <th width="10%">Subkategori</th>
                                <th width="25%">Laporan</th>
                                <th width="10%">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($xx as $x) : ?>
                                <tr>
                                    <td scope="col"><?= $no++ ?></td>
                                    <td scope="col"><?= $x['tgl'] ?></td>
                                    <td scope="col"><?= $x['kategori_nama'] ?></td>
                                    <td scope="col"><?= $x['subkategori_nama'] ?></td>
                                    <td scope="col"><?= $x['laporan'] ?></td>
                                    <td> <?php if ($x['status'] == 'selesai') : ?>

                                            <button type="button" class="btn btn-success">
                                                Selesai
                                            </button>

                                        <?php elseif ($x['status'] == 'proses') : ?>
                                            <a button type="button" class="btn btn-warning">
                                                Proses
                                            </a>
                                        <?php else : ?>
                                            <button type="button" class="btn btn-primary">
                                                Terkirim
                                            </button>
                                        <?php endif ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <a href="<?= base_url('C_uhome') ?>" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end konten 2 -->


    <!-- Page level plugins -->
    <script src="<?= base_url() ?>assets/templates/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/templates/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url() ?>assets/templates/js/demo/datatables-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>