<?php
/*
* iTech Empires:  Export Data from MySQL to CSV Script
* Version: 1.0.0
* Page: Export
*/

// Database Connection
include 'conn.php';
include 'auth.php';

// get Users
$query = "SELECT `date`,`supporting_text`,`img` FROM `kingston_july`";
if (!$result = mysqli_query($con, $query)) {
    exit(mysqli_error($con));
}

$users = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }
}

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=Users.csv');
$output = fopen('php://output', 'w');
fputcsv($output, array('Date','08:00', 'Message','Image'));

if (count($users) > 0) {
    foreach ($users as $row) {
        fputcsv($output, $row);
    }
}
?>