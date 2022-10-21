<?php include 'database.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name ="viewport" content ="width=device-width, initial-scale=1.0">
    <title>Order</title>
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
                <label for="product_id">Product_ID</label>
                <input type="text" name="productId" class="form-control" placeholder="Enter Product_ID ex) 10001">
            </div>
            <div class="form-group">
                <label for="customer_id">Customer_ID</label>
                <input type="text" name="customerId" class="form-control" placeholder="Enter Customer_ID ex) 1">
            </div>
            <div class="form-group">
                <label for="Quantity">Quantity</label>
                <input type="text" name="quantity" class="form-control" placeholder="Enter Quantity">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <?php 
            $productId = 0;
            $customerId = $quantity = $orderPrice = $result = "";

            if (isset($_GET['productId']) && isset($_GET['customerId']) && isset($_GET['quantity'])) {

                if (empty($_GET['productId'])) {
                    echo 'Product_Id is required<br>';
                } else {
                    $productId = intval($_GET["productId"]);
                    echo "Success: productID ".$productId."<br>";
                }

                if (empty($_GET['customerId'])) {
                    echo 'Customer_Id is required<br>';
                } else {
                    $customerId = intval($_GET["customerId"]);
                    echo "Success: customerId ".$customerId."<br>";
                }

                if (empty($_GET['quantity'])) {
                    echo 'Quantity is required<br>';
                } else {
                    $quantity = intval($_GET['quantity']);
                    echo "Success: quantity ".$quantity."<br>";
                }
            }
            
            //query the data by productId to find the Order_Price (List_Price*Quantity)
            $sql = "SELECT List_Price FROM Product WHERE Product_ID = ".$productId;
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "List_Price: ".$row["List_Price"]."<br>";
                    $orderPrice = $row["List_Price"]*$quantity;
                    echo "Order_Price: ".$orderPrice."<br>";

                    $sql = "INSERT INTO Order_Customers (Product_ID, Customer_ID, Quantity, Order_Price)
                    VALUES ($productId, $customerId , $quantity, $orderPrice)";

                    if (mysqli_query($conn, $sql)) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                }
            } else {
                echo "0 results<br>";
            }
        ?>
        <br>
    </div>
</body>

</html>
