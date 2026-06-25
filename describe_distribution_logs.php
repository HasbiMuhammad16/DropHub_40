<?php
$mysqli = new mysqli('localhost', 'root', '', 'drophub_40');
if ($mysqli->connect_error) { die($mysqli->connect_error); }
$res = $mysqli->query("SHOW CREATE TABLE distribution_logs");
if (!$res) { die($mysqli->error); }
$row = $res->fetch_assoc();
echo $row['Create Table'];
