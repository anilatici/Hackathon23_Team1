<?php
	$product_name = filter_input(INPUT_POST, 'product_name');
	$list_price = filter_input(INPUT_POST, 'list_price');
	$discount_percent = filter_input(INPUT_POST, 'discount_percent');

	$description = filter_input(INPUT_POST, 'description');

    $quantity= filter_input(INPUT_POST, 'quantity');
   
        $discount = $list_price * $discount_percent * .01;
        $discount_price = ($list_price - $discount) * $quantity;
        

        $list_price_f = "€".number_format($list_price, 2);
        $discount_percent_f = $discount_percent."%";
        $discount_f = "€".number_format($discount, 2);
        $discount_price_f = "€".number_format($discount_price, 2);


?>
<!DOCTYPE html>
<html>
<head>
    <title>Product Discount Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
    <main>
        <h1>Product Discount Calculator</h1>

        <label>Product Name:</label>
        <span><?php echo htmlspecialchars($product_name); ?></span><br>

        <label>List Price:</label>
        <span><?php echo htmlspecialchars($list_price_f); ?></span><br>

        <label>Discount if Apply:</label>
        <span><?php echo htmlspecialchars($discount_percent_f); ?></span><br>

        <label>Discount Amount:</label>
        <span><?php echo $discount_f; ?></span><br>

        <label>How many People:</label>
        <span><?php echo htmlspecialchars ($description); ?></span><br>

        <label>quantity of Menus:</label>
        <span><?php echo htmlspecialchars( $quantity); ?></span><br>

        <label>Total, Discount Price:</label>
        <span><?php echo $discount_price_f; ?></span><br>



    </main>
</body>
</html>