<?php
/**
 * author: ShenYan.
 * Email：52o@qq52o.cn
 * CreatedTime: 2018/7/22 11:35
 */
include_once './../src/StaticRsa.php';

use syrecords\staticRsa;

$originData = 'https://qq52o.me';

$publicKey = file_get_contents('./key/rsa_public_key.pem'); // 公钥路径
$privateKey = file_get_contents('./key/private_key.pem'); // 私钥路径

$ecryptionData = staticRsa::privEncrypt($originData,$privateKey);
$decryptionData = staticRsa::publicDecrypt($ecryptionData,$publicKey);

echo '私钥加密后的数据为：' . $ecryptionData.PHP_EOL;
echo '公钥解密后的数据为: ' . $decryptionData;

echo '<hr/>';

$ecryptionData = staticRsa::publicEncrypt($originData,$publicKey);
$decryptionData = staticRsa::privDecrypt($ecryptionData,$privateKey);
echo '公钥加密后的数据为：' . $ecryptionData.PHP_EOL;
echo '私钥解密后的数据为: ' . $decryptionData;