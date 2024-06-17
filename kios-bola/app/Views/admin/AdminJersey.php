<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<main id="main">

    <?= $this->include('layout/breadcrumbs'); ?>
    <section id="admin" class="admin">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-12 my-3">
                    <h2 class="my-5">
                        Daftar Jersey
                    </h2>
                    <div class="d-flex justify-content-start my-3">
                        <a href="jersey/create" class="btn btn-outline-primary">Tambah Jersey</a>
                    </div>
                    <?php if (session()->getFlashdata('pesan')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('pesan'); ?>
                        </div>
                    <?php endif; ?>

                    <table class="table table-hover">

                        <thead class="table-light text-center">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Sampul</th>
                                <th scope="col">Apparel</th>
                                <th scope="col">ID</th>
                                <th scope="col">Club_ID</th>
                                <th scope="col">judul</th>
                                <th scope="col">slug</th>
                                <th scope="col">Tersedia</th>
                                <th scope="col">Harga</th>
                                <th scope="col">created_at</th>
                                <th scope="col">Opsi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php $i = 1;
                            foreach ($Jersey as $j) : ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><img src="/asset/img/jersey/<?= $j['sampul']; ?>" alt="<?= $j['judul']; ?>" class="sampul"></td>
                                    <td><img src="/asset/img/apparel/<?= $j['apparel']; ?>" alt="<?= $j['judul']; ?>" class="sampul"></td>
                                    <td><?= $j['id']; ?></td>
                                    <td><?= $j['id_klub']; ?></td>
                                    <td><?= $j['judul']; ?></td>
                                    <td><?= $j['slug']; ?></td>
                                    <td><?= $j['ketersediaan']; ?></td>
                                    <td> Rp <strong><?= $j['harga']; ?></strong></td>
                                    <td><?= $j['created_at']; ?></td>
                                    <td>
                                        <div class="row">
                                            <div class="d-flex justify-content-center gap-3 align-items-center">
                                                <a href=""><i class="fa-solid fa-pen-to-square fa-xl" style="color: #358754;"></i></a>

                                                <form action="/admin/jersey/<?= $j['id']; ?>" method="post" class="d-inline">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn" onclick="return confirm('apakah anda yakin ingin menghapusnya ?');"><i class="fa-solid fa-trash fa-xl" style="color: #ff0000;"></i></button>
                                                </form>


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