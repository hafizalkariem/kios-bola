<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<?= $this->include('layout/breadcrumbs'); ?>

<div class="container my-5">
    <div class="row justify-content-center">
        <!-- Card 1: Foto Profil (Kiri) -->
        <div class="col-md-4 mb-4">
            <div class="card p-3 py-4 h-100">
                <div class="text-center">
                    <img src="<?= base_url(); ?>/asset/img/user_image/<?= $user->user_image; ?>" width="100" class="rounded-circle">
                </div>
                <div class="text-center my-3">
                    <h3 class="mt-2 mb-2"><strong><?= $user->username; ?></strong></h3>
                    <p class="mt-2 mb-2"><i><?= $user->email; ?></i></p>
                    <span>User</span>
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
                    </tbody>
                </table>
                <div class="text-end mt-4">
                    <button type="button" class="btn btn-success btn-md" data-bs-toggle="modal" data-bs-target="#editModal">
                        Edit Profile
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Profile -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form untuk edit profile -->
                <form id="editProfileForm" enctype="multipart/form-data">
                    <?= csrf_field(); ?>

                    <!-- Input fields for user details -->
                    <div class="mb-3 row">
                        <label for="fullname" class="col-sm-3 col-form-label text-end">Full Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="fullname" name="fullname" value="<?= $user->fullname; ?>" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="username" class="col-sm-3 col-form-label text-end">Username</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="username" name="username" value="<?= $user->username; ?>" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="birthplace" class="col-sm-3 col-form-label text-end">Tempat Lahir</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="birthplace" name="birthplace" value="<?= $user->birthplace; ?>" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="birthdate" class="col-sm-3 col-form-label text-end">Tanggal Lahir</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="birthdate" name="birthdate" value="<?= $user->birthdate; ?>" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="address" class="col-sm-3 col-form-label text-end">Alamat</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="address" name="address" rows="4" required><?= $user->address; ?></textarea>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="phone_number" class="col-sm-3 col-form-label text-end">No tlp</label>
                        <div class="col-sm-9">
                            <input type="tel" class="form-control" id="phone_number" name="phone_number" value="<?= $user->phone_number; ?>" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="user_image" class="col-sm-3 col-form-label text-end">Profile Image</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" id="user_image" name="user_image">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" id="saveChangesButton" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('saveChangesButton').addEventListener('click', function() {
        var formData = new FormData(document.getElementById('editProfileForm'));

        fetch('<?= base_url('profile/update'); ?>', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    alert('Failed to update profile');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });
</script>

<?= $this->endSection(); ?>