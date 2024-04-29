<!DOCTYPE html>
<html lang="en">

<head>
<style>
    .card-body {
        display: flex;   
    }
    .foto {
        width: 30%;
    }
    /* .foto img {
        width: 100%;
    } */
    .content {
        width: 70%;
        font-size: 2vw;
    }

    .data {
        float: right;
    }
    .foto {
        background-color: #fff;
        color: #fff;
        display: inline-block;
        margin: 8px;
        max-width: 320px;
        min-width: 240px;
        overflow: hidden;
        position: relative;
        text-align: center;
        width: 100%;
    }
    .foto * {
        box-sizing: border-box;
        transition: all 0.45s ease;
    }
    .foto:before, .foto:after {
        background-color: rgba(0, 0, 0, 0.5);
        border-top: 32px solid rgba(0,0,0,0.5);
        border-bottom: 32px solid rgba(0,0,0,0.5);
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        content: '';
        transition: all 0.3s ease;
        z-index: 1;
        opacity: 0;
        transform: scaleY(2);
    }
    .foto img {
        vertical-align: top;
        max-width: 100%;
        backface-visibility: hidden;
    }
    .foto .button {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        align-items: center;
        z-index: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
        line-height: 1.1em;
        opacity: 0;
        z-index: 2;
        transition-delay: 0.1s;
        font-size: 24px;
        font-weight:400;
        letter-spacing: 1px;
        text-transform: uppercase;
    }
    .foto:hover:before, .foto:hover:after {
        transform: scale(1);
        opacity: 1;
    }
    .foto:hover > img {
        opacity: 0.7;
    }
    .foto:hover .button {
        opacity: 1;
    }
    .image {
        display: none;
    }
    .preview {
  			overflow: hidden;
  			width: 160px; 
  			height: 160px;
  			margin: 10px;
  			border: 1px solid red;
		}
    .modal-lg{
  			max-width: 1000px !important;
		}

    @media screen and (max-width:800px) {
        .card-body {
            display: block;
        }
        .foto {
            display: none;

        }
        .image {
            display: block;
            width: 100%;
        }
        .content {
            width: 100%;
            font-size: 3vw;
        }
        .reset_pass {
            font-size: 2vw;
        } 
        .reset_pass i {
            font-size: 2vw;
        }
        .form-control {
           font-size: 0.6rem
        }

        .modal-lg{
            max-width: 100% !important;
        }
    }
    
</style>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Remaja Id - Judul</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url() ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url() ?>css/sb-admin-2.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>css/dropzone.css" rel="stylesheet">
  <link href="<?= base_url() ?>css/cropper.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="<?= base_url() ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  
  <link href="<?= base_url() ?>vendor/venobox/venobox.css" rel="stylesheet">
  <script src="<?= base_url() ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url() ?>vendor/bootstrap-filestyle/bootstrap-filestyle.min.js"></script>
  <script src="<?= base_url() ?>js/sweetalert.min.js"></script>
  <link rel="stylesheet" href="<?= base_url() ?>vendor/select2/select2.min.css">
  <link href="<?= base_url() ?>vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>vendor/remixicon/remixicon.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?= $this->include('template/sidebar'); ?>

    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <?= $this->include('template/topbar'); ?>

            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <?= $this->renderSection('content'); ?>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy;Lala Rianti Laela Putri</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?= base_url('/logout') ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  
  <script src="<?= base_url() ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url() ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url() ?>js/sb-admin-2.min.js"></script>
  <script src="<?= base_url() ?>js/dropzone.js"></script>
  <script src="<?= base_url() ?>js/cropper.js"></script>
  

  <!-- Page level plugins -->
  <script src="<?= base_url() ?>vendor/chart.js/Chart.min.js"></script>
  <script src="<?= base_url() ?>vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url() ?>vendor/select2/select2.full.js"></script>
  <script src="<?= base_url() ?>vendor/venobox/venobox.min.js"></script>
  <script src="<?= base_url() ?>vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script>
function FormatResult(data) {
    markup = '<div>'+data.text+'</div>';
    return markup;
}

function FormatSelection(data) {
    return data.text;
}
</script>
</body>

</html>
