<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bloom</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <!--     <link href="css/heroic-features.css" rel="stylesheet"> -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/product_clicked.css" rel="stylesheet">

</head>

<body>

    <!-- Navigation -->
    <?php include 'navigation.php';?>

        <!-- Page Content -->
        <div class="container">
            <?php
                $servername = "localhost";
                $username = "root";
                $password = "root";
                $dbname = "bloom";

                try {
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = '".$_GET['product_id']."'"); 
                    $stmt->execute();
                    // set the resulting array to associative
                    $row = $stmt->fetch(PDO::FETCH_ASSOC); 
                }
                catch(PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
        ?>
                <!-- Jumbotron Header -->
                <header class="jumbotron my-3">
                    <h1 class="display-3">Product</h1>

                </header>

                <div class="product group">
                    <div class="col-1-2 product-image">
                        <img id='img_product' src='./img/<?php echo $row['image']; ?>'/>
                    </div>
                    <div class="col-1-2 product-info">
                        <h1><?php echo $row['product_name']; ?></h1>
                        <h2>$ <?php echo number_format($row['price'], 2); ?></h2>

                        <form action="cart.php" method="GET">
                            <input type="hidden" name="product_id" value="<?php echo $_GET['product_id'];?>">
                            <div>
                                <input type="number" name="quantity" placeholder="0">
                            </div>

                            <br>
                            <button type="submit" class="btn btn-secondary">Add To Cart</button>
                        </form>

                        
                        <p>
                            <?php echo $row['description']; ?>
                        </p>

                    </div>
                </div>
                <hr>

                <!-- review -->
                <div>
                    <?php include 'quotes_adding.php';?>
                        <?php 
                $servername = "localhost";
                $username = "root";
                $password = "root";
                $dbname = "bloom";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                } else{  
                     echo "database succesfully connected"; 
                }     

                //store data
                if(isset($_POST['reviewtext'])) 
                {
                    $sql = 'INSERT INTO review SET
                        reviewtext="' . $_POST['reviewtext']. '",
                        reviewdate="' . $_POST['reviewdate']. '",
                        product_id="' . $_POST['product_id']. '"';

                    if($conn->query($sql) === TRUE) {
                        echo "New record created successfully";

                    } else {
                        echo"Error:" . $sql. "<br>" . $conn->error;
                    } 
                } 
                //delete data
                else if(isset($_GET['delete'])){
                    $sql= 'DELETE FROM  review WHERE review_id='. $_POST['review_id'];

                    if($conn->query($sql) === TRUE) {
                        echo "Record deleted successfully";
                    } else {
                        echo "Error deleting record: " . $conn->error;
                    }
                }

                //retrieve data from table
                $sql = "SELECT review_id, reviewtext, reviewdate FROM review WHERE product_id = '".$_GET['product_id']."'";
                $result = $conn->query($sql);
                //Determines if there are results
                $pid = $_GET['product_id'];
                if ($result->num_rows > 0) {

                    while($row = $result->fetch_assoc()) {
                    echo "<form action='?delete&product_id=$pid' method='post' style='clear:both;'>";
                    echo "<p style='display:inline;'>". $row["review_id"]. " - ". $row["reviewtext"]. 
                    " (posted on " . $row["reviewdate"] . ")</p>";?>
                                    <input type="hidden" name="review_id" value="<?php
                        echo $row['review_id']; ?>">
                                    <input type="submit" class="btn btn-secondary" value="x">
                                    </form>
                                    <?php
                    }
                }   
                $conn->close();

                ?>
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

        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>