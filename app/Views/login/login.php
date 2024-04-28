<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    .form-control {
  border-radius: 50px; /* Ubah nilai sesuai dengan keinginan Anda */
}
  </style>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Mondial - Login</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url() ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url() ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block">
                <div class="text-center">
                  
                  <img src="<?= base_url('image/login/bg-mondial.jpeg') ?>" width="105%" class="mt-3 mb-3">
                  
                </div>
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h2 text-gray-900 mb-4 font-weight-bold">Selamat Datang</h1>
                  </div>
                  <div class="">
                                        <?php if (session()->getFlashdata('errors')): ?>
                                            <div class="alert alert-danger" role="alert">
                                                <?= session()->getFlashdata('errors'); ?>
                                            </div>
                                        <?php endif; ?>

                                        <?php if (session()->getFlashdata('pesanlogin')): ?>
                                            <div class="alert alert-danger" role="alert">
                                                <?= session()->getFlashdata('pesanlogin'); ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (session()->getFlashdata('pesanlogout')): ?>
                                            <div class="alert alert-success" role="alert">
                                                <?= session()->getFlashdata('pesanlogout'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                
                  <?php echo form_open('/login2', array('class'=>'user', 'id' => 'formLogin')); ?>
                    
                      <div class="form-group">
                        <h1 class="h6 text-gray-900 mb-10">Nama Pengguna</h1>
                        <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Nama Pengguna">
                      </div>
                      <h1 class="h6 text-gray-900 mb-10">Kata Sandi</h1>
                      <div class="form-group">
                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Kata Sandi" >
                      </div>
                      <div class="form-group">
                        <div class="custom-control custom-checkbox small">
                          <input type="checkbox" class="custom-control-input" id="customCheck">
                          <label class="custom-control-label" for="customCheck">Ingat Saya</label>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary btn-user btn-block">
                        Masuk
                      </button>
                    
                  <?php echo form_close(); ?>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="<?= base_url('/forgot') ?>">Lupa sandi ?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="<?= base_url('/register') ?>">Buat Akun</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="<?= base_url() ?>">Kembali</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url() ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url() ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url() ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url() ?>js/sb-admin-2.min.js"></script>
  <script src="<?= base_url() ?>js/sweetalert.min.js"></script>
  

</body>

</html>
