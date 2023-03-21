<?php

use phpseclib3\Crypt\EC\BaseCurves\Base;
?>
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
                <a class="nav-link" href="<?= base_url('C_admindash') ?>">
                    <i class="fas fa-fw fa-tachometer-alt text-danger"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Master Data
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('c_Apetugas') ?>">
                    <i class="fas fa-user text-danger"></i>
                    <span>Petugas</span></a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('c_Amasyarakat') ?>">
                    <i class="fas fa-user text-danger"></i>
                    <span>Masyarakat</span></a>
            </li>

            <!-- Kategori -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('c_akate') ?>">
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
                <a class="nav-link" href="<?= base_url('c_aadu') ?>">
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
                <nav class="navbar navbar-expand navbar-dark bg-dark topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="text-white"><?= $this->session->userdata('a_username') ?></span>
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
                        <h1 class="mb-0 text-dark">Kategori</h1>
                    </div>

                    <!-- Card Laporan progress selesai -->
                    <div class="card-content">
                        <div class="card shadow mb-4 col-md-12 mr-5">
                            <div class="card-header bg-dark py-3">
                                <h6 class="m-0 font-weight-bold text-white">kategori</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Kategori</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($kategori as $k) : ?>
                                                <tr>
                                                    <td scope="row"><?= $i ?></td>
                                                    <td><?= $k['kategori_nama'] ?></td>
                                                    <td><button type="button" class="btn btn-light" data-toggle="modal" data-target="#modaledit<?= $k['kategori_id'] ?>">
                                                            <i class="fas fa-edit text-dark" aria-hidden="true"></i>
                                                        </button>
                                                        <a href="<?= base_url('c_akate/delete_kat/' . $k['kategori_id']) ?>"><button class="btn btn-light"><i class="fa fa-trash" aria-hidden="true"></i></button></a>
                                                    </td>
                                                </tr>
                                                <?php $i++; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modaltambah"> tambah</button>
                            </div>
                        </div>

                        <!-- sub kategori table -->
                        <div class="card shadow mb-4 col-md-12">
                            <div class="card-header bg-dark py-3">
                                <h6 class="m-0 font-weight-bold text-white">SubKategori</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>kategori</th>
                                                <th>Subkategori</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($joinSubKategori as $sk) : ?>
                                                <tr>
                                                    <td scope="row"><?= $i ?></td>
                                                    <td><?= $sk['kategori_nama'] ?></td>
                                                    <td><?= $sk['subkategori_nama'] ?></td>
                                                    <td><button type="button" class="btn btn-light" data-toggle="modal" data-target="#modaledit<?= $k['kategori_id'] ?>">
                                                            <i class="fas fa-edit text-dark" aria-hidden="true"></i>
                                                        </button>
                                                        <a href="<?= base_url('c_akate/delete_subkat/' . $sk['subkategori_id']) ?>"><button class="btn btn-light"><i class="fa fa-trash" aria-hidden="true"></i></button></a>
                                                    </td>
                                                </tr>
                                                <?php $i++; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalsubtambah"> tambah</button>
                            </div>
                        </div>
                    </div>
                </div>



                <!-- end card -->
            </div>

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
                    <form action="<?= base_url('c_akate/tambahkat') ?>" method="post">
                        <div class="form-outline form-white mb-3">
                            <input name="kategori_nama" type="text" class="form-control" placeholder="Kategori">
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


    <!-- modaltambah sub -->
    <div class="modal fade" id="modalsubtambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('c_akate/tambahsubkat') ?>" method="post">
                        <select name="kategori" id="kategori" type="text" class="form-control form-control-user">
                            <option selected value="">-- Pilih --</option>
                            <?php foreach ($kategori as $k) : ?>
                                <option value="<?= $k['kategori_id'] ?>"><?= $k['kategori_nama'] ?></option>
                            <?php endforeach ?>

                        </select>
                </div>
                <div class="modal-body mt-0">
                    <div class="form-outline form-white mb-3">
                        <input name="subkategori_nama" type="text" class="form-control" placeholder="SubKategori">
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

</body>

</html>