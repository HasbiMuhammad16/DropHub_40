<?php
$mysqli = new mysqli('localhost', 'root', '', 'drophub_40');
if ($mysqli->connect_error) {
    echo 'ERR: ' . $mysqli->connect_error . "\n";
    exit(1);
}
$sql = "INSERT INTO items (nama_barang, kategori, stok, lokasi_loker, status_aktif) VALUES ('Test Barang', 'Elektronik', 10, 'Loker A1', 'aktif')";
if (! $mysqli->query($sql)) {
    echo 'ERR: ' . $mysqli->error . "\n";
    exit(1);
}
echo "OK\n";
