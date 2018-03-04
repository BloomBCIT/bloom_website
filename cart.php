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
                <header class="jumbotron my-5">
                    <h1 class="display-3">Your Cart</h1>

                </header>

                <div class="cart text-center">

                    <div class="col-md-5 col-sm-12">
                        <div class="bigcart"></div>
                        <h1>Your shopping cart</h1>

                    </div>
                    <?php

                        //remove
                        if (isset($_POST['delete_item'])) {
                            unset($_SESSION['carts'][$_POST['product_id']]);
                        }
                        //end of remove 

                if (isset($_POST['product_id']) && isset($_POST['quantity']))
                {
                    $carts = isset($_SESSION['carts']) ? $_SESSION['carts'] : array();
                    $product["product_id"] = $_POST['product_id'];
                    $product["quantity"] = $_POST['quantity'];

                    if (array_key_exists($product['product_id'], $carts))
                    {
                        $carts[$product['product_id']] = $carts[$product['product_id']] + $product['quantity'];
                    }
                    else {
                        $carts[$product['product_id']] = $product['quantity'];
                    }

                    $_SESSION['carts'] = $carts;
                }
            ?>

        <?php include 'dbconnection.php';?>
                        <?php

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
                            $totalPrice = 0;
                        if (isset($_SESSION['carts']))
                        {
                            $carts = $_SESSION['carts'];

                            foreach ($carts as $product_id => $quantity)
                            {

                            // }
                            // for ($i = 0; $i < count($carts); $i++)
                            // {
                            //     $item = $carts[$i];

                                try {
                                    $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = '".$product_id."'"); 
                                    $stmt->execute();
                                    // set the resulting array to associative
                                    $row = $stmt->fetch(PDO::FETCH_ASSOC); 
                                }
                                catch(PDOException $e) {
                                    echo "Error: " . $e->getMessage();
                                }

                                $totalPrice = $totalPrice + $row['price']*$quantity;
                                ?>
                                        <li class="row">
                                            <span class="quantity"><?php echo $quantity?></span>
                                            <span class="itemName"><?php echo $row['product_name']?></span>

                                            <span class="price">$<?php echo number_format($row['price']*$quantity,2) ;?></span>
                                            <!-- remove-->
                                            <form action="cart.php" method="POST">
                                                <input type="hidden" name="delete_item" value="1"/>
                                                <input type="hidden" name="product_id" value="<?php echo $product_id; ?>"/>
                                            <input type="submit" name="remove" value="x" class="btn"/>
                                            </form>
                                        </li>
                                        <?php
                            }
                        }
                    ?>

                                </ul>
                            </div>
                            <div class="col-md-7 col-sm-12 text-left">
                                <p>Total : <span id="totalPrice"> <?php echo number_format($totalPrice, 2); ?> </span></p>
                                <a href="checkout.php" class="btn  btn-secondary">Check Out</a>
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
                function total() {
                    document.getElementById("totalPrice").innerHTML = <?php '.$row["price"].' ?> * <?php '.$row["quantity"].'?>
                }
                total();
            </script>
            <!-- Bootstrap core JavaScript -->
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    </body>

    </html>