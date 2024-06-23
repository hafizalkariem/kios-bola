<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<main id="main">

    <?= $this->include('layout/breadcrumbs'); ?>
    <section id="admin" class="admin">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-12 my-3">
                    <h2 class="my-5">
                        Daftar Apparel
                    </h2>
                    <form action="" method="get" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" name="keyword" value="<?= $keyword; ?>" />
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit" name="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <div class="d-flex justify-content-start my-3">
                        <a href="apparel/create" class="btn btn-primary">Tambah Apparel</a>
                    </div>

                    <table class="table table-hover">

                        <thead class="table-light text-center">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">ID</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Sampul</th>
                                <th scope="col">Opsi</th>

                            </tr>
                        </thead>
                        <tbody class="text-center">

                            <?php $i = 1 + (5 * ($current_page - 1));
                            foreach ($Apparel as $a) : ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?= $a['id']; ?></td>
                                    <td><?= $a['nama']; ?></td>
                                    <td><?= $a['slug']; ?></td>
                                    <td><img src="/asset/img/apparel/<?= $a['sampul']; ?>" alt="<?= $a['nama']; ?>" class="sampul"></td>
                                    <td>
                                        <div class="row">
                                            <div class="d-flex justify-content-center gap-3 align-items-center">
                                                <a href="/admin/apparel/edit/<?= $a['slug']; ?>"><i class="fa-solid fa-pen-to-square fa-xl" style="color: #358754;"></i></a>

                                                <form action="/admin/apparel/<?= $a['id']; ?>" method="post" class="d-inline">
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
                    <?= $pager->links('apparel', 'pagination') ?>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= jersey Section ======= -->


</main><!-- End #main -->

<?= $this->endsection(); ?>
<?= $this->extend('layout/template'); ?>