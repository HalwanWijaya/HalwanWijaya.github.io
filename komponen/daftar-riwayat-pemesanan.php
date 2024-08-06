<?php
require_once '../koneksi_database.php';

$request_pesanan = mysqli_query($conn, 'select * from data_pelanggan');
$jumlah_pesanan = mysqli_num_rows($request_pesanan);

?>

<div class="head">
    <p class="no">No.</p>
    <p class="nama">Nama</p>
    <p class="nomer">Nomer HP</p>
    <p class="tanggal">Tanggal</p>
    <p class="harga">Harga</p>
</div>

<?php for ($i = 1; $i <= $jumlah_pesanan; $i++) : ?>
    <?php $pesanan = mysqli_fetch_assoc($request_pesanan); ?>
    <div class="body">
        <div class="informasi">
            <p class="no"><?= $i; ?></p>
            <p class="nama"><?= $pesanan['nama'] ?></p>
            <p class="nomer"><?= $pesanan['nomer_hp'] ?></p>
            <p class="tanggal"><?= $pesanan['tanggal'] ?></p>
            <p class="harga">Rp2.000</p>
        </div>
        <div class="tombol">
            <button class="bayar">bayar sekarang</button>
            <div class="grup">
                <button onclick="showFormEdit(<?=$pesanan['id']?>)" class="edit" name="edit" value="<?= $pesanan['id'] ?>">edit</button>
                <button onclick="showConfirmDelete(<?=$pesanan['id']?>)" class="delete" name="del" value="<?= $pesanan['id'] ?>">delete</button>
            </div>
        </div>
    </div>
<?php endfor; ?>