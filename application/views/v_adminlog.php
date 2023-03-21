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
            background-image: url("assets/img/bg3.png");
            background-color: #cccccc;
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
    
    <div class="background">
        <div class="container mt-5">
            <div class="d-flex justify-content-center align-items-center">
                <div class="col-12 col-md-8 col-lg-5 col-xl-6">
                    <div class="card bg-white text-dark" style="border-radius: 2rem;">
                        <div class="card-body p-4 text-center">
                            <div class="mb-md-3 mt-md-2">
                                <img style="border-radius: 10px; width: 100px; height: auto;" src="assets/img/3dlogo.png" class="card-img-top" alt="">
                                <div class="card-body">
                                    <h5 class="card-title mt-3 mb-3">Login Admin</h5>

                                    <?= $this->session->flashdata('massagedone'); ?>

                                    <form action="<?= base_url('c_admin/login') ?>" method="post">
                                        <div class="form-outline form-white mb-3">
                                            <input name="username" type="text" class="form-control" placeholder="Username">
                                        </div>
                                        <div class="form-outline form-white mb-3">
                                            <input name="password" type="password" class="form-control" placeholder="Password" aria-label="Password">
                                        </div>
                                        <button class="mt-4 py-1 btn btn-danger col-lg-12" type="submit">Login</button>
                                </div>
                                </form>
                            </div>
                            <div class="copyright text-center">
                                <span>Copyright &copy; Rafly XIIRPL 2023</span>
                            </div>
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