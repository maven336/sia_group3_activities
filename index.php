<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <title>Dashboard</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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
              <h2 class="text-center">Mavens Flowershop <a href="https://codingdriver.com/">Variety of Flower</a></h2>
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">List of Flowers</h2>
                        <a href="create.php" class="btn btn-success pull-right">Add New Flower</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";

                    // select all flowers
                    $data = "SELECT * FROM flowers";
                    if($flowers = mysqli_query($conn, $data)){
                        if(mysqli_num_rows($flowers) > 0){
                            echo "<table class='table table-bordered table-striped'>
                                    <thead>
                                      <tr>
                                        <th>#</th>
                                        <th>Flower Name</th>
                                        <th>Color</th>
                                        <th>Occasions</th>
                                        <th>Deals</th>
                                        <th>Stock</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>";
                                while($flower = mysqli_fetch_array($flowers)) {
                                    echo "<tr>
                                            <td>" . $flower['id'] . "</td>
                                            <td>" . $flower['flowername'] . "</td>
                                            <td>" . $flower['color'] . "</td>
                                            <td>" . $flower['occasions'] . "</td>
                                            <td>" . $flower['deals'] . "</td>
                                            <td>" . $flower['stock'] . "</td>
                                            <td>" . $flower['price'] . "</td>
                                            <td>
                                              <a href='read.php?id=". $flower['id'] ."' title='View flower' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>
                                              <a href='edit.php?id=". $flower['id'] ."' title='Edit flower' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>
                                              <a href='delete.php?id=". $flower['id'] ."' title='Delete Flower' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>
                                            </td>
                                          </tr>";
                                }
                                echo "</tbody>
                                </table>";
                            mysqli_free_result($flowers);
                        } else{
                            echo "<p class='lead'><em>No records found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                    }

                    // Close connection
                    mysqli_close($conn);
                    ?>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>