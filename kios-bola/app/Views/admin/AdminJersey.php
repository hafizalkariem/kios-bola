<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<main id="main">

    <?= $this->include('layout/breadcrumbs'); ?>
    <section id="admin" class="admin">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-12 my-3">
                    <h2 class="my-5">
                        Daftar Klub
                    </h2>
                    <div class="d-flex justify-content-start my-3">
                        <a href="jersey/create" class="btn btn-primary">Tambah Jersey</a>
                    </div>

                    <table class="table table-hover">

                        <thead class="table-light text-center">
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
                        <tbody class="text-center">
                            <?php $i = 1;
                            foreach ($Jersey as $j) : ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><img src="/asset/img/jersey/<?= $j['sampul']; ?>" alt="" class="sampul"></td>
                                    <td><?= $j['apparel']; ?></td>
                                    <td><?= $j['id_klub']; ?></td>
                                    <td><?= $j['judul']; ?></td>
                                    <td><?= $j['ketersediaan']; ?></td>
                                    <td> Rp <?= $j['harga']; ?></td>
                                    <td>
                                        <div class="row">
                                            <div class="d-flex justify-content-center gap-3">
                                                <a href="" class="btn btn-danger">delete</a>
                                                <a href="" class="btn btn-success">update</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </section>

    <!-- ======= jersey Section ======= -->


</main><!-- End #main -->

<?= $this->endsection(); ?>
<?= $this->extend('layout/template'); ?>