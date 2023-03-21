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

    <div class="d-flex justify-content-center align-items-center mt-5">
        <div class="judul">
            <div class="h2 text-dark text-center">COMPLAINT!</div>
            <p class="text-dark fw-light text-center">Silahkan buat pengaduan anda.</p>
        </div>
    </div>

    <!-- konten 2 -->
    <div class="mb-5">
        <div class="d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-5">
                <div class="card bg-white text-dark rounded-bottom rounded-5">
                    <div class="card-body p-3 text-center">
                        <div class="mb-md-4 mt-md-1">
                            <img style="border-radius: 10px; width: 350px; height: auto;" src="assets/img/logoc.png" class="card-img-top p-2 mb-3" alt="">
                            <div class="container text-center">
                                <div class="row align-items-center">
                                    <div class="card-body">
                                        <form class="mt-5" method="post" action="<?= base_url('c_uhome/laporan') ?>" enctype="multipart/form-data">
                                            <div class="container text-center">
                                                <div class="mb-3">
                                                    <div class="d-flex justify-content-start">
                                                        <p>NIK</p>
                                                    </div>
                                                    <input type="text" class="form-control" id="nik" name="nik" aria-describedby="nik" value="<?= $user['nik'] ?>" disabled="disabled">
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="d-flex justify-content-start">
                                                        <p>Kategori</p>
                                                    </div>
                                                    <select name="kategori" id="kategori" type="text" class="form-control form-control-user">
                                                        <option select>-- Pilih --</option>
                                                        <?php foreach ($kategori as $k) { ?>
                                                            <option value="<?= $k['kategori_id'] ?>"><?= $k['kategori_nama'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-12 mt-3 mb-4">
                                                    <div class="d-flex justify-content-start">
                                                        <p>Subkategori</p>
                                                    </div>
                                                    <select name="subkategori_nama" id="subkategori_nama" type="text" class="form-control form-control-user">
                                                        <option selected value="">-- Pilih --</option>
                                                    </select>
                                                </div>
                                                <div class="container text-center">
                                                    <div class="row mb-3">
                                                        <input type="time" name="waktu" id="waktu">
                                                    </div>
                                                </div>
                                                <div class="input-group">
                                                    <div class="form-floating">
                                                        <textarea class="form-control" placeholder="Laporan Pengaduan" id="keterangan" name="keterangan" style="height: 100px;"></textarea>
                                                        <label for="floatingTextarea">keterangan</label>
                                                    </div>
                                                </div>
                                                <div class="card py-0 mt-3">
                                                    <div class="card-body">
                                                        <div class="container text-start">
                                                            <label for="uploadfotolapor">Upload Foto</label>
                                                            <div id="foto" name="foto" class="row mb-3 mt-1">
                                                                <input type="file" name="foto" size="20" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-evenly">
                                                <button class="btn btn-primary text-white mt-5 " type="submit">Submit</button>
                                                <button class="btn btn-dark text-white mt-5" type="reset">Reset</button>
                                                <a href="<?= base_url('c_uhome') ?>" class="btn btn-primary mt-5">Back</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Rafly XIIRPL 2023</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- end konten 2 -->
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