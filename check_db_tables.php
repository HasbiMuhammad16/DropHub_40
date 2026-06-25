<?php
$db = new mysqli('localhost', 'root', '', 'drophub_40');
if ($db->connect_error) {
    echo 'CONNECT_ERROR: ' . $db->connect_error . PHP_EOL;
    exit(1);
}
$res = $db->query('SHOW TABLES');
if (! $res) {
    echo 'QUERY_ERROR: ' . $db->error . PHP_EOL;
    exit(1);
}
while ($row = $res->fetch_row()) {
    echo $row[0] . PHP_EOL;
}
