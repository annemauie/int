<?php
$connection = mysqli_connect("localhost", "root", "", "tripletreade");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];
    $Pname = mysqli_real_escape_string($connection, $_POST['Pname']);
    $quantity = isset($_POST['quantity']) ? mysqli_real_escape_string($connection, $_POST['quantity']) : null;
    $total_price = isset($_POST['total_price']) ? mysqli_real_escape_string($connection, $_POST['total_price']) : null;
    $date = isset($_POST['date']) ? mysqli_real_escape_string($connection, $_POST['date']) : null;

    if ($action == 'add') {
        $sql = "INSERT INTO orders (Pname, quantity, total_price, date) VALUES ('$Pname', '$quantity', '$total_price', '$date')";
    } elseif ($action == 'update') {
        $sql = "UPDATE orders SET quantity='$quantity', total_price='$total_price', date='$date' WHERE Pname='$Pname'";
    } elseif ($action == 'delete') {
        $sql = "DELETE FROM orders WHERE Pname='$Pname'";
    }

    if (mysqli_query($connection, $sql)) {
        echo "Operation successful";
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}

mysqli_close($connection);
header("Location: home.php");
exit();
?>
