<main class="container content">

    <section class="matakuliah-container pt-3">
        <div class="row align-content-center">
            <div class="col-lg-10 col-md-10">
                <?php if (count($get_matakuliah) < 1) : ?>
                    <div class="text-center pt-3 mt-3">
                        <h5> Data Matakuliah Tidak Tersedia</h5>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#addModal" class="btn btn-primary  rounded-pill my-2 ">Tambah Data Matakuliah</button>
                    </div>
                <?php else : ?>
                    <h3 class="mb-0 text-capitalize">Daftar matakuliah</h3>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#addModal" class="btn btn-primary my-2 ">Tambah Data Matakuliah</button>
                    <div class="list-matakuliah pt-3">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Kode MK</th>
                                        <th scope="col">Matakuliah</th>
                                        <th scope="col">SKS</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($get_matakuliah as $gm) : ?>
                                        <tr>
                                            <th scope="row" class="align-middle"><?= $no++; ?></th>
                                            <td class="align-middle"><?= $gm['kode_matakuliah']; ?></td>
                                            <td class="align-middle"><?= $gm['nama_matakuliah']; ?></td>
                                            <td class="align-middle"><?= $gm['sks']; ?></td>
                                            <td class="align-middle">

                                                <div class="aksi">
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $gm['id_matakuliah']; ?>">Hapus</button>
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#editModal<?= $gm['id_matakuliah']; ?>">Ubah</button>
                                                </div>

                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    </section>

</main>


<!-- Load modal -->
<!-- Modal add -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-capitalize font-weigth-bold" id="addModalLabel">Form Tambah Matakuliah</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="row justify-content-center">
                    <div class="col">
                        <div class="form-action__process">
                            <?= form_open('form-matakuliah-prosess', ['id' => "Submit_form"]); ?>
                            <div class="mb-3">
                                <label for="kode_matakuliah" class="form-label">Kode Matakuliah</label>
                                <input type="number" name="kode_matakuliah" class="form-control" id="kode_matakuliah" aria-describedby="kode_matakuliah_help" required>
                                <div id="kode_matakuliah_help" class="form-text">Masukkan kode matakuliah (Required)</div>
                            </div>
                            <div class="mb-3">
                                <label for="nama_matakuliah" class="form-label">Nama Matakuliah</label>
                                <input type="text" name="nama_matakuliah" class="form-control" id="nama_matakuliah" required>
                            </div>
                            <div class="mb-3">
                                <label for="sks" class="form-label">Sks</label>
                                <input type="text" name="sks" class="form-control" id="sks">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Simpan perubahan</button>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>

<!-- Modal edit -->
<?php foreach ($get_matakuliah as $gm) : ?>
    <div class="modal fade" id="editModal<?= $gm['id_matakuliah']; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-capitalize font-weigth-bold" id="editModalLabel">Edit Matakuliah <?= $gm['nama_matakuliah']; ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row justify-content-center">
                        <div class="col">
                            <div class="form-action__process">
                                <?= form_open('form-matakuliah-update/' . $gm['id_matakuliah'], ['id' => "Submit_form"]); ?>
                                <div class="mb-3">
                                    <label for="kode_matakuliah" class="form-label">Kode Matakuliah</label>
                                    <input type="number" name="kode_matakuliah" value="<?= $gm['kode_matakuliah']; ?>" class="form-control" id="kode_matakuliah" aria-describedby="kode_matakuliah_help" required>
                                    <div id="kode_matakuliah_help" class="form-text">Masukkan kode matakuliah (Required)</div>
                                </div>
                                <div class="mb-3">
                                    <label for="nama_matakuliah" class="form-label">Nama Matakuliah</label>
                                    <input type="text" name="nama_matakuliah" value="<?= $gm['nama_matakuliah']; ?>" class="form-control" id="nama_matakuliah" required>
                                </div>
                                <div class="mb-3">
                                    <label for="sks" class="form-label">Sks</label>
                                    <input type="text" name="sks" value="<?= $gm['sks']; ?>" class="form-control" id="sks">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Simpan perubahan</button>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>


<!-- Modal -->
<?php foreach ($get_matakuliah as $gm) : ?>
    <div class="modal fade" id="deleteModal<?= $gm['id_matakuliah']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6>Apakah anda yakin menghapus data matakuliah <b><?= $gm['nama_matakuliah']; ?></b> ini.?</h6>
                    <?= form_open('form-matakuliah-delete/' . $gm['id_matakuliah']); ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Gamau</button>
                    <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>