<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<main id="main">

    <?= $this->include('layout/breadcrumbs'); ?>
    <section id="create" class="create">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <div class="row mb-3">
                        <h2><strong>Form Tambah Klub</strong></h2>
                    </div>
                    <div class="row">
                        <form action="<?= base_url('admin/klub/save') ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="row mb-3">
                                <!-- judul -->
                                <label for="judul" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10 mb-3">
                                    <input type="text" class="form-control" id="judul" name="judul" value="" autofocus>
                                    <div class="invalid-feedback">

                                    </div>
                                </div>
                            </div>
                            <!-- sampul -->
                            <div class="row mb-3">
                                <label for="sampul" class="col-sm-2 col-form-label">Logo</label>
                                <div class="col-sm-10 mb-3">
                                    <input type="file" class="form-control" id="sampul" name="sampul" accept="image/*">
                                    <div class="invalid-feedback">

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