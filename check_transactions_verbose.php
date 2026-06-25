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
while ($row = $res->fetch_assoc()) {
    echo json_encode($row, JSON_PRETTY_PRINT) . "\n";
}
