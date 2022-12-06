<?= $this->extend('layouts/geral'); ?>
<?= $this->section('secao1'); ?>
<div class="login-box">
    <!-- /.login-logo -->

    <?php if (session()->has('error')): ?>
        <span class="text text-danger"><?= session()->getFlashdata('error') ?></span>
    <?php endif; ?>
    <?php if (session()->has('error')): ?>
        <span class="text text-success"><?= session()->getFlashdata('success') ?></span>
    <?php endif; ?>

    <div class="card">
        <div class="card-body register-card-body shadow bg-light rounded">
            <h4 class="login-box-msg">Cadastre-se</h4>
            <form action="<?= site_url('registro/salvar') ?>" method="post" class="mb-3">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Nome" name="nome">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email" name="email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Senha" name="senha">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Confirme a senha" name="confirma_senha">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                            <label for="agreeTerms">
                                Eu aceito os termos <a href="#">termos</a>
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
    
            

            <a href="<?= site_url('login') ?>" class="text-center btn btn-light text-info">Já sou membro</a>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.login-box -->
<?= $this->endSection(); ?>