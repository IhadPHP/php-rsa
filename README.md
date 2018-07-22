# php-rsa
A PHP class that uses RSA algorithm for encryption and decryption.

Before looking at the example, you need to generate the public and private keys of the RSA.

If you don't know how to generate RSA public and private keys, read this blog post: [How does PHP use OpenSSL to generate the public and private keys needed for RSA encryption and decryption?](https://qq52o.me/2396.html) 

## Installation

You can install the package using composer.

```php
composer require sy-records/php-rsa -vvv
```

## Usage

If you want to use the instantiation method, please check the following.

```php
<?php
use syrecords\Rsa;

$privateKey = './key/private_key.pem'; // Private key path
$publicKey = './key/rsa_public_key.pem'; // Public key path
$rsa = new Rsa($privateKey, $publicKey);

$originData = 'https://qq52o.me';

# Encryption with a private key requires public key decryption, called "signature".
$ecryptionData = $rsa->privEncrypt($originData);
$decryptionData = $rsa->publicDecrypt($ecryptionData);

echo 'The data encrypted by the private key is:' . $ecryptionData.PHP_EOL;
echo 'The data after the public key is decrypted is: ' . $decryptionData;

echo '<hr/>';

# Encryption with a public key requires private key decryption, called "encryption".
$ecryptionData = $rsa->publicEncrypt($originData);
$decryptionData = $rsa->privDecrypt($ecryptionData);

echo 'The data after public key encryption is:' . $ecryptionData.PHP_EOL;
echo 'The data after the private key is decrypted is:' . $decryptionData;
```

If you want to call a static method, then look at this one!

```php
<?php
use syrecords\staticRsa;

$privateKey = file_get_contents('./key/private_key.pem'); // Private key path
$publicKey = file_get_contents('./key/rsa_public_key.pem'); // Public key path

$originData = 'https://qq52o.me';

$ecryptionData = staticRsa::privEncrypt($originData,$privateKey);
$decryptionData = staticRsa::publicDecrypt($ecryptionData,$publicKey);

echo 'The data encrypted by the private key is:' . $ecryptionData.PHP_EOL;
echo 'The data after the public key is decrypted is: ' . $decryptionData;

echo '<hr/>';

$ecryptionData = staticRsa::publicEncrypt($originData,$publicKey);
$decryptionData = staticRsa::privDecrypt($ecryptionData,$privateKey);
echo 'The data after public key encryption is:' . $ecryptionData.PHP_EOL;
echo 'The data after the private key is decrypted is:' . $decryptionData;
```

## License

Apache-2.0