<?= $this->extend('layouts/geral'); ?>
<?= $this->section('secao1'); ?>
<div class="login-box">
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body shadow rounded bg-light">
            <h4 class="text-center mb-2">Recuperação de Senha</h4>
            <p></p>
            <form action="" method="post">
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Informe seu Email" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div><div class="row">
                    <div class="col-8 h5">
                        <a href="<?= site_url('login')?>"class="btn btn-light text-primary">Voltar</a>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Entrar</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->
<?= $this->endSection(); ?>