<?php
/**
* Authorization token generator class
* 
* Before using this sample, please log into https://netswipe.com and get your keys from section "Settings/API credentials/Netswipe Mobile Web".
*
* You will need: 
*  - Public identifier;
*  - Active checksum key;
*  - Active encryption key
* 
*/
class TokenGenerator{
	/** 
	 * @var string "Public identifier". 
	 */
	//private static $PUBLIC_KEY 		= "<< YOURPUBLICKEY >>";
	private static $PUBLIC_KEY 		= "";
	/** 
	 * @var string "Active encryption key" 
	 */
	//private static $ENCRYPTION_KEY 	= "<< YOURENCRYPTIONKEY >>";
	private static $ENCRYPTION_KEY 	= "";
	/** 
	 * @var string "Active checksum key" 
	 */
	//private static $CHECKSUM_KEY 		= "<< YOURCHECKSUMKEY >>";
	private static $CHECKSUM_KEY 	= "";
	/** 
	 * @var string Your reference for each scan (max. 100 characters) 
	 */
	//private static $REFERENCE 		= "<< YOURREFERENCE >>";
	private static $REFERENCE 		= "";
			
	/**
	 * @return string 
	 */
	public static function getPublicKey(){
		return self::$PUBLIC_KEY;
	}
	/**
	 * Generate a transaction-specific authorization token which is valid for 5 minutes
	 *
	 * @return string Base64 encoded authorization token. Note: Your authorization token must not contain line breaks, which are added by some Base64 encoders after 76 characters.
	 */
	public static function generateToken(){
        $encryptionKey = base64_decode(self::$ENCRYPTION_KEY);
		$checksumKey = base64_decode(self::$CHECKSUM_KEY);

		// Step 1. a
		$timestamp = floor(microtime(true)*1000);
		$message = $timestamp.";".self::$REFERENCE;

		// Manual implementation of PKCS7 padding, as not provided by PHP's mcrypt functions 
		$blockSize = mcrypt_get_block_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
		$padding = $blockSize - (strlen($message) % $blockSize);
		$message .= str_repeat(chr($padding), $padding);

		// Step 1. b
		srand(time());
		$ivSize = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
		$iv = mcrypt_create_iv($ivSize, MCRYPT_RAND);

		// Step 1. c
		$encryptedMessage = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $encryptionKey, $message, MCRYPT_MODE_CBC, $iv);

		// Step 2
		$hmac = hash_hmac("sha1", $encryptedMessage.$iv, $checksumKey, true);

		// Steps 3 and 4
		$authorizationToken = base64_encode($encryptedMessage.$iv.$hmac);
		
		return $authorizationToken;
    }
}