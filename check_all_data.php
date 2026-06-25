<?php
$mysqli = new mysqli('localhost', 'root', '', 'drophub_40');
if ($mysqli->connect_error) {
    echo 'ERR: ' . $mysqli->connect_error . "\n";
    exit(1);
}
echo "=== USERS TABLE ===\n";
$res = $mysqli->query('SELECT * FROM users');
while ($row = $res->fetch_assoc()) {
    echo "ID: {$row['id']}, Username: {$row['username']}, Role: {$row['role']}\n";
}
echo "\n=== DISTRIBUTION_LOGS TABLE ===\n";
$res = $mysqli->query('SELECT * FROM distribution_logs');
echo "Total: " . $res->num_rows . "\n";
while ($row = $res->fetch_assoc()) {
    echo "ID: {$row['id']}, Barang: {$row['id_barang']}, User: {$row['id_user']}, Jenis: {$row['jenis_transaksi']}\n";
}
