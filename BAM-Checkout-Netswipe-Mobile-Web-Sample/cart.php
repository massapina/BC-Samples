<?php
$ccNumber 		= isset($_POST['ccNumber']) ? $_POST['ccNumber'] : "N/A";
$ccExpiryDate 	= isset($_POST['ccExpiryDate']) ? $_POST['ccExpiryDate'] : "N/A";
$ccHolderName 	= isset($_POST['ccHolderName']) ? $_POST['ccHolderName'] : "N/A";
$cvv 			= isset($_POST['cvv']) ? $_POST['cvv'] : "N/A";
$ccType 		= isset($_POST['ccType']) ? $_POST['ccType'] : "N/A";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>BAM Checkout Mobile Web Demo</title>
		<link href="css/styles.css" type="text/css" rel="stylesheet">
	</head>
	<body>
		<header>
			<h1><img src="img/logo.png" alt="BAM Checkout Mobile Web">BAM Checkout Mobile Web Demo</h1>
		</header>
		<article class="cart">
			<header>
				<h2>Jumio T-Shirt</h2>
			</header>
			<section>
				<div class="image">
					<img src="img/shirts.png" alt="Product">
				</div>
				<div class="info">
					<h3>
						<strong>Brand: Jumio</strong>
						<br>
						<i>Price: $9.99</i>
					</h3>
					<p>
						Size: Unifit | Color: Navy
					</p>
				</div>
			</section>
		</article>
		<aside class="total">
			<div class="payment">
				<i>Payment method: Credit card<br/>
				Credit card number: <?php echo $ccNumber; ?><br/>
				Credit card type: <?php echo $ccType; ?><br/>
				Valid through: <?php echo $ccExpiryDate; ?><br/>
				Name: <?php echo $ccHolderName; ?><br/>
				Card security code: <?php echo $cvv; ?>
				</i> 
				<br>
				<strong>Total amount: $9.99</strong>
			</div>
			<a href="index.php" class="btn">Confirm purchase &raquo;</a>
		</aside>
		<footer>Supported by <a href="https://www.jumio.com/">Jumio</a></footer>
	</body>
</html>