<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>MayorgaPHP1</title>
        <link rel="stylesheet" type="text/css" href="main.css">
    </head>
    <body>
        <main>
            <h1>Supa Quik Checkout Form</h1>
			
			<?php if (!empty($error_message)) { ?>
				<p class='error'><?php echo htmlspecialchars($error_message); ?></p>
			<?php } ?>
			
            <form action="checkout.php" method="post">
			
			<?php
			$product_description="";
			$list_price="";
			$quantity="";
			?>
                <div id="data">
                    <label>Product Description:</label>
                    <input type="text" name="product_description"
						value="<?php echo htmlspecialchars($product_description); ?>">
					<br>
                    <label>List Price:</label>
                    <input type="text" name="list_price"
						value="<?php echo htmlspecialchars($list_price); ?>">
					<br>
                    <label>Quantity:</label>
                    <input type="text" name="quantity"
						value="<?php echo htmlspecialchars($quantity); ?>">
					<br>
                </div>
                <div id="buttons">
                    <label>&nbsp;</label><!-- comment -->
                    <input type="submit" value="checkout"><br>
                </div>
            </form>
        </main>
    </body>
</html>
