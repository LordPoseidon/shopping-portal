
<html>
    <head>
        <title>Home Page</title>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" 
              href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
        </script>
        <style>
            li {
                list-style-type: none;
                text-align: left;
            }
            .card {
                float: left;
                margin-left: 1%;
                margin-right: 1%;
                margin-bottom: 2%;
            }
            .page {
                float: left;
                margin-left: 40%;;
            }
            .price {
                color: red;
            }
            .card-body {
                background-color: lavender;
            }
        </style>
        <script>
            $(document).ready(function(){
                $(".cart").on('click', function(){
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
                                alert("Successfully added to cart.");
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
                <a class="nav-link active" href="index.php">
                    Home
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="cart.php">
                    <span class="fa fa-shopping-cart"></span>
                    Cart
                </a>
              </li>
            </ul>
        </nav>
        <br> 
            <!--
            <div class="card" style="width: 400px">
                <img class="card-img-top" src="Realme1.jpg" alt="RealMe 1" style="width: 100%; height: 75%">
                <div class="card-body text-center">
                    <h4 class="card-title">RealMe 1</h4>
                    <ul>
                        <li>Battery Power: 3410mAH</li>
                        <li>Display Size: 6.0 inches</li>
                        <li>Computer Memory Size: 4GB</li>
                        <li>Camera Description: 8MP</li>
                    </ul>
                    <h3 class="card-title">₹10,999</h3>
                    <button type="button" class="btn btn-primary cart" id="1">Add to Cart</button>
                </div>
            </div>
            -->
            <?php
                require 'dbconnect.php';
                
                $sql = "SELECT * FROM product";
                $result = $conn->query($sql);
                
                if($result->num_rows > 0)
                {
                    while ($row = $result->fetch_assoc())
                    {
                        echo "<div class='card' style='width: 400px'>";
                        echo "<img class='card-img-top' "
                             . "src='images/" .$row["img"] ."' "
                             . "style='width: 100%; height: 42%'>";
                        echo "<div class='card-body text-center'>
                            <h4 class='card-title'>" .$row["name"]. "</h4>";
                        echo "<ul>";
                        echo "<li>Battery Power: " .$row["battery"]. "mAH</li>";
                        echo "<li>Display Size: " .$row["display"]. " inches</li>";
                        echo "<li>Computer Memory Size: " .$row["memory"]. "GB</li>";
                        echo "<li>Camera Description: " .$row["camera"]. "MP</li>";
                        echo "</ul>";
                        echo "<h3 class='card-title price'> ₹" .$row["price"]. "</h3>";
                        echo "<button type='button' class='btn btn-primary cart' id='"
                             .$row["id"] ."'><span class='fa fa-shopping-cart'></span> "
                                . " Add to Cart</button>";
                        echo "</div>";
                        echo "</div>";
                    }
                }
            ?>
    </body>
</html>