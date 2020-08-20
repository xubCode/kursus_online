        <script>
          function ambilData($id, $created_at) {            
            $("#created_at").val($created_at);
            $(".tes").attr('href', 'http://localhost/BeLon/admin/delete/' + $id);
            // $(".tes").attr('class', 'btn btn-sm btn-success');
          }
        </script>
        <div class="main-panel">
          <div class="content-wrapper">            
              <div class="col">
                <?= $this->session->flashdata('message'); ?>
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Daftar User</h4>
                    <p class="card-description">Scroll ke bawah untuk mengelola data user</p>
                    <table class="table table-hover" id="example1">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>User</th>
                          <th>Email</th>
                          <th>Status</th>
                          <th>Login Terakhir</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 1;foreach ($user as $row) : ?>
                          <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $row['username']; ?></td>
                            <td><?= $row['email']; ?></td>
                            <td><?= $row['roleName']; ?></td>
                            <?php if($row['last_login'] == '') : ?>
                              <td class="text-danger">User ini belum login</td>
                            <?php else : ?>
                              <td><?= $row['last_login']; ?></td>
                            <?php endif; ?>
                            <td>
                              <a onclick="ambilData(
                                  '<?= $row['id']; ?>',
                                  '<?= $row['created_at']; ?>'
                              )" class="badge badge-info" href="#" data-toggle="modal" data-target="#detailUser">Kapan dibuat?</a>
                              <!-- <a class="badge badge-info">Hapus</a> -->
                            </td>
                          </tr>                      
                        <?php endforeach; ?>  
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="modal fade" id="detailUser" tabindex="-1" role="dialog" aria-labelledby="detailUser" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="detailUser">Data User</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <input type="hidden" name="id" id="id">
                      <input type="text" name="created_at" id="created_at" class="form-control-lg" readonly>  
                      </div>
                    <div class="modal-footer">
                      <button class="btn btn-warning btn-sm" type="button" data-dismiss="modal">Cancel</button>
                      <a class="btn btn-sm btn-danger tes" id="id" href="#">Hapus</a>                    
                    </div>
                  </div>
                </div>
              </div>  