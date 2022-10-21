<?php include 'database.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name ="viewport" content ="width=device-width, initial-scale=1.0">
    <title>Inventory Search</title>
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

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="get">
            <div class="form-group">
                <label for="productId">Product_ID</label>
                <input type="productId" class="form-control" id="productId" name="productId" placeholder="Enter Product_ID ex) 10001">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            
        </form>
        <br>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Product_ID</th>
                    <th scope="col">Supplier_ID</th>
                    <th scope="col">Product_Name</th>
                    <th scope="col">List_Price</th>
                    <th scope="col">Wholesales_Price</th>
                    <th scope="col">Qty_On_Hand</th>
                </tr>
            </thead>

            <tbody>
                <?php 
                    $productId = $productIdErr = "";
                    if (isset($_GET['productId'])) {
                        if (empty($_GET['productId'])) {
                            $productIdErr = 'Product_Id is required';
                            echo $productIdErr;
                        } else {
                            $productId = intval($_GET["productId"]);
                            echo "Success";
                        }
                    }

                    $sql = "SELECT * FROM Product WHERE Product_ID = '".$productId."'";
                    $result = mysqli_query($conn, $sql);

                    if ($result->num_rows > 0) {
                        while($row = mysqli_fetch_array($result)) {
                            echo "<tr>".
                                    "<th scope='row'>".$row['Product_ID']."</th>".
                                        "<td>".$row['Supplier_ID']."</td>".
                                        "<td>".$row['Product_Name']."</td>".
                                        "<td>".$row['List_Price']."</td>".
                                        "<td>".$row['Wholesale_Price']."</td>".
                                        "<td>".$row['Qty_On_Hand']."</td>".
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
                                "</tr>";
                      }
                      $conn->close();
                      ?>
            </tbody>
        </table>
        
    </div>
</body>

</html>

