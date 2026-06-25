<?php
$mysqli = new mysqli('localhost', 'root', '', 'drophub_40');
if ($mysqli->connect_error) {
    echo 'ERR: ' . $mysqli->connect_error . "\n";
    exit(1);
}
$res = $mysqli->query('SELECT * FROM distribution_logs');
if (! $res) {
    echo 'QUERY ERR: ' . $mysqli->error . "\n";
    exit(1);
}
echo "Total rows: " . $res->num_rows . "\n";
while ($row = $res->fetch_assoc()) {
    echo "ID: {$row['id']}, Barang: {$row['id_barang']}, User: {$row['id_user']}, Tanggal: {$row['tanggal_transaksi']}, Qty: {$row['jumlah_keluar']}, Jenis: {$row['jenis_transaksi']}\n";
}
