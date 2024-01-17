<?php
session_start();
require_once('../../config/koneksi.php');
require_once('../../config/function.php');
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
}
$sql = "SELECT * FROM tb_m_kelas";
$query = $con->prepare($sql);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<form id="form">
    <input type="hidden" name="id_kelas" id="id_kelas" value="<?= $id_kelas ?>">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Mata Pelajaran</h5>
        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <label class="small mb-1" for="status">Nama Mata Pelajaran</label>
                <input class="form-control" id="nama" name="nama" type="text" placeholder="Nama Mata Pelajaran">
            </div>
            <div class="col-md-12">
                <label class="small mb-1" for="status">Kelas</label>
                <select class="form-control" id="id_kelas" name="id_kelas">
                    <option value="">Pilih Kelas</option>
                    <?php foreach ($result as $row) { ?>
                        <option value="<?= $row['id_kelas'] ?>"><?= $row['nama'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
        <button class="btn btn-primary" type="submit" id="tombol_submit">Simpan</button>
    </div>
</form>
<script>
    $('#form').submit(function(e) {
        e.preventDefault();
        var data = $('#form').serialize();
        data += '&action=tambah';
        $.ajax({
            type: 'POST',
            url: '<?= base_url('guru/mapel/function.php') ?>',
            data: data,
            dataType: 'json',
            beforeSend: function() {
                $('#tombol_submit').prop("disabled", true);
                $('#tombol_submit').text('Please wait...');
            },
            success: function(response) {
                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success',
                        text: response.message,
                        icon: "success",
                        confirmButtonText: 'OK'
                    }).then(function() {
                        load_list(response.url);
                        $(form)[0].reset();
                        $('#modalListResult').modal('hide');
                        setTimeout(function() {
                            $('#tombol_submit').prop("disabled", false);
                            $('#tombol_submit').html('Simpan');
                            back();
                        }, 2000);
                    });
                } else {
                    Swal.fire({
                        title: 'Error',
                        text: response.message,
                        icon: "error",
                        confirmButtonText: 'OK'
                    });
                    setTimeout(function() {
                        $('#tombol_submit').prop("disabled", false);
                        $('#tombol_submit').html('Simpan');
                    }, 2000);
                }
            }
        });
    });
</script>