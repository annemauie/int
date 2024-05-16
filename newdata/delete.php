<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Triple Thread Craft CRUD</title>
    <link rel="stylesheet" href="delete.css">
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

<div class="addform">    
    <h2>Delete Product</h2>

    <form action="crud.php" method="post">
        <input type="hidden" name="action" value="delete">
        <label for="Pname">Product Name:</label>
        <input type="text" id="Pname" name="Pname" required>
        <button type="submit">Delete Product</button>
    </form>
</div>

    <!-- Display Products Table -->
   
</body>
</html>
