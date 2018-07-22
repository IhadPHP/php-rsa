<?php
include_once './../src/Rsa.php';

use syrecords\Rsa;

$privateKey = './key/private_key.pem'; // 私钥路径
$publicKey = './key/rsa_public_key.pem'; // 公钥路径
$rsa = new Rsa($privateKey, $publicKey);

$originData = 'https://qq52o.me';

$ecryptionData = $rsa->privEncrypt($originData);
$decryptionData = $rsa->publicDecrypt($ecryptionData);

echo '私钥加密后的数据为：' . $ecryptionData.PHP_EOL;
echo '公钥解密后的数据为: ' . $decryptionData;

echo '<hr/>';

$ecryptionData = $rsa->publicEncrypt($originData);
$decryptionData = $rsa->privDecrypt($ecryptionData);
echo '公钥加密后的数据为：' . $ecryptionData.PHP_EOL;
echo '私钥解密后的数据为: ' . $decryptionData;
