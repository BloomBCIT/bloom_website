
	<form action="product_clicked.php?product_id=<?php echo $_GET['product_id']; ?>" method="post">
		<input type="hidden" name="product_id" value="<?php echo $_GET['product_id']; ?>">
		<label for="reviewtext">Type your review here</label><br/>
		<textarea id="reviewtext" name="reviewtext" rows="3" cols="40"></textarea><br/>

		<label for="reviewtext">Date:
			<input type="text" name="reviewdate" id="reviewdate"></label>

		<input type="submit" value="Add">

	</form>