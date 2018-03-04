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
    <link href="css/heroic-features.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>

    <!-- Navigation -->
    <?php include 'navigation.php';?>

    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        <header class="jumbotron my-3">
            <h1 class="display-3">Product</h1>

        </header>

        <!-- Page Features -->
        <!-- /.row -->

    
    <!-- /.container -->
    <div class="row text-center">

        <?php include 'dbconnection.php';?>
        <?php

                try {
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt = $conn->prepare("SELECT * FROM products"); 
                    $stmt->execute();

                    // set the resulting array to associative
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
                    foreach($result as $row) { 
                        echo "<div class='col-lg-3 col-md-6 mb-4'>
            <div class='card'><img id='img_product' src='./img/".$row['image']."'/>"." <div class='card-body'><h4 class='card-title'>".$row['product_name']."</h4>"."<p cslass='card-text'>Price: $".$row['price']."<br/>".$row['description']."</p>"."</div>"."<div class='card-footer'><a href='product_clicked.php?product_id=".$row['product_id']."' class='btn  btn-secondary'>Browse"."</a></div></div></div>";
                    }
                }
                catch(PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
                ?>

    </div>
        </div>

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