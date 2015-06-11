#Using the BAM Checkout Mobile Web API Sample

1. Upload the BAM Checkout Mobile Web API Sample to your webserver running PHP5 (Apache recommended).
2. Configure the BAM Checkout Mobile Web API Sample as mentioned below.
3. Access the BAM Checkout Mobile Web API Sample root directory in a supported browser and it will run automatically.

##Step 2: Configure the BAM Checkout Mobile Web API Sample

Insert your API credentials and reference for each scan (max. 100 characters) in the class `token-generator.php`:
```
private static $PUBLIC_IDENTIFIER = "";
private static $ENCRYPTION_KEY = "";
private static $CHECKSUM_KEY = "";
private static $REFERENCE = "";
```
Note: Log into your Jumio merchant backend, and you can find your public identifier, encryption and checksum keys on the "Settings" page under "API credentials".
