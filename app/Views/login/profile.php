<?= $this->extend('template/index'); ?>

<?= $this-> section('content'); ?>

       <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex">
              <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
            </div>
            <div class="card-body">
            
              <input type="hidden" name="sts" id="sts" value="status">
              <div class="foto">
                <!-- <form action="<?= base_url('Profile/editImage') ?>" ectype="multipart/form-data" style="display: none"> -->
                <div style="display: none">
                  <form method="post">
                    <input type="file" name="foto" id="foto">
                    <input type="submit" id="submit" name="submit">
                  </form>
                </div>
                <img src="<?php echo base_url('image/profile/profile.png') ?>" >
                <div class="button">
                    <button class="btn btn-circle btn-dark btn-lg" onclick="edit_image()"><i class="fa fa-pen"></i></button>
                    <button class="btn btn-circle btn-danger btn-lg" onclick="hapus_image()"><i class="fa fa-trash"></i></button>
                </div>
              </div>
              <!--a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#edit" aria-expanded="true" aria-controls="edit">
                <img class="foto" src="<?= base_url('image/profile/')?>" alt="">
                </a-->
                <div  style="position: absolute; right: 35px" id="edit" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <button class="btn btn-circle btn-success" onclick="edit_image()"><i class="fa fa-pen"></i></button>
                        <button class="btn btn-circle btn-danger" onclick="hapus_image()"><i class="fa fa-trash"></i></button>
                    </div>
                </div>

              <div class="content">
                <form method="post" action="<?= base_url('Profile/edit') ?>">
                  <div class="dropdown-divider"></div>
                  <div class="isi" onclick="edit('1')">
                      Nama Lengkap <span class="data" id="nama">nama</span>
                  </div>
                  <div class="dropdown-divider"></div>
                  <div class="isi" onclick="edit('2')">
                      Nama Pengguna <span class="data" id="username" >username</span>
                  </div>
                  <div class="dropdown-divider"></div>
                  <div class="isi" onclick="edit('3')">
                      Email <span class="data" id="email">email</span>
                  </div>
                  <div class="dropdown-divider"></div>
                  <div class="isi">
                      Type <span class="data">usertype</span>
                  </div-->
                  <div class="dropdown-divider"></div>
                  <span class="btn btn-primary btn-icon-split reset_pass" data-toggle="modal" data-target="#modalResetPassword">
                    <span class="icon text-white-50">
                      <i class="fas fa-key"></i>
                    </span>
                    <span class="text">Reset Password</span>
                   </span>
                </form>
              </div>
            </div>
          </div>

          
          </div>
    <!-- /.container-fluid -->
    
    <!-- Modal -->
<div class="modal fade" id="modalResetPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Reset Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formAll" class="form-row">
            <input type="hidden" name="id" id="id" value="">

          <div class="form-group col-md-12">
            <label for="passwordLama">Password Lama</label>
            <input type="password" class="form-control" id="passwordLama" name="passwordLama" placeholder="Masukkan Password Lama">
          </div>

          <div class="form-group col-md-6">
            <label for="passwordBaru">Password Baru</label>
            <input type="password" class="form-control" id="passwordBaru" name="passwordBaru" placeholder="Masukkan Password Baru">
          </div>

          <div class="form-group col-md-6">
            <label for="repeat_password">Ulangi Password</label>
            <input type="password" class="form-control" id="repeat_password" name="repeat_password" onkeyup="repeat(this.value)" placeholder="Ulangi Password">
            <div class="d-none" id="nb">
                <small class="text-danger text-sm">*Password belum sama</small>
            </div>
            <input type="hidden" name="sts_repeat" id="sts_repeat" value="0">
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btn" onclick="save()" disabled="">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Crop Image Before Upload</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="img-container">
                    <div class="row">
                        <div class="col-md-8">
                            <img src="" id="sample_image" style="width: 100%"/>
                        </div>
                        <div class="col-md-4">
                            <div class="preview"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="crop" class="btn btn-primary">Crop</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>			

<script type="text/javascript">
    $(document).ready(function() {
        if($("#sts").val() == 1) {
          alert();
        }

        var $modal = $('#modal');

        var foto = document.getElementById('sample_image');

        var cropper;

        $('#foto').change(function(event){
          var files = event.target.files;

          var done = function(url){
            foto.src = url;
            $modal.modal('show');
          };

          if(files && files.length > 0)
          {
            reader = new FileReader();
            reader.onload = function(event)
            {
              done(reader.result);
            };
            reader.readAsDataURL(files[0]);
          }
        });

        $modal.on('shown.bs.modal', function() {
          cropper = new Cropper(foto, {
            aspectRatio: 1,
            viewMode: 3,
            preview:'.preview'
          });
        }).on('hidden.bs.modal', function(){
          cropper.destroy();
            cropper = null;
        });

        $('#crop').click(function(){
          canvas = cropper.getCroppedCanvas({
            width:400,
            height:400
          });

          canvas.toBlob(function(blob){
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function(){
              var base64data = reader.result;
              $.ajax({
                url:'<?= base_url("Profile/editImage") ?>',
                method:'POST',
                data:{image:base64data},
                success:function(data)
                {
                  window.location.href = "<?= base_url('Profile/index') ?>"
                  // $modal.modal('hide');
                  // $('#uploaded_image').attr('src', data);
                }
              });
            };
          });
        });
    });
    function alert () {
      swal({
            title: 'Success',
            text: 'Data berhasil diupdate',
            icon: "success",
            button: "oke"
          }).then(function() {
            window.location.href = "<?= base_url('Profile/index') ?>";
          });
    }
    function edit(kolom=null) {
      var textbox = '';
      if(kolom == 1) {
        textbox = '<input type="text" class="form-control" id="inputNama" name="nama" value="nama">';
        $("#nama").html(textbox);
        $("#inputNama").focus();
      } else if(kolom == 2) {
        textbox = '<input type="text" class="form-control" id="inputUsername" name="username" value="username">';
        $("#username").html(textbox);
        $("#inputUsername").focus();
      } else if(kolom == 3) {
        textbox = '<input type="text" class="form-control" id="inputEmail" name="email" value="email">';
        $("#email").html(textbox);
        $("#inputEmail").focus();
      }
    }

    function ubah(kolom=null) {
      if(kolom == 1) {
        $("#nama").html('nama');
      }
    }

    function save() {
      $.ajax({
        url: "<?= base_url('Profile/editPassword') ?>",
        data: $("#formAll").serialize(),
        dataType: 'json',
        type: 'post'
      }).done(function(data) {
        if(data.status == 200) {
          swal({
            title: "Berhasil!",
            text: "Password berhasil diubah, silahkan login kembali",
            icon: "success",
            button: "oke",
          }).then((status)=>{
            window.location.href = "<?= base_url('login/logout') ?>";
          });
        } else if(data.status == 202) {
          swal("Warning", data.message, "warning");
          $("#passwordLama").val("");
        }
      }) 
    }

    function repeat(repeat) {
        var pass = $("#passwordBaru").val();
        if (pass == repeat) {
            $("#passwordBaru").removeClass('border-danger');
            $("#repeat_password").removeClass('border-danger');
            $("#passwordBaru").addClass('border-success');
            $("#repeat_password").addClass('border-success');
            $("#sts_repeat").val('1');
            $("#nb").addClass('d-none');
            $("#btn").prop("disabled", false);
        } else {
            $("#passwordBaru").addClass('border-danger');
            $("#repeat_password").addClass('border-danger');
            $("#sts_repeat").val('0');
            $("#nb").removeClass('d-none');
            $("#btn").prop("disabled", true);
        }
    }

    function hapus_image(){
      swal({
        title: "Anda yakin?",
        text: "Foto akan segera dihapus!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          $.ajax({
            url: "<?= base_url('Profile/hapus_image/') ?>",
            dataType: 'json',
          }).done(function(data) {
            if(data.status == 200) {
              swal({
                title: 'Berhasil',
                text: 'Foto telah dihapus',
                icon: 'success',
                button: 'oke'
              }).then((a)=>{
                window.location.href = '<?= base_url('profile/index') ?>';
              });
            } else {
              swal('Error', data.message, 'error');
            }
          });
        } else {
          swal("Foto Tidak jadi dihapus!");
        }
      });
    }

    function edit_image() {
      $("#foto").click();
    }

    function ok() {
      $("#submit").click();
    }

    
    
</script>

<?= $this-> endSection(); ?>