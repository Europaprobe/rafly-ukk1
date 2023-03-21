<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin|Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>assets/templates/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>assets/templates/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/templates/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-crown text-danger"></i>
                </div>
                <div class="sidebar-brand-text">Administrator</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('C_petugas') ?>">
                    <i class="fas fa-fw fa-tachometer-alt text-danger"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Master Data
            </div>

            <!-- Kategori -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('C_petugas/kategori') ?>">
                    <i class="fas fa-file-alt text-danger"></i>
                    <span>Kategori</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Laporan
            </div>

            <!-- Laporan -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('C_petugas/laporan') ?>">
                    <i class="fas fa-exclamation text-danger"></i>
                    <span>Laporan</span></a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-grey bg-grey topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="text-black"><?= $this->session->userdata('a_username') ?></span>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-danger"></i>
                                    Profile
                                    <a class="dropdown-item" href="<?= base_url('c_admin/logout') ?>" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-danger"></i>
                                        Logout
                                    </a>
                            </div>
                        </li>
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-center mb-2">
                        <h1 class="mb-0 text-dark">Laporan</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <div class="card shadow mb-4 col-xl-12">
                            <div class="card-header bg-dark py-3">
                                <h6 class="m-0 font-weight-bold text-white">Data Laporan</h6>
                            </div>
                            <div class="card-body">
                                <a href="<?= base_url('C_petugas/laporan_pdf/') ?>" class="btn btn-primary">Print</a>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th width="10%">Tanggal</th>
                                                <th width="10%">Waktu</th>
                                                <th width="20%">Kategori</th>
                                                <th width="20%">Subkategori</th>
                                                <th width="20%">Isi Laporan</th>
                                                <th width="20%">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($aduan as $ad) : ?>
                                                <tr>
                                                    <td scope="row"><?= $i ?></td>
                                                    <td><?= $ad['tgl'] ?></td>
                                                    <td><?= $ad['waktu'] ?></td>
                                                    <td><?= $ad['kategori_nama'] ?></td>
                                                    <td><?= $ad['subkategori_nama'] ?></td>
                                                    <td><?= $ad['laporan'] ?></td>
                                                    <td>
                                                        <!-- button trigger modal -->
                                                        <?php if ($ad['status'] == 'selesai') : ?>

                                                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#selesai<?= $ad['id_pengaduan'] ?>">
                                                                Selesai
                                                            </button>

                                                        <?php elseif ($ad['status'] == 'proses') : ?>
                                                            <a button type="button" class="btn btn-warning" href="<?= base_url('C_View/Aproses/') . $ad['id_pengaduan'] ?>">
                                                                Proses
                                                            </a>

                                                        <?php else : ?>
                                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#balas<?= $ad['id_pengaduan'] ?>">
                                                                Tindakan
                                                            </button>
                                                        <?php endif ?>
                                                    </td>
                                                </tr>
                                                <?php $i++; ?>

                                                <!-- modal #balas -->
                                                <div class="modal fade" id="balas<?= $ad['id_pengaduan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tindakan</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="POST" action="<?= base_url('C_petugas/laporan_up/') . $ad['id_pengaduan'] ?>">
                                                                    <fieldset disabled>
                                                                        <div class="row">
                                                                            <div class="mb-3 col-md-6">
                                                                                <label for="disabledTextInput" class="form-label">Pelapor</label>
                                                                                <input type="text" id="pelapor" name="pelapor" class="form-control" value="<?= $ad['name'] ?>" placeholder="Disabled input">
                                                                            </div>
                                                                            <div class="mb-3 col-md-6">
                                                                                <label for="disabledSelect" class="form-label">Tanggal</label>
                                                                                <input type="text" id="tanggal" name="tanggal" class="form-control" value="<?= $ad['tgl'] ?>" placeholder="Disabled input">
                                                                            </div>
                                                                            <div class="mb-3 col-md-6">
                                                                                <label for="disabledSelect" class="form-label">Kategori</label>
                                                                                <input type="text" id="kategori" name="kategori" class="form-control" value="<?= $ad['kategori_nama'] ?>" placeholder="Disabled input">
                                                                            </div>
                                                                            <div class="mb-3 col-md-6">
                                                                                <label for="disabledSelect" class="form-label">Subkategori</label>
                                                                                <input type="text" id="subkategori" name="subkategori" class="form-control" value="<?= $ad['subkategori_nama'] ?>" placeholder="Disabled input">
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="disabledSelect" class="form-label">Isi Laporan</label>
                                                                            <input type="text" id="isi" name="isi" class="form-control" value="<?= $ad['laporan'] ?>" placeholder="Disabled input">
                                                                        </div>
                                                                    </fieldset>
                                                                    <div class="mb-3">
                                                                        <label for="">Status</label>
                                                                        <select class="form-select" id="status" name="status" aria-label="Default select example">
                                                                            <option selected>Pilih salah satu</option>
                                                                            <option value="proses">Proses</option>
                                                                            <option value="selesai">Selesai</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label label for="exampleInputEmail1" class="form-label">
                                                                            Komentar
                                                                        </label>
                                                                        <textarea class="form-control" id="tanggapan" name="tanggapan"></textarea>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                                        <button type="submit" class="btn btn-primary">Simpan perubahan</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- modal end -->
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- To top button -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Logout?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pastikan anda sudah check ulang setiap data sebelum anda logout!</div>
                <div class="modal-footer">
                    <button class="btn btn-dark" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="<?= base_url('c_admin/logout') ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- modal tambah -->

    <div class="modal fade" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('c_Amasyarakat/tambahmasyarakat') ?>" method="post">
                        <div class="form-outline form-white mb-3">
                            <input name="name" type="text" class="form-control" placeholder="Nama">
                        </div>

                        <div class="form-outline form-white mb-3">
                            <input name="nik" type="text" class="form-control" placeholder="Nik">
                        </div>

                        <div class="form-outline form-white mb-3">
                            <input name="username" type="text" class="form-control" placeholder="Username">
                        </div>

                        <div class="form-outline form-white mb-3">
                            <input name="password" type="password" class="form-control" placeholder="Password">
                        </div>

                        <div class="form-outline form-white mb-3">
                            <input name="telp" type="number" class="form-control" placeholder="Telepon">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                    <button class="btn btn-danger" type="submit">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- modal end -->



    <!-- Script JS -->
    <script src="<?= base_url() ?>assets/templates/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/templates/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/templates/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?= base_url() ?>assets/templates/js/sb-admin-2.min.js"></script>
    <script src="<?= base_url() ?>assets/templates/vendor/chart.js/Chart.min.js"></script>
    <script src="<?= base_url() ?>assets/templates/js/demo/chart-area-demo.js"></script>
    <script src="<?= base_url() ?>assets/templates/js/demo/chart-pie-demo.js"></script>
    <script src="<?= base_url() ?>assets/templates/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/templates/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>assets/templates/js/demo/datatables-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>


</body>

</html>