<?php include 'classes/token-generator.php'; ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>BAM Checkout Mobile Web API Sample</title>
		<link href="css/styles.css" type="text/css" rel="stylesheet">		
		<script type="text/javascript">
		    var yourSuccessFunction = function (cardInformation) {
				var cardNumber = cardInformation.cardNumber;
				var cardExpiryDate = cardInformation.cardExpiryDate;
				var cardHolderName = cardInformation.cardHolderName;
				var cardType = cardInformation.cardType;
				var cardAccountNumber = cardInformation.cardAccountNumber;
				var cardSortCode = cardInformation.cardSortCode;
				
		        document.getElementById('ccNumber').value = cardNumber;
		        document.getElementById('ccExpiryDate').value = cardExpiryDate;
		        document.getElementById('ccHolderName').value = cardHolderName;
				document.getElementById('ccType').value = cardType;
				document.getElementById('ccAccountNumber').value = cardAccountNumber;
				document.getElementById('ccSortCode').value = cardSortCode;
				
		    };
		    var yourWarningFunction = function (warning) {
				var code = warning.code;
				var message = warning.message;
				alert("warningCode = " + code + " warningMessage = " + message);
			};
			var yourErrorFunction = function (error) {
				var code = error.code;
				var message = error.message;
				alert("errorCode = " + code + " errorMessage = " + message);
			};
		    function extractCardInformation(e) {
				var ccImage = document.getElementById('imgCont');
					ccImage.src = e.target.result;
			
				var yourCustomEvent = document.createEvent('CustomEvent');
					yourCustomEvent.initCustomEvent('bc.creditCardScan', false, true, {
						publicIdentifier: "<?php echo TokenGenerator::getPublicIdentifier(); ?>",
						authorizationToken: "<?php echo TokenGenerator::generateToken(); ?>",
						cardImage: ccImage,
						onSuccess: yourSuccessFunction,
						onWarning: yourWarningFunction,
						onError: yourErrorFunction
					});

		        document.getElementById('YOURID').dispatchEvent(yourCustomEvent);
		    }
		    function readUploadImage(upload) {
		        if (upload.files && upload.files.length > 0) {
		            var reader = new FileReader();
						reader.onload = extractCardInformation;
						reader.readAsDataURL(upload.files[0]);
		        } else {
		            alert("no file to upload");
		        }
		    }
		</script>
		
		<script type="text/javascript" src="https://netswipe.com/widget/nsmobileweb/widget-sdk.js"></script>
	</head>
	<body>
		<img id="imgCont" style="position:absolute;top:50000px;"/>
		<header>
			<h1><img src="img/logo.png" alt="BAM Checkout Mobile Web">BAM Checkout Mobile Web API Sample</h1>
		</header>
		<article class="credentials">
			<div id="YOURID" data-ng-app="nshtml5sdk" bc-scan-listener></div>
			<header>
				<h2>Buy with credit card</h2>
			</header>
			<section>
				<div class="scan">
					<div class="help">
						<ul>
							<li>
								<img src="img/help_01.png" alt="Scan my credit card step 1">
								<p>Make sure your card is fully visible, and has about a fingerbreadth of padding around it. Do not tilt the card. Place it on a neutral background, like a table.</p>
							</li>
							<li>
								<img src="img/help_02.png" alt="Scan my credit card step 2">
								<p>Make sure there are no reflections on the credit card</p>
							</li>
							<li>
								<img src="img/help_03.png" alt="Scan my credit card step 3">
								<p>Make sure the card is focused and readable. If you can read it, we can read it.</p>
							</li>
						</ul>
					</div>
                    <a href="javascript:void(0);" class="btn">
						<label for="ccUpload">Scan my card</label>
						<input type="file" capture="camera" accept="image/*" name="ccUpload" class="button" id="ccUpload" onchange="readUploadImage(this)" style="display:none;" >
					</a>
					
				</div>
				<div class="or"><span>or</span></div>
				<div class="frm">
					<form action="cart.php" method="post">					
						<label for="ccNumber">Credit card number</label>
						<input id="ccNumber" name="ccNumber" type="tel" placeholder="Credit card number">
						<label for="ccExpiryDate">Valid through</label>
						<input id="ccExpiryDate" name="ccExpiryDate" type="tel" placeholder="MM/YY">
						<label for="ccHolderName">Name</label>
						<input id="ccHolderName" name="ccHolderName" type="text" placeholder="Name">
						<label for="cvv">Card security code</label>
						<input id="cvv" name="cvv" type="tel" placeholder="123">
						<input id="ccType" name="ccType" type="hidden" value="">
						<input id="ccAccountNumber" name="ccAccountNumber" type="hidden" value="">
						<input id="ccSortCode" name="ccSortCode" type="hidden" value="">
						<button type="submit" name="btnConfirm" value="confirm">Confirm Data &raquo;</button>
					</form>
				</div>
			</section>
		</article>
		<footer>Supported by <a href="https://www.jumio.com/">Jumio</a></footer>
	</body>
</html>