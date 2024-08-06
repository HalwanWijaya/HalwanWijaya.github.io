<?php
// FILE INI UNTUK PROSES EDIT DAN DELETE
// MENGEMBALIKAN DATA BENTUK JSON UNTUK DAPAT DITAMPILKAN DIHALAMAN RIWAYAT PHP

require_once 'koneksi_database.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];

    $request_pesanan = mysqli_query($conn, "select * from data_pelanggan where id=$id");
    $jumlah_pesanan = mysqli_num_rows($request_pesanan);


    if (isset($_POST['delete'])) {
        $del = mysqli_query($conn, "delete from data_pelanggan where id=$id");
    }

    if (isset($_POST['edit'])) {
        $nama = htmlspecialchars($_POST['nama']);
        $nomer = htmlspecialchars($_POST['nomer']);
        $tanggal = htmlspecialchars($_POST['tanggal']);
        $jumlah_peserta = htmlspecialchars($_POST['jumlah_peserta']);
        $penginapan = $_POST['penginapan'];
        $transportasi = $_POST['transportasi'];
        $konsumsi = $_POST['konsumsi'];
        
        $edit = mysqli_query($conn, "update data_pelanggan set nama='$nama', nomer_hp='$nomer', tanggal='$tanggal', jumlah_pesanan='$jumlah_peserta', penginapan='$penginapan', transportasi='$transportasi', konsumsi='$konsumsi' where id=$id");
    }


    class Data
    {
        public $id;
        public $nama;
        public $nomer_hp;
        public $tanggal;
        public $jumlah_pesanan;
        public $penginapan;
        public $transportasi;
        public $konsumsi;
    }
    $pesanan = new Data();
    foreach ($request_pesanan as $req) {
        $pesanan->id = $req['id'];
        $pesanan->nama = $req['nama'];
        $pesanan->nomer_hp = $req['nomer_hp'];
        $pesanan->tanggal = $req['tanggal'];
        $pesanan->jumlah_pesanan = $req['jumlah_pesanan'];
        $pesanan->penginapan = $req['penginapan'];
        $pesanan->transportasi = $req['transportasi'];
        $pesanan->konsumsi = $req['konsumsi'];
    }
    echo json_encode($pesanan);
}