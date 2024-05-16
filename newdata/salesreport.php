<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Report</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js" integrity="sha512-iV9vD3PLsZ9RABRn4Du9RILbyP58RrI/QBKuE7oI0PPZOOYQ58bNIBN6Qdd4ohrqHWgeEjNq5dAh2TtAkB0cYQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <div class="container">
        <div class="side-nav">
            <!-- Your side navigation content here -->
        </div>

        <div class="sales-report">
            <h2>Sales Report</h2>
            <div>
                <label for="start_date">Start Date:</label>
                <input type="date" id="start_date" name="start_date">
                <label for="end_date">End Date:</label>
                <input type="date" id="end_date" name="end_date">
                <button onclick="generateSalesChart()">Generate Chart</button>
            </div>
            <canvas id="salesChart"></canvas>
            <div id="salesTableContainer">
                <h3>Sales Data</h3>
                <table id="salesTable">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Total Revenue</th>
                        </tr>
                    </thead>
                    <tbody id="salesTableBody">
                        <!-- Sales data will be inserted here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function generateSalesChart() {
            var startDate = document.getElementById("start_date").value;
            var endDate = document.getElementById("end_date").value;

            var url = 'get_sales_data.php?start_date=' + startDate + '&end_date=' + endDate;
            
            fetch(url)
                .then(response => response.json())
                .then(data => {
                    var labels = [];
                    var salesData = [];

                    // Extracting labels (product names) and sales data (total revenue)
                    data.forEach(item => {
                        labels.push(item.Pname);
                        salesData.push(item.total_revenue);
                    });

                    // Creating a chart using Chart.js
                    var ctx = document.getElementById('salesChart').getContext('2d');
                    var salesChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Total Revenue',
                                data: salesData,
                                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                borderColor: 'rgba(255, 99, 132, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });

                    // Display sales data in table
                    var salesTableBody = document.getElementById("salesTableBody");
                    salesTableBody.innerHTML = "";
                    data.forEach(item => {
                        var row = "<tr><td>" + item.Pname + "</td><td>" + item.total_revenue + "</td></tr>";
                        salesTableBody.innerHTML += row;
                    });
                })
                .catch(error => console.error('Error fetching sales data:', error));
        }
    </script>
</body>
</html>
