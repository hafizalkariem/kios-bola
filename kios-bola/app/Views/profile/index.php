<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<?= $this->include('layout/breadcrumbs'); ?>

<style>
    /* CSS untuk menyesuaikan ketinggian card */
    .card {
        height: 100%;
        /* Atur tinggi card secara konsisten */
    }
</style>

<div class="container my-5">
    <div class="row justify-content-center">
        <!-- Card 1: Foto Profil (Kiri) -->
        <div class="col-md-4 mb-4">
            <div class="card p-3 py-4 h-100"> <!-- Tambahkan class h-100 untuk mengatur tinggi menjadi 100% dari parent -->
                <div class="text-center">
                    <img src="<?= base_url(); ?>/asset/img/user_image/<?= $user->user_image; ?>" width="100" class="rounded-circle">
                </div>
                <div class="text-center my-3">
                    <h5 class="mt-2 mb-2"><strong><?= $user->username; ?></strong></h5>
                    <span>User</span>
                </div>
                <div class="social-links text-center text-md-right pt-3 pt-md-0 my-3">
                    <a href="<?= base_url('') ?>" class="twitter"><i class="bx bxl-twitter bx-md" style="color: #cf1006;"></i></a>
                    <a href="<?= base_url('') ?>" class="facebook"><i class="bx bxl-facebook bx-md" style="color: #cf1006;"></i></a>
                    <a href="<?= base_url('') ?>" class="instagram"><i class="bx bxl-instagram bx-md" style="color: #cf1006;"></i></a>
                    <a href="<?= base_url('') ?>" class="google-plus"><i class="bx bxl-skype bx-md" style="color: #cf1006;"></i></a>
                    <a href="<?= base_url('') ?>" class="linkedin"><i class="bx bxl-linkedin bx-md" style="color: #cf1006;"></i></a>
                </div>

            </div>
        </div>

        <!-- Card 2: Informasi Pengguna (Kanan) -->
        <div class="col-md-8 mb-4">
            <div class="card p-3 py-4">
                <div class="row mb-3 d-flex justify-content-center align-items-center">
                    <h3 class="text-center"><strong>User Profile</strong></h3>

                </div>
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th scope="row" style="width: 30%;">Full Name</th>
                            <td><?= $user->fullname; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Username</th>
                            <td><?= $user->username; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Alamat</th>
                            <td><?= $user->address; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Tempat Lahir</th>
                            <td><?= $user->birthplace; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Tanggal Lahir</th>
                            <td><?= $user->birthdate; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">No Ponsel</th>
                            <td><?= $user->phone_number; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Email</th>
                            <td><?= $user->email; ?></td>
                        </tr>
                    </tbody>
                </table>
                <div class="text-end mt-4">
                    <button type="button" class="btn btn-warning">Edit</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>