
<?= $this->extend('template/index'); ?>

<?= $this-> section('content'); ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
        <?php  if(session()->getFlashdata('pesan')): ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>
          

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex">
              <h6 class="m-0 font-weight-bold text-primary">Tabel User</h6>
              <a href="#" class="btn btn-primary btn-icon-split btn-sm ml-3" data-toggle="modal" data-target="#formModal">
                <span class="icon text-white-50"><i class="fas fa-plus"></i></span>
                <span class="text">Tambah data</span>
              </a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="table1" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th>User Type</th>
                      <th>Status</th>
                      <th>Foto</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php 
                     $no=1;
                     foreach($data_user as $user):
                    ?>
                    <tr>

                      <td><?= $no++; ?></td>
                      
                      <td><?= $user['nama']; ?></td>
                      <td><?= $user['username']; ?></td>
                      <td><?= $user['email']; ?></td>
                      <td><?= $user['user_type']; ?></td>
                      <td>
                          <?php if ($user['status_approve'] == 'Diterima'): ?>
                            <span class="btn btn-success btn-sm">Diterima</span>
                          <?php else: ?>
                            <span class="btn btn-danger btn-sm">Belum Diterima</span>
                          <?php endif; ?>

                      </td>
                      <td><img src="<?= base_url('image/profile/' . $user['foto']); ?>" alt="" style="width: 70px;"></td>
                      
                      <td>
                        <form action="hapusUser/<?= $user['id_user']; ?>" method="post" class="d-inline">
                          <?= csrf_field(); ?>
                          <input type="hidden" name="_method" value="DELETE">
                          <button type="submit" class="btn btn-circle btn-danger btn-sm"  onclick="return confirm('apakah anda yakin?');"><i class="fa fa-trash"></i></button>
                        </form>
                      </td>

                      
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          
          </div>
    <!-- /.container-fluid -->
    
    <!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form tambah data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php if (session()->getFlashdata('errors')): ?>
                            <div class="col alert alert-danger" role="alert">
                                <?= session()->getFlashdata('errors'); ?>
                            </div>
                        <?php endif; ?>
      <div class="modal-body">
        <form action="/simpanUser" method="post">
          <?= csrf_field() ?>
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama">
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email">
          </div>
          
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username">
          </div>

          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>

          <div class="form-group">
            <label for="usertype">User Type</label>
              <select class="form-select form-control" type="text" name="user_type" value="<?= old("user_type"); ?>">
                <!-- harus sesuai dengan urutan enum pada database -->
                <option selected>Pilih User Type</option>
                <option <?= old("user_type") == '1'? 'selected' : 'Admin' ?> value="1">Admin</option>
                <option <?= old("user_type") == '2'? 'selected' : 'Bendahara' ?> value="2">Bendahara</option>
                <option <?= old("user_type") == '3'? 'selected' : 'Petugas' ?> value="3">Petugas</option>
                <option <?= old("user_type") == '4'? 'selected' : 'Petugas Kelurahan' ?> value="4">Petugas Kelurahan</option>
                <option <?= old("user_type") == '5'? 'selected' : 'Anggota' ?> value="5">Anggota</option>
              </select>          
          </div>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" >Save changes</button>
        </form>
      </div>
      <!-- <div class="modal-footer">
        
      </div> -->
    </div>
  </div>
</div>

<?= $this-> endSection(); ?>