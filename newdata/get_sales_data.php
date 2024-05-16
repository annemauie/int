<?php
$connection = mysqli_connect("localhost", "root", "", "tripletreade");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$start_date = $_GET['start_date'];
$end_date = $_GET['end_date'];

$sql = "SELECT Pname, SUM(total_price) AS total_revenue FROM orders WHERE `date` BETWEEN '$start_date' AND '$end_date' GROUP BY Pname";
$result = mysqli_query($connection, $sql);

$data = array();

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

echo json_encode($data);

mysqli_close($connection);
?>
