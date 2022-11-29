<?= $this->extend('layouts/geral'); ?>
<?= $this->section('secao1'); ?>
<div class="login-box">
    <div class="login-logo">
        <img src="<?= base_url('assets/img/logo-sys.png') ?>" width="width" height="auto" alt="alt"/>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body shadow rounded bg-light">
            <h4 class="text-center mb-2">Login</h4>
            <p></p>
            <form action="<?= site_url('login/login')?>" method="post">
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="senha" class="form-control" placeholder="Senha" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Mantenha-me conectado
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Entrar</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <div class="social-auth-links text-center mb-3">
                <br>
                <div class="mt-2" id="g_id_onload"
                     data-client_id="YOUR_GOOGLE_CLIENT_ID"
                     data-login_uri="https://your.domain/your_login_endpoint"
                     data-auto_prompt="false">
                </div>
                <div class="g_id_signin"
                     data-type="standard"
                     data-size="large"
                     data-theme="outline"
                     data-text="sign_in_with"
                     data-shape="rectangular"
                     data-logo_alignment="left">
                </div>
            </div>
            <!-- /.social-auth-links -->

            <p class="mb-1">
                <a href="<?= site_url('recuperacao') ?>">Esqueci minha senha</a>
            </p>
            <p class="mb-0">
                <a href="<?= site_url('registro') ?>" class="text-center">Ainda não sou cadastrado</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->
<?= $this->endSection(); ?>