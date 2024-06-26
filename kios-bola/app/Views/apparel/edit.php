<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<main id="main">

    <?= $this->include('layout/breadcrumbs'); ?>
    <section id="edit" class="edit">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <div class="row mb-3">
                        <h2><strong>Form Edit Apparel</strong></h2>
                    </div>
                    <div class="row">
                        <?php if (session()->getFlashdata('pesan')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= session()->getFlashdata('pesan'); ?>
                            </div>
                        <?php endif; ?>
                        <?php if (isset($validation)) : ?>
                            <div class="text-danger">
                                <?= $validation->listErrors() ?>
                            </div>
                        <?php endif; ?>

                        <form action="/admin/apparel/update/<?= $apparel['id']; ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="sampul_lama" value="<?= $apparel['sampul']; ?>">
                            <div class="row mb-3">
                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10 mb-3">
                                    <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= (old('nama')) ? old('nama') : $apparel['nama']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
                                <div class="col-sm-10 mb-3">
                                    <input type="file" class="form-control <?= ($validation->hasError('sampul')) ? 'is-invalid' : ''; ?>" id="sampul" name="sampul" accept="image/*">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('sampul'); ?>
                                    </div>
                                </div>
                            </div>

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