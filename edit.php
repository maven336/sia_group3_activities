<?php
require_once "config.php";

$flowername = $color = $occasions = $deals = $stock = $price = "";
$flowername_error = $color_error = $occasions_error = $deals_error = $stock_error = $price_error = "";

if (isset($_POST["id"]) && !empty($_POST["id"])) {

    $id = $_POST["id"];

        $flowername = trim($_POST["flowername"]);
        if (empty($flowername)) {
            $flowername_error = "Flower name is required.";
        }  else {
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
        } else {
            $occasions = $occasions;
        }

        $deals = trim($_POST["deals"]);
        if (empty($deals)){
            $deals_error = "Deals is required.";
        } else {
            $deals = $deals;
        }

        $stock = trim($_POST["stock"]);
        if (empty($stock)) {
            $stock_error = "Stock is required.";
        } else {
            $stock = $stock;
        }

        $price = trim($_POST["price"]);
        if (empty($price)) {
            $price_error = "Price is required.";
        } else {
            $price = $price;
        }

    if (empty($flowername_error) && empty($color_error) &&
        empty($occasions_error) && empty($deals_error) && empty($stock_error) && empty($price_error) ) {

          $sql = "UPDATE `flowers` SET `flowername`= '$flowername', `color`= '$color', `occasions`= '$occasions', `stock`= '$stock', `price`= '$price' WHERE id='$id'";

          if (mysqli_query($conn, $sql)) {
              header("location: index.php");
          } else {
              echo "Something went wrong. Please try again later.";
          }

    }

    mysqli_close($conn);
} else {
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        $id = trim($_GET["id"]);
        $query = mysqli_query($conn, "SELECT * FROM flowers WHERE ID = '$id'");

        if ($flowers = mysqli_fetch_assoc($query)) {
            $flowername   = $flowers["flowername"];
            $color    = $flowers["color"];
            $occasions       = $flowers["occasions"];
            $deals = $flowers["deals"];
            $stock     = $flowers["stock"];
            $price     = $flowers["price"];
        } else {
            echo "Something went wrong. Please try again later.";
            header("location: edit.php");
            exit();
        }
        mysqli_close($conn);
    }  else {
        echo "Something went wrong. Please try again later.";
        header("location: edit.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
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
                        <h2>Update List of Flowers</h2>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                      <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <div class="form-group <?php echo (!empty($flowername_error)) ? 'has-error' : ''; ?>">
                            <label>Flower Name</label>
                            <input type="text" name="flowername" class="form-control" value="<?php echo $flowername; ?>">
                            <span class="help-block"><?php echo $flowername_error;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($color_error)) ? 'has-error' : ''; ?>">
                            <label>Color</label>
                            <input type="text" name="color" class="form-control" value="<?php echo $color; ?>">
                            <span class="help-block"><?php echo $color_error;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($occasions_error)) ? 'has-error' : ''; ?>">
                            <label>Occasions</label>
                            <input type="text" name="occasions" class="form-control" value="<?php echo $occasions; ?>">
                            <span class="help-block"><?php echo $occasions_error;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($deals_error)) ? 'has-error' : ''; ?>">
                            <label>Deals</label>
                            <input type="text" name="deals" class="form-control" value="<?php echo $deals; ?>">
                            <span class="help-block"><?php echo $deals_error;?></span>
                        </div>

                       <div class="form-group <?php echo (!empty($stock_error)) ? 'has-error' : ''; ?>">
                            <label>Stock</label>
                            <input type="text" name="stock" class="form-control" value="<?php echo $stock; ?>">
                            <span class="help-block"><?php echo $stock_error;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($price_error)) ? 'has-error' : ''; ?>">
                            <label>Price</label>
                            <input type="text" name="price" class="form-control" value="<?php echo $price; ?>">
                            <span class="help-block"><?php echo $price_error;?></span>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>