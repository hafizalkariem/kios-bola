<?php

use PhpParser\Node\Stmt\Echo_;
?>
<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<main id="main">

    <?= $this->include('layout/breadcrumbs'); ?>
    <section id="create" class="create">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <div class="row mb-3">
                        <h2><strong>Form Edit Klub</strong></h2>
                    </div>
                    <div class="row">
                        <?php $session = \Config\Services::session(); ?>
                        <?php if (isset($validation)) : ?>
                            <div class="text-danger">
                                <?= $validation->listErrors() ?>
                            </div>
                        <?php endif; ?>

                        <form action="/admin/klub/update/<?= $klub['id_klub']; ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="row mb-3">
                                <!-- judul -->
                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10 mb-3">
                                    <input type="text" class="form-control <?= ($validation->hasError('nama')) ? ' is-invalid' : ''; ?>" id="nama" name="nama" value="<?= $klub['nama']; ?>" autofocus>
                                </div>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama'); ?>
                                </div>
                            </div>
                            <!-- sampul -->
                            <div class="row mb-3">
                                <label for="logo" class="col-sm-2 col-form-label">Logo</label>
                                <div class="col-sm-10 mb-3">
                                    <input type="file" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="logo" name="logo" value="<?= $klub['logo']; ?>" accept="image/*">
                                </div>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('logo'); ?>
                                </div>
                            </div>

                            <!-- Tombol submit -->
                            <div class="row mb-3">
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?= $this->endSection(); ?>