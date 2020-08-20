
<div class="register-box">
  <div class="register-logo">
    <a href="#"><img src="<?= base_url('assets/img/ikbal2.png'); ?>" style="height: 53px; width: 180px;"></a>
  </div>
    <?= $this->session->flashdata('message'); ?>
  <div class="register-box-body">
    <form action="<?= base_url('auth'); ?>" method="post">
      <div class="form-group has-feedback">
        <input name="email" id="email" type="text" class="form-control" placeholder="Email" autofocus value="<?= set_value('email'); ?>" autocomplete="on">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <?= form_error('email','<b class="text-danger" style="padding-left: 8px;">','</b>'); ?>
      </div>
      <div class="form-group has-feedback">
        <input name="pw" id="pw" type="password" class="form-control" placeholder="Kata Sandi">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <?= form_error('pw','<b class="text-danger" style="padding-left: 8px;">','</b>'); ?>
      </div>
      <div class="row">
        <div class="col-md-4 offset-4">
          <button type="submit" class="btn btn-primary btn-block">Masuk</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <p class="text-center" style="margin-top: 5px;">
        Belum terdaftar?<a href="<?= base_url('auth/register'); ?>">Register</a>
    </p>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->


