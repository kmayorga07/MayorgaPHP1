<?php

 //get data from form
 $product_description = filter_input(INPUT_POST, 'product_description');	//filter input and INPUT POST was added to validate entry that user will input
 $list_price = filter_input(INPUT_POST, 'list_price', FILTER_VALIDATE_FLOAT);
 $quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);
 
 //error handling group
 //validate product description
 if ($product_description === FALSE ) {
    $error_message = 'Product must be letters only.'; 
 }
 //validate list price
 else if ( $list_price === FALSE )  {
    $error_message = 'List price must be a valid number.'; 
 } else if ( $list_price <= 0 ) {
    $error_message = 'List price must be greater than zero.'; 
 }
 //validate quantity
 else if ( $quantity === FALSE ) {
    $error_message = 'Quantity must be a valid whole number.';
 } else if ( $quantity <= 0 ) {
    $error_message = 'Quantity must be greater than zero.';
 }
 //set error message to empty string if no invalid entries
 else {
    $error_message = ''; 
 }
 //if error exists go to the index
 if ($error_message != '') {
    include('index.php');
    exit(); }
 //end of error handling
	
 //calculate totals
 $subtotal = $list_price * $quantity;
 $tax = $subtotal * .07;
 $total =  $subtotal + $tax;
 
 //apply currency format to dollar and percents amounts
 $list_price_f = "$" .number_format($list_price, 2);						//all "formatted" was shortened to f for readability								
 $subtotal_f = "$" .number_format($subtotal, 2);							//! number format was changed
 $tax_f = "$" .number_format($tax, 2);
 $total_f = "$" .number_format($total, 2);
 
 //escape the unformatted input
 $product_description_escaped = htmlspecialchars($product_description);
 ?>
 
 <!DOCTYPE html>
 <html>
    <head>
	
        <title>MayorgaPHP1</title>
        <link rel="stylesheet" type="text/css" href="main.css">
    </head>
	
    <body>
        <main>
			<h1>Supa Quik Checkout Form</h1>
           
            <label>Product description:</label>
            <span><?php echo htmlspecialchars($product_description); ?></span>
			<br>
                    
            <label>List price:</label>
            <span><?php echo htmlspecialchars($list_price_f); ?></span>
			<br>
					
			<label>Quantity:</label>
			<span><?php echo htmlspecialchars($quantity); ?></span>
			<br>
			
			<label>Subtotal:</label>
            <span><?php echo $subtotal_f; ?></span>
			<br>
			
			<label>7% Tax:</label>
            <span><?php echo $tax_f; ?></span>
			<br>
			
			<label>Total:</label>
            <span><?php echo $total_f; ?></span>
			<br><br>
			<?php
				echo "This transaction was completed on " . date("m/d/y");
			?>
        </main>
    </body>
</html>

