<?php
$db = new mysqli('localhost', 'root', '', 'drophub_40', 3306);
if ($db->connect_errno) {
    echo "connect error: {$db->connect_error}\n";
    exit(1);
}
foreach (['items', 'distribution_logs'] as $table) {
    echo "TABLE: $table\n";
    $res = $db->query("SHOW COLUMNS FROM $table");
    if (! $res) {
        echo "error: {$db->error}\n";
        exit(1);
    }
    while ($row = $res->fetch_assoc()) {
        echo $row['Field'].' '.$row['Type'].' '.($row['Null']=='NO'?'NOT NULL':'NULL').' '.($row['Key']?'KEY ':'').($row['Default'] === null ? 'NULL' : $row['Default'])."\n";
    }
    echo "\n";
}
