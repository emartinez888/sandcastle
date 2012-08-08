<?php
    // get the data from the form
    $product_description = $_POST['product_description'];
    $list_price = $_POST['list_price'];
    $discount_percent = $_POST['hst'];
    
    // calculate the discount
    $discount = $list_price /(1+.01*$discount_percent);
    //$discount_price = $list_price - $discount;

    // apply currency formatting to the dollar and percent amounts
    $list_price_formatted = "$".number_format($list_price, 2);
    $discount_percent_formatted = $discount_percent."%";
    $discount_formatted = "$".number_format($discount, 2);
    //$discount_price_formatted = "$".number_format($list_price - $discount, 2);  
			//$discount_formatted
			
		//****************************
			$to = "emartinez888@gmail.com";
			$subject = "Test mail";
			$message = "Hello! This is a simple email message.";
			$from = "someonelse@example.com";
			$headers = "From:" . $from;
			mail($to,$subject,$message,$headers);
			echo "Mail Sent.";
		//****************************
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Product Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>
<body>
    <div id="content">
        <h1>Product Calculator</h1>

        <label>Product Description:</label>
        <span><?php echo $product_description; ?></span><br />

        <label>Total Price:</label>
        <span><?php echo $list_price_formatted; ?></span><br />

        <label>Taxes Percent:</label>
        <span><?php echo $discount_percent_formatted; ?></span><br />

        <label>Taxes:</label>
        <span><?php echo "$".number_format($list_price - $discount, 2); ?></span><br />
				
        <label>Sale Price:</label>
        <span><?php echo $discount_formatted; ?></span><br />

        <p>&nbsp;</p>
    </div>
</body>
</html>