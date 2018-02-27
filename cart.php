<?php 

                session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Google Analytics -->
    <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-114688921-1', 'auto');
        ga('send', 'pageview');
    </script>
    <!-- End Google Analytics -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bloom</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
 <!--    <link href="css/heroic-features.css" rel="stylesheet"> -->
    <link href="css/style.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/custom.css" />

</head>

<body>

    <!-- Navigation -->
    <?php include 'navigation.php';?>

    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        <header class="jumbotron my-3">
            <h1 class="display-3">Your Cart</h1>

        </header>

        <div class="cart text-center">

            <div class="col-md-5 col-sm-12">
                <div class="bigcart"></div>
                <h1>Your shopping cart</h1>
            
            </div>
            <?php

                if (isset($_GET['product_id']) && isset($_GET['quantity']))
                {
                    $carts = $_SESSION['carts'];

                    $product["product_id"] = $_GET['product_id'];
                    $product["quantity"] = $_GET['quantity'];

                    $_SESSION['carts'][] = $product;
                }
            ?>
            <?php
                $servername = "localhost";
                $username = "root";
                $password = "root";
                $dbname = "bloom";

                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            ?>
            <div class="col-md-7 col-sm-12 ">
                <ul>
                    <li class="row list-inline columnCaptions">
                        <span>QTY</span>
                        <span>ITEM</span>
                        <span>Price</span>
                    </li>
                    <?php
                        if (isset($_SESSION['carts']))
                        {
                            $carts = $_SESSION['carts'];
                            $totalPrice = 0;
                            for ($i = 0; $i < count($carts); $i++)
                            {
                                $item = $carts[$i];

                                try {
                                    $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = '".$item['product_id']."'"); 
                                    $stmt->execute();
                                    // set the resulting array to associative
                                    $row = $stmt->fetch(PDO::FETCH_ASSOC); 
                                }
                                catch(PDOException $e) {
                                    echo "Error: " . $e->getMessage();
                                }

                                $totalPrice = $totalPrice + $row['price']*$item['quantity'];
                                ?>
                    <li class="row">
                        <span class="quantity"><?php echo $item['quantity']?></span>
                        <span class="itemName"><?php echo $row['product_name']?></span>
                        <span class="popbtn"><a class="arrow"></a></span>
                        <span class="price">$<?php echo number_format($row['price']*$item['quantity'],2) ;?></span>
                    </li>
                                <?php
                            }
                        }
                    ?>
                   
                </ul>
            </div >
            <div class="col-md-7 col-sm-12 text-left">
                <p>Total : <span id="totalPrice"> <?php echo number_format($totalPrice, 2); ?> </span></p>
                <a href="" class="btn  btn-secondary">Check Out</a>
            </div>

        </div>

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Bloom 2018</p>
        </div>
        <!-- /.container -->
    </footer>

    <script>
        function total(){
            document.getElementById("totalPrice").innerHTML= <?php '.$row["price"].' ?> * <?php '.$row["quantity"].'?>
        }   
        total();

    </script>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>