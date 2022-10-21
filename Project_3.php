<?php include 'database.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name ="viewport" content ="width=device-width, initial-scale=1.0">
    <title>Order Summary</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
    <div class="container">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.html">Home</a>
            <a class="navbar-brand" href="Project_1.php">Inventory Search</a>
            <a class="navbar-brand" href="Project_2.php">Order</a>
            <a class="navbar-brand" href="Project_3.php">Order Summary</a>
        </nav>
        <br>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Order_ID</th>
                    <th scope="col">Product_ID</th>
                    <th scope="col">Customer_ID</th>
                    <th scope="col">Order_Date</th>
                    <th scope="col">Order_Status</th>
                    <th scope="col">Order_Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Shipping Company</th>
                </tr>
            </thead>

            <tbody>
                <?php 
                    $sql = "SELECT * FROM Order_Customers";
                    $result = mysqli_query($conn, $sql);

                    if ($result->num_rows > 0) {
                        while($row = mysqli_fetch_array($result)) {
                            echo "<tr>".
                                    "<th scope='row'>".$row['Order_ID']."</th>".
                                        "<td>".$row['Product_ID']."</td>".
                                        "<td>".$row['Customer_ID']."</td>".
                                        "<td>".$row['Order_Date']."</td>".
                                        "<td>".$row['Order_Status']."</td>".
                                        "<td>".$row['Order_Price']."</td>".
                                        "<td>".$row['Quantity']."</td>".
                                        "<td>".$row['Shipping Company']."</td>".
                                "</tr>";
                        }
                      } else {
                        echo "<tr>".
                                    "<th scope='row'>N/A</th>".
                                        "<td>N/A</td>".
                                        "<td>N/A</td>".
                                        "<td>N/A</td>".
                                        "<td>N/A</td>".
                                        "<td>N/A</td>".
                                        "<td>N/A</td>".
                                        "<td>N/A</td>".
                                "</tr>";
                      }
                      $conn->close();
                      ?>
            </tbody>
        </table>
        
    </div>
</body>

</html>