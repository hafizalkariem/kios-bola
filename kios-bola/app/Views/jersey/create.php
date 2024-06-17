<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<main id="main">

    <?= $this->include('layout/breadcrumbs'); ?>
    <section id="create" class="create">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <div class="row mb-3">
                        <h2><strong>Form Tambah Jersey</strong></h2>
                    </div>
                    <div class="row">
                        <?php $validation = \Config\Services::validation(); ?>
                        <form action="<?= base_url('admin/jersey/save') ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="row mb-3">
                                <!-- judul -->
                                <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                                <div class="col-sm-10 mb-3">
                                    <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" id="judul" name="judul" value="<?= old('judul'); ?>" autofocus>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('judul'); ?>
                                    </div>
                                </div>
                            </div>

                            <!-- klub -->
                            <div class="row mb-3">
                                <label for="id_klub" class="col-sm-2 col-form-label">Klub</label>
                                <div class="col-sm-10 mb-3">
                                    <select class="form-select <?= ($validation->hasError('id_klub')) ? 'is-invalid' : ''; ?>" id="id_klub" name="id_klub">
                                        <option value="" disabled selected>Pilih klub</option>
                                        <?php foreach ($Klub as $k) : ?>
                                            <option value="<?= $k['id_klub']; ?>" <?= old('id_klub') == $k['id_klub'] ? 'selected' : ''; ?>><?= $k['nama']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('id_klub'); ?>
                                    </div>
                                </div>
                            </div>

                            <!-- apparel -->
                            <div class="row mb-3">
                                <label for="apparel_sampul" class="col-sm-2 col-form-label">Apparel</label>
                                <div class="col-sm-10 mb-3">
                                    <select class="form-select <?= $validation->hasError('apparel_sampul') ? 'is-invalid' : ''; ?>" id="apparel_sampul" name="apparel_sampul">
                                        <option value="" disabled selected>Pilih apparel</option>
                                        <?php foreach ($Apparel as $a) : ?>
                                            <option value="<?= $a['sampul']; ?>" <?= old('apparel_sampul') == $a['sampul'] ? 'selected' : ''; ?>><?= $a['nama']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('apparel_sampul'); ?>
                                    </div>
                                </div>
                            </div>

                            <!-- harga -->
                            <div class="row mb-3">
                                <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                                <div class="col-sm-10 mb-3">
                                    <input type="number" class="form-control <?= $validation->hasError('harga') ? 'is-invalid' : ''; ?>" id="harga" name="harga" value="<?= old('harga'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('harga'); ?>
                                    </div>
                                </div>
                            </div>

                            <!-- ketersediaan -->
                            <div class="row mb-3">
                                <label for="ketersediaan" class="col-sm-2 col-form-label">Tersedia</label>
                                <div class="col-sm-10 mb-3">
                                    <input type="number" class="form-control <?= $validation->hasError('ketersediaan') ? 'is-invalid' : ''; ?>" id="ketersediaan" name="ketersediaan" value="<?= old('ketersediaan'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('ketersediaan'); ?>
                                    </div>
                                </div>
                            </div>

                            <!-- sampul -->
                            <div class="row mb-3">
                                <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
                                <div class="col-sm-10 mb-3">
                                    <input type="file" class="form-control <?= $validation->hasError('sampul') ? 'is-invalid' : ''; ?>" id="sampul" name="sampul" accept="image/*">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('sampul'); ?>
                                    </div>
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