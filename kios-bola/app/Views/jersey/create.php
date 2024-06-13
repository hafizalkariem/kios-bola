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
                        <?= csrf_field(); ?>
                        <form action="<?= base_url('admin/jersey/save') ?>" method="post">
                            <div class="row mb-3">
                                <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="judul" name="judul" autofocus required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="klub" class="col-sm-2 col-form-label">Klub</label>
                                <div class="col-sm-10">
                                    <select class="form-select" id="klub" name="klub" required>
                                        <option value="selected">pilih klub</option>
                                        <?php foreach ($Klub as $k) : ?>
                                            <option value="<?= $k['id_klub']; ?>"><?= $k['nama']; ?></option>
                                            <!-- Tambahkan opsi klub lainnya sesuai kebutuhan -->
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="harga" name="harga" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="ketersediaan" class="col-sm-2 col-form-label">Tersedia</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="ketersediaan" name="ketersediaan" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" id="sampul" name="sampul" accept="image/*" required>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <?= $this->endsection(); ?>
    <?= $this->extend('layout/template'); ?>