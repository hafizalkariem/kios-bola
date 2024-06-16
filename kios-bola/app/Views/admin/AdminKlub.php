<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <?= $this->include('layout/breadcrumbs'); ?>
    <!-- End Breadcrumbs -->

    <section id="admin" class="admin">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-12 my-3">
                    <h2 class="my-5">
                        Daftar Klub
                    </h2>
                    <div class="d-flex justify-content-start my-3">
                        <a href="/klub/create" class="btn btn-outline-primary">Tambah Klub</a>
                    </div>

                    <table class="table table-hover">

                        <thead class="table-light text-center">
                            <tr>
                                <th scope="col">N0</th>
                                <th scope="col">Logo</th>
                                <th scope="col">ID</th>
                                <th scope="col">Nama</th>
                                <th scope="col">opsi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">

                            <?php $i = 1;
                            foreach ($Klub as $k) : ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><img src="/asset/img/klub/<?= $k['logo']; ?>" alt="" class="sampul"></td>
                                    <td><?= $k['id_klub']; ?></td>
                                    <td><?= $k['nama']; ?></td>
                                    <td>
                                        <div class="row">
                                            <div class="d-flex justify-content-center gap-3">
                                                <a href="" class="btn btn-danger">delete</a>
                                                <a href="" class="btn btn-success">update</a>
                                            </div>
                                        </div>
                                    </td>
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