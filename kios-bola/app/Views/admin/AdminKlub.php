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
                        <a href="/admin/klub/create" class="btn btn-outline-primary">Tambah Klub</a>
                    </div>

                    <?php if (session()->getFlashdata('pesan')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('pesan'); ?>
                        </div>
                    <?php endif; ?>

                    <table class="table table-hover">

                        <thead class="table-light text-center">
                            <tr>
                                <th scope="col">N0</th>
                                <th scope="col">Logo</th>
                                <th scope="col">ID</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Slug</th>
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
                                    <td><?= $k['slug']; ?></td>
                                    <td>
                                        <div class="row">
                                            <div class="d-flex justify-content-center gap-3 align-items-center">
                                                <a href="/admin/klub/edit/<?= $k['slug']; ?>"><i class="fa-solid fa-pen-to-square fa-xl" style="color: #358754;"></i></a>

                                                <form action="/admin/klub/<?= $k['id_klub']; ?>" method="post" class="d-inline">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn" onclick="return confirm('apakah anda yakin ingin menghapusnya ?');"><i class="fa-solid fa-trash fa-xl" style="color: #ff0000;"></i></button>
                                                </form>


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