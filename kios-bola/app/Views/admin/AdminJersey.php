<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
        <div class="container">
            <h2 class="">Admin Editor</h2>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <section id="admin" class="admin">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col my-5">
                    <h2 class="my-5">
                        Daftar Jersey
                    </h2>
                    <div class="btn btn-primary mb-3">Tambah Jersey</div>
                    <table class="table">

                        <thead class="table-light">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Sampul</th>
                                <th scope="col">Apparel</th>
                                <th scope="col">Club_ID</th>
                                <th scope="col">judul</th>
                                <th scope="col">Tersedia</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?= $i = 1; ?>
                            <?php foreach ($Jersey as $j) : ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><img src="/asset/img/<?= $j['sampul']; ?>" alt="" class="sampul"></td>
                                    <td><?= $j['apparel']; ?></td>
                                    <td><?= $j['id_klub']; ?></td>
                                    <td><?= $j['judul']; ?></td>
                                    <td><?= $j['ketersediaan']; ?></td>
                                    <td> Rp <?= $j['harga']; ?></td>
                                    <td>
                                        <div class="row">
                                            <div class="col">
                                                <a href="" class="btn btn-danger">delete</a>
                                                <a href="" class="btn btn-success">update</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                        </tbody>
                    <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= jersey Section ======= -->


</main><!-- End #main -->

<?= $this->endsection(); ?>
<?= $this->extend('layout/template'); ?>