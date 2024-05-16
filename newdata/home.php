
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <div class="side-nav">
            <div class="logo">
                <img src="LOGO.JPG" alt="logo">
                <h1>Triple T</h1>
            </div>
            <nav class="navbar">
                <ul>
                    <li><a href="home.php">Inventory</a></li>
                    <li><a href="add.php">Add</a></li>
                    <li><a href="update.php">Update</a></li>
                    <li><a href="delete.php">Delete</a></li>
                    <li><a href="salesreport.php">Sales</a></li>
                </ul>
            </nav>
            <div class="logout-btn">
                <a href="loginpage.php">LOGOUT</a>
            </div>
        </div>
        
        <div class="orders-table">
    <h1>TRIPLE THREAD CRAFT "HISTORY"</h1>
    <table class="order-table">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
        <?php
$connection = mysqli_connect("localhost", "root", "", "tripletreade");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Updated SQL query to sort by product name alphabetically
$sql = "SELECT Pname, quantity, total_price, `date` FROM orders ORDER BY Pname ASC";
$result = mysqli_query($connection, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$row["Pname"]."</td>";
        echo "<td>".$row["quantity"]."</td>";
        echo "<td>".$row["total_price"]."</td>";
        echo "<td>".$row["date"]."</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>No records found</td></tr>";
}

mysqli_close($connection);
?>

        </tbody>
    </table>
</div>


</body>
</html>
