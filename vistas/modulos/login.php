<div class="login-box">

  <div class="login-logo">
    <img src="vistas/img/logo.jpeg" class="img-responsive" style="padding: 30px 50px 0px 50px">
  </div>

  <div class="login-box-body">

    <form method="post">

      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Usuario" name="usuario" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Contraseña" name="password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="row">
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
        </div>
      </div>
      <?php 
        $login = new ControladorUsuarios();
        $login -> ctrIngresoUsuario();

       ?>
    </form>

  </div>
</div>