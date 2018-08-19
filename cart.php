<html> 
    <head>
        <title>Cart</title>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
              rel="stylesheet" id="bootstrap-css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
        </script>
        <style>
            .card-title {
                font-size: 32px;
                margin-left: 30%;
            }
            .value {
                color: red;
            }
            .price {
                float: right;
            }
            img {
                height: 225px;
            }
            .quantity {
                width: 75px;
            }
            .btn-group {
                margin-left: 5%;
            }
            .sum {
                margin-left: 67%;
            }
            .sum_total {
                color: red;
                margin-left: 16%;
            }
            .checkout {
                margin-left: 50%;
                margin-bottom: 5%;
            }
            .card-body1 {
                background-color: lavender;
            }
        </style>
        <script>
            $(document).ready(function(){
                $(".add").on('click', function(){
                    var myID = $(this).attr("id");
                    //alert(myID);
                        $.ajax({
                            type: "POST",
                            url: "add_cart.php",
                            data: { 
                                    id: myID
                                  },
                            cache: false,
                            success: function(){    
                                //alert("Quantity updated successfully.");
                                window.location.replace("cart.php");
                            }
                       });
                    return false;
                });
            });
            $(document).ready(function(){
                $(".subtract").on('click', function(){
                    var myID = $(this).attr("id");
                    //alert(myID);
                        $.ajax({
                            type: "POST",
                            url: "subtract_cart.php",
                            data: { 
                                    id: myID
                                  },
                            cache: false,
                            success: function(){    
                                //alert("Quantity updated successfully.");
                                window.location.replace("cart.php");
                            }
                       });
                    return false;
                });
            });
        </script>
    </head>
    <body>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="cart.php">
                    <span class="fa fa-shopping-cart"></span>
                    Cart
                </a>
              </li>
            </ul>
        </nav>
        <br>
        <?php
        require 'dbconnect.php';
        $sql = "SELECT MAX(id) FROM product";
        $answer = $conn->query($sql);
        $myID = $answer->fetch_row();
        $maxID = $myID[0];
        $sum = 0;
        $total = 0;

        for ($i = 1; $i <= $maxID; $i++) {
            $sql = "SELECT COUNT(*) FROM cart WHERE prod_id=" .$i;
            $result = $conn->query($sql);
            $mycount = $result->fetch_row();
            $count = $mycount[0];
            if($count > 0) {
                $sql = "SELECT * FROM product WHERE id=" . $i;
                $data = $conn->query($sql);
                $data_array = mysqli_fetch_assoc($data);
                $total = $total + $count;
        ?>
        
        <div class="container px-2 py-3">
            <div class="card">
              <div class="row ">
                    <div class="col-md-3">
                        <img src="images/<?php echo $data_array["img"] ?>" 
                             class="w-100">
                    </div>
                    <div class="col-md-9 px-3 card-body1">
                        <div class="px-5 py-3">
                            <h3 class="card-title">
                                <?php echo $data_array["name"] ?>
                            </h3>
                            <h5 class="card-text">
                                <span class="price">
                                    <span class="value">
                                        ₹<?php echo $data_array["price"] ?>
                                    </span>
                                </span>
                                <br>
                                <br>
                                Quantity:
                                <div class="btn-group">
                                    <button class="btn btn-light subtract" 
                                            id="<?php echo $i ?>">
                                        -
                                    </button>
                                    <button class="btn btn-danger quantity">
                                             <?php echo $count ?>     
                                    </button>
                                    <button class="btn btn-light add" 
                                            id="<?php echo $i ?>">
                                        +
                                    </button>
                                </div>
                            </h5>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <!--
        <div class="container-fluid">
            <div class="card">
                <div class="row">
                    <div class="col-4">
                        <img src="<?php echo $data_array['img'] ?>">
                    </div>
                    <div class="col-8">
                        <h4 class="card-title">
                            <?php echo $data_array['name'] ?>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
        -->
                <!--
                echo "<h3>" .$data_array["name"]. "</h3>";
                echo "<h3>" .$data_array["price"]. "</h3>";
                echo "<h3>Quantity: " .$count. "</h3>";
                echo "<br>";
                -->
        <?php
                $sum = $sum + ($count * $data_array["price"]);
            }
        }
        $conn->close();
        ?>
                <h2 class="sum">
                    Total (<?php echo $total ?> items)
                    <br>
                    <span class="sum_total">₹<?php echo $sum ?></span>
                </h2>
                <a href="checkout.php" class="btn btn-success btn-lg checkout">
                    <span class="fa fa-shopping-cart"></span> Checkout 
                </a>
    </body>
</html>