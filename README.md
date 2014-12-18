##Using the Netswipe Mobile Web API Sample


###Step 1: Adding your API credentials & scan reference

######Insert your API credentials
<TODO: Add file name(s)>
```
publicIdentifier: YOURPUBLICIDENTIFIER,
$encryptionKey = base64_decode("YOURENCRYPTIONKEY");
$checksumKey = base64_decode("YOURCHECKSUMKEY");
```
Note: Log into https://netswipe.com, and you can find your public identifier, encryption and checksum keys on the "Settings" page under "API credentials".

######Add your reference for each scan (max. 100 characters)
<TODO: Add file name(s)>
```
$message = $timestamp.";"."YOURREFERENCE";
```


###Step 2: Running the Netswipe Mobile Web API Sample

1. Decompress the Netswipe Mobile Web API Sample archive and upload it to your webserver running PHP5 (Apache recommended).
2. Access the Netswipe Mobile Web API Sample root directory in a supported browser and it will run automatically.
