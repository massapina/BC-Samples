<?php include 'classes/token-generator.php'; ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>BAM Checkout Mobile Web Demo</title>	
		<link href="css/styles.css" type="text/css" rel="stylesheet">
		<script type="text/javascript">
			document.addEventListener('ns.submit', function yourEventListener(yourEvent) {
				var cardNumber = yourEvent.detail.cardNumber;
				var cardExpiryDate = yourEvent.detail.cardExpiryDate;
				var cardSecurityCode = yourEvent.detail.cardSecurityCode;
				var cardHolderName = yourEvent.detail.cardHolderName;
				var cardType = yourEvent.detail.cardType;
				
				var f = document.createElement('form');
				f.setAttribute('method', 'post');
				f.setAttribute('action', 'cart.php');
				
				var i = document.createElement('input'); 
				i.setAttribute('type', 'text');
				i.setAttribute('name', 'ccNumber');
				i.setAttribute('value', cardNumber);
				f.appendChild(i);
				
				i = document.createElement('input'); 
				i.setAttribute('type', 'text');
				i.setAttribute('name', 'ccExpiryDate');
				i.setAttribute('value', cardExpiryDate);
				f.appendChild(i);
				
				i = document.createElement('input'); 
				i.setAttribute('type', 'text');
				i.setAttribute('name', 'ccHolderName');
				i.setAttribute('value', cardHolderName);
				f.appendChild(i);
				
				i = document.createElement('input'); 
				i.setAttribute('type', 'text');
				i.setAttribute('name', 'cvv');
				i.setAttribute('value', cardSecurityCode);
				f.appendChild(i);
				
				i = document.createElement('input'); 
				i.setAttribute('type', 'text');
				i.setAttribute('name', 'ccType');
				i.setAttribute('value', cardType);
				f.appendChild(i);
								
				document.getElementsByTagName('body')[0].appendChild(f);
				
				f.submit();
			});
			document.addEventListener('ns.warning', function yourEventListener(yourEvent) {
				 var code = yourEvent.detail.code;
				 var message = yourEvent.detail.message;
				 alert("warningCode = " + code + " warningMessage = " + message);
			});
			document.addEventListener('ns.error', function yourEventListener(yourEvent) {
				 var code = yourEvent.detail.code;
				 var message = yourEvent.detail.message;
				 alert("errorCode = " + code + " errorMessage = " + message);
			});	
		</script>
		<link rel="stylesheet" type="text/css" href="https://static-bcmw.jumio.com/styles/main.min.css">

        <script type="text/javascript" src="https://static-bcmw.jumio.com/js/widget-sdk.js"></script>
	</head>
	<body data-ng-app="nshtml5sdk">
		<header>
			<h1><img src="img/logo.png" alt="BAM Checkout Mobile Web">BAM Checkout Mobile Web Demo</h1>
		</header>
		<div data-ns-bootstrapper="<?php echo TokenGenerator::generateToken(); ?>" data-public-identifier="<?php echo TokenGenerator::getPublicIdentifier(); ?>" ></div>
	</body>
</html>