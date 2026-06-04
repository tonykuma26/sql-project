<?php

$conn = new mysqli("localhost", "root", "", "registration_db");

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="users.csv"');

$output = fopen("php://output", "w");

fputcsv($output, array('ID', 'NAME', 'EMAIL', 'MOBILE'));

$result = $conn->query("SELECT * FROM users");

while($row = $result->fetch_assoc())
{
    fputcsv($output, array(
        $row['id'],
        $row['name'],
        $row['email'],
        $row['mobile']
    ));
}

fclose($output);

?>