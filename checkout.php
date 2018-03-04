<?php 
    session_start();

	include 'dbconnection.php';

    if (isset($_SESSION['carts']))
    {               
		// $conn = new mysqli($servername, $username, $password, $dbname);
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

		$orderedProducts;
		$orderedTotal = 0;

		foreach ($_SESSION['carts'] as $product_id => $quantity)
		{
		    try {
		        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = '".$product_id."'"); 
                $stmt->execute();
                // set the resulting array to associative
                $row = $stmt->fetch(PDO::FETCH_ASSOC); 
		    }
		    catch(PDOException $e) {
		        echo "Error: " . $e->getMessage();
		    }

		    $orderedProduct["quantity"] = $quantity;
		    $orderedProduct["price"] = $row['price'] * $quantity;
		    $orderedProduct["product_name"] = $row['product_name'];

		    $orderedProducts[] = $orderedProduct;
		    $orderedTotal = $orderedTotal + ($row['price'] * $quantity);
		}		

		// var_dump($orderedProducts); var_dump("total price: ".$orderedTotal); exit;

        $conn = new mysqli($servername, $username, $password, $dbname);
		$sql = 'INSERT INTO orders SET
                    order_date="' . date("Y-m-d", time()). '",
                    userkey="' . $_SESSION['userkey']. '",
                    total="' . $orderedTotal. '"';

        if($conn->query($sql) === TRUE) {
        	$order_id = $conn->insert_id;

        	foreach ($orderedProducts as $orderedProduct)
        	{
    			$sql = 'INSERT INTO orderitem SET
	                    order_id="' . $order_id. '",
	                    product_name="' . $orderedProduct['product_name']. '",
	                    price="' . $orderedProduct['price']. '",
	                    quantity="' . $orderedProduct['quantity']. '"';

	            $conn->query($sql);
        	}
        } else {
            echo"Error:" . $sql. "<br>" . $conn->error;
        }

        //
        //	Send email
        //	
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM orders JOIN users on orders.userkey = users.userkey WHERE orders.order_id = '".$order_id."'"); 
            $stmt->execute();
            // set the resulting array to associative
            $row = $stmt->fetch(PDO::FETCH_ASSOC); 

            $emailContents = "Hi ".$row['name']."<br/><br/><br/>";
            $emailContents .= "Thank you for your order at Bloom!<br/><br/>";
            $emailContents .= "Your order was placed at ".$row['order_date']."<br/>";
            $emailContents .= "Below is your order details:<br/><br/>";
            $emailContents .= "Order Total: $".number_format($row['total'], 2)."<br/>";

            $stmt = $conn->prepare("SELECT orderitem.* FROM orderitem JOIN orders ON orderitem.order_id = orders.order_id WHERE orders.order_id = '".$order_id."'"); 
            $stmt->execute();
            // set the resulting array to associative
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            foreach ($result as $itemrow) 
            { 
            	$emailContents .= "&nbsp;&nbsp;&nbsp;Item: ".$itemrow['product_name']."<br/>";
            	$emailContents .= "&nbsp;&nbsp;&nbsp;Item Price: $".number_format($itemrow['price'], 2)."<br/>";
            	$emailContents .= "&nbsp;&nbsp;&nbsp;Quantity: ".$itemrow['quantity']."<br/>";
            	$emailContents .= "<br/>";
            }

            $emailContents .= "<br/><br/>Thank you for shopping at Bloom, and hope to see you again!";
            $emailContents .= "<br/><br/>Bloom team";
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        //
        //	https://www.tutorialrepublic.com/php-tutorial/php-send-email.php
        //
		$to = $row['email'];
		$subject = 'Your order at Bloom';
		$from = 'kayliemoa@gmail.com';
		 
		// To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		 
		// Create email headers
		$headers .= 'From: '.$from."\r\n".
		    'Reply-To: '.$from."\r\n" .
		    'X-Mailer: PHP/' . phpversion();
		 
		// Compose a simple HTML email message
		$message = '<html><body>';
		$message .= $emailContents;
		$message .= '</body></html>';
		mail($to, $subject, $message, $headers);

        unset($_SESSION['carts']);
        ?>
        <script type="text/javascript">
        	alert("Thanks for your order.");
        	window.location.replace("index.html");
        </script>
        <?
        exit;
    }
    else {
    	header("Location: index.html");
    }
?>
