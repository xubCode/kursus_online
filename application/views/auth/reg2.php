
<div class="register-box">
  <div class="register-logo">
    <a href="#"><img src="<?= base_url('assets/img/ikbal2.png'); ?>" style="height: 53px; width: 180px;"></a>
  </div>
    <?= $this->session->flashdata('message'); ?>
  <div class="register-box-body">
    <form action="<?= base_url('auth/instruktur'); ?>" method="post">
      <div class="form-group has-feedback">
        <input name="nama" id="nama" type="text" class="form-control" placeholder="Nama Lengkap" autofocus value="<?= set_value('nama'); ?>" autocomplete="off">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <?= form_error('nama','<b class="text-danger" style="padding-left: 8px;">','</b>'); ?>
      </div>
      <div class="form-group has-feedback">
        <input name="username" id="username" type="text" class="form-control" placeholder="Username" autofocus value="<?= set_value('username'); ?>" autocomplete="off">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <?= form_error('username','<b class="text-danger" style="padding-left: 8px;">','</b>'); ?>
      </div>
      <div class="form-group has-feedback">
        <input name="email" id="email" type="email" class="form-control" placeholder="Email" autofocus value="<?= set_value('email'); ?>" autocomplete="off">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <?= form_error('nama','<b class="text-danger" style="padding-left: 8px;">','</b>'); ?>
      </div>
      <div class="form-group has-feedback">
        <input name="pw" id="pw" type="password" class="form-control" placeholder="Kata Sandi">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <?= form_error('pw','<b class="text-danger" style="padding-left: 8px;">','</b>'); ?>
      </div>
      <div class="form-group has-feedback">
        <input name="pw2" id="pw2" type="password" class="form-control" placeholder="Ulangi Kata Sandi">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        <?= form_error('pw2','<b class="text-danger" style="padding-left: 8px;">','</b>'); ?>
      </div>
      <div class="row">
        <div class="col-md-4 offset-4">
          <button type="submit" class="btn btn-primary btn-block">Masuk</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <p class="text-center" style="margin-top: 5px;">
        Sudah punya akun?<a href="<?= base_url('auth'); ?>">Login</a>
    </p>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->


