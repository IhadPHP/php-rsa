<?php
/**
 * author: ShenYan.
 * Email：52o@qq52o.cn
 * CreatedTime: 2018/7/22 11:31
 */
namespace syrecords;

class StaticRsa
{

    /**
     * @uses 私钥加密
     * @param string $data
     * @return null|string
     */
    public static function privEncrypt($data = '',$privateKey) {
        if (!is_string($data)) {
            return null;
        }
        return openssl_private_encrypt($data, $encrypted, $privateKey) ? base64_encode($encrypted) : null;
    }

    /**
     * @uses 公钥加密
     * @param string $data
     * @return null|string
     */
    public static function publicEncrypt($data = '',$publicKey) {
        if (!is_string($data)) {
            return null;
        }
        return openssl_public_encrypt($data, $encrypted, $publicKey) ? base64_encode($encrypted) : null;
    }

    /**
     * @uses 私钥解密
     * @param string $encrypted
     * @return null
     */
    public static function privDecrypt($encrypted = '',$privateKey) {
        if (!is_string($encrypted)) {
            return null;
        }
        return (openssl_private_decrypt(base64_decode($encrypted), $decrypted,$privateKey)) ? $decrypted : null;
    }

    /**
     * @uses 公钥解密
     * @param string $encrypted
     * @return null
     */
    public static function publicDecrypt($encrypted = '',$publicKey) {
        if (!is_string($encrypted)) {
            return null;
        }
        return (openssl_public_decrypt(base64_decode($encrypted), $decrypted,$publicKey)) ? $decrypted : null;
    }
}