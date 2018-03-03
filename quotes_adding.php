<form action="product_clicked.php?product_id=<?php echo $_GET['product_id']; ?>" method="post">
    <input type="hidden" name="product_id" value="<?php echo $_GET['product_id']; ?>">

    <div class="input-group mb-3 reviewtext" >
        <textarea type="text" class="form-control" placeholder="Type your text here" aria-label="Recipient's username" aria-describedby="basic-addon2" id="reviewtext" name="reviewtext" rows="3" cols="40" placeholder="type your text here"></textarea>
        <input type="hidden" name="reviewdate" id="reviewdate">
        <br/>
    </div>
    <div class="input-group-append">
        <input type="submit" class="btn btn-outline-secondary" value="Add">
    </div>
</form>
