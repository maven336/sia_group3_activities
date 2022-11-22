<?php
require_once "config.php";

$flowername = $color = $occasions = $deals = $stock = $price = "";
$flowername_error = $color_error = $occasions_error = $deals_error = $stock_error = $price_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $flowername = trim($_POST["flowername"]);
    if (empty($flowername)) {
        $flowername_error = "Flower name is required.";
    } else {
        $flowername = $flowername;
    }

    $color = trim($_POST["color"]);

    if (empty($color)) {
        $color_error = "Color is required.";
    } else {
        $color = $color;
    }

    $occasions = trim($_POST["occasions"]);
    if (empty($occasions)) {
        $occasions_error = "Occasions is required.";
    }

    $deals = trim($_POST["deals"]);
    if(empty($deals)) {
        $deals_error = "Deals is required.";
    } else {
        $deals = $deals;
    }

    $stock = trim($_POST["stock"]);
    if(empty($stock)) {
        $stock_error = "Stock is required.";
    } else {
        $stock = $stock;
    }

     $price = trim($_POST["price"]);
    if(empty($price)) {
        $price_error = "Price is required.";
    } else {
        $price = $price;
    }


    if (empty($flowername_error) && empty($color_error) && empty($occasions_error) && empty($deals_error) && empty($stock_error) && empty($price_error) ) {
          $sql = "INSERT INTO `flowers` (`flowername`, `color`, `occasions`, `deals`, `stock`, `price`) VALUES ('$flowername', '$color', '$occasions', '$deals', '$stock', '$price')";

          if (mysqli_query($conn, $sql)) {
              header("location: index.php");
          } else {
               echo "Something went wrong. Please try again later.";
          }
      }
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Flower</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper {
            width: 1200px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>List of Flowers</h2>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($flowername_error)) ? 'has-error' : ''; ?>">
                            <label>Flower Name</label>
                            <input type="text" name="flowername" class="form-control" value="">
                            <span class="help-block"><?php echo $flowername_error;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($color_error)) ? 'has-error' : ''; ?>">
                            <label>Color</label>
                            <input type="text" name="color" class="form-control" value="">
                            <span class="help-block"><?php echo $color_error;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($occasions_error)) ? 'has-error' : ''; ?>">
                            <label>Occasions</label>
                            <input type="text" name="occasions" class="form-control" value="">
                            <span class="help-block"><?php echo $occasions_error;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($deals_error)) ? 'has-error' : ''; ?>">
                            <label>Deals</label>
                            <input type="text" name="deals" class="form-control" value="">
                            <span class="help-block"><?php echo $deals_error;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($stock_error)) ? 'has-error' : ''; ?>">
                            <label>Stock</label>
                            <input type="text" name="stock" class="form-control" value="">
                            <span class="help-block"><?php echo $stock_error;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($price_error)) ? 'has-error' : ''; ?>">
                            <label>Price</label>
                            <input type="text" name="price" class="form-control" value="">
                            <span class="help-block"><?php echo $price_error;?></span>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>