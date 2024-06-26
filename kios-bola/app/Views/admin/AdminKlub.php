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

                    <form action="" method="get" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input id="keyword" type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" name="keyword" value="<?= $keyword; ?>" />
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit" name="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
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
                                <th scope="col">No</th>
                                <th scope="col">Logo</th>
                                <th scope="col">ID</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Opsi</th>
                            </tr>
                        </thead>
                        <tbody id="result" class="text-center">
                            <?php if (!empty($Klub)) : ?>
                                <?php $i = 1 + (5 * ($current_page - 1)); ?>
                                <?php foreach ($Klub as $k) : ?>
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
                                                        <button type="submit" class="btn" onclick="return confirm('Apakah anda yakin ingin menghapusnya?');"><i class="fa-solid fa-trash fa-xl" style="color: #ff0000;"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="6">No results found</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <?= $pager->links('klub', 'pagination') ?>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#keyword').on('keyup', function() {
            let keyword = $(this).val();

            if (keyword === '') {
                keyword = '';
                window.location.href = '<?= base_url('/admin/klub'); ?>'; // Ganti dengan URL Anda
                return;
            }

            $.ajax({
                url: '<?= base_url('/admin/klub/search'); ?>',
                method: 'GET',
                data: {
                    keyword: keyword
                },
                dataType: 'json',
                success: function(data) {
                    let result = '';
                    if (data.length > 0) {
                        $.each(data, function(index, klub) {
                            result += '<tr>';
                            result += '<th scope="row">' + (index + 1) + '</th>';
                            result += '<td><img src="/asset/img/klub/' + klub.logo + '" alt="' + klub.nama + '" class="sampul"></td>';
                            result += '<td>' + klub.id_klub + '</td>';
                            result += '<td>' + klub.nama + '</td>';
                            result += '<td>' + klub.slug + '</td>';
                            result += '<td>';
                            result += '<div class="row">';
                            result += '<div class="d-flex justify-content-center gap-3 align-items-center">';
                            result += '<a href="/admin/klub/edit/' + klub.slug + '"><i class="fa-solid fa-pen-to-square fa-xl" style="color: #358754;"></i></a>';
                            result += '<form action="/admin/klub/' + klub.id_klub + '" method="post" class="d-inline">';
                            result += '<?= csrf_field(); ?>';
                            result += '<input type="hidden" name="_method" value="DELETE">';
                            result += '<button type="submit" class="btn" onclick="return confirm(\'Apakah anda yakin ingin menghapusnya ?\');"><i class="fa-solid fa-trash fa-xl" style="color: #ff0000;"></i></button>';
                            result += '</form>';
                            result += '</div>';
                            result += '</div>';
                            result += '</td>';
                            result += '</tr>';
                        });
                    } else {
                        result = '<tr><td colspan="6">No results found</td></tr>';
                    }
                    $('#result').html(result);
                }
            });
        });
    });
</script>

<?= $this->endsection(); ?>
<?= $this->extend('layout/template'); ?>