<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 1200px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
  <?php
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        require_once "config.php";

        $id = trim($_GET["id"]);
        $query = mysqli_query($conn, "SELECT * FROM flowers WHERE ID = '$id'");

        if ($flower = mysqli_fetch_assoc($query)) {
            $flowername   = $flower["flowername"];
            $color        = $flower["color"];
            $occasions    = $flower["occasions"];
            $deals        = $flower["deals"];
            $stock        = $flower["stock"];
            $price        = $flower["price"];
        } else {
            header("location: read.php");
            exit();
        }

        mysqli_close($conn);
    } else {
        header("location: read.php");
        exit();
    }
  ?>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>View flower</h1>
                    </div>
                    <div class="form-group">
                        <label>Flower Name</label>
                        <p class="form-control-static"><?php echo $flowername ?></p>
                    </div>
                    <div class="form-group">
                        <label>Color</label>
                        <p class="form-control-static"><?php echo $color ?></p>
                    </div>
                    <div class="form-group">
                        <label>Occasions</label>
                        <p class="form-control-static"><?php echo $occasions ?></p>
                    </div>
                    <div class="form-group">
                        <label>Deals</label>
                        <p class="form-control-static"><?php echo $deals ?></p>
                    </div>
                    <div class="form-group">
                        <label>Stock</label>
                        <p class="form-control-static"><?php echo $stock ?></p>
                    </div>
                     <div class="form-group">
                        <label>Price</label>
                        <p class="form-control-static"><?php echo $price ?></p>
                    </div>
                    <p><a href="index.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>